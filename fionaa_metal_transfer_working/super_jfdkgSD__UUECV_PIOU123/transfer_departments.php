<?php
session_start();
include("include/connection.php");

// Authentication check
if (!isset($_COOKIE['auth_token'])) {
    header("location:index.php");
    exit();
}

// --- Department Filter (From Department) ---
$from_dept = "";
if (isset($_GET['from_dept']) && $_GET['from_dept'] !== "") {
    $from_dept = mysqli_real_escape_string($link, $_GET['from_dept']);
}

// Fetch orders with filter
$where = "";
if ($from_dept !== "") {
    $where = "WHERE o.current_dept = '$from_dept'";
}
if ($from_dept !== "") {
$query = "
    SELECT o.*, d.name AS dept_name, u.name AS user_name
    FROM orders o
    LEFT JOIN departments d ON o.current_dept = d.id
    LEFT JOIN users u ON o.user_id = u.userid
    $where
    ORDER BY o.id DESC
";
$orders = mysqli_query($link, $query);
}


// Fetch all departments for dropdowns
$dept_query = "SELECT id, name,use_gold,loss FROM departments ORDER BY name ASC";
$departments = mysqli_query($link, $dept_query);

// Roles fetch
$sql48 = "SELECT * FROM departments";
$result48 = mysqli_query($link, $sql48);
$role = "";
if ($result48 && $result48->num_rows > 0) {
    $row48 = $result48->fetch_assoc();
    $role = mysqli_real_escape_string($link, $row48['role']);
}
$roles_array = explode(',', $role);

include("include/header.php");
?>

<style>
/* fade-out row highlight */
.highlighted {
    background-color: #fff3cd;
    transition: background-color 2s ease;
}
</style>

<div class="page-wrapper">
    <div class="page-content">
        <div class="col-xl-12 mx-auto">
            <h6 class="mb-0 text-uppercase">Transfer Orders</h6>
            <hr/>

            <div class="card border-top border-0 border-4 border-primary">
                <div class="card-body">

                    <?php if (isset($_SESSION['success'])): ?>
                        <div class="alert alert-success"><?= $_SESSION['success']; unset($_SESSION['success']); ?></div>
                    <?php endif; ?>

                    <?php if (isset($_SESSION['error'])): ?>
                        <div class="alert alert-danger"><?= $_SESSION['error']; unset($_SESSION['error']); ?></div>
                    <?php endif; ?>

                    <?php if (isset($_GET['success'])): ?>
                        <div class="alert alert-success">Order Deleted Successfully</div>
                    <?php endif; ?>
                    
                     <!--<div class="mb-3">-->
                     <!--       <strong>Total Weight:</strong> <span id="totalWeight">0.00</span> g-->
                     <!--       &nbsp;|&nbsp;-->
                     <!--       <strong>Total Pieces:</strong> <span id="totalPieces">0</span>-->
                     <!--   </div>-->


                    <!-- ✅ Department Filter Form -->
                    <form method="get" class="mb-3">
                        <div class="row">
                            <div class="col-6">
                                <label><strong>From Department:</strong></label>
                                <select name="from_dept" class="form-control" onchange="this.form.submit()">
                                    <option value="">-- Select Department --</option>
                                    <?php 
                                    mysqli_data_seek($departments, 0); // reset pointer
                                    while ($dept = mysqli_fetch_assoc($departments)): ?>
                                        <option value="<?= $dept['id'] ?>" <?= ($from_dept == $dept['id']) ? "selected" : "" ?>>
    <?= htmlspecialchars($dept['name']) ?> (Total Weight: <?= htmlspecialchars($dept['use_gold']) ?> g, Total Loss: <?= htmlspecialchars($dept['loss']) ?>g)
                                        </option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                        </div>
                    </form>

                    <!-- ✅ Transfer Form -->
                    <form method="post" id="transferForm" action="transfer_action.php">
                                                <input type="hidden" name="from_dept" value="<?= $from_dept ?>">

                        <?php if(in_array(2, $roles_array)){ ?>
                        <!-- Totals -->
                       
                        <div class="row mb-3">
                            <!-- To Department -->
                            <div class="col-6">
                                <label><strong>To Department:</strong></label>
                                <select name="to_dept" class="form-control" required>
                                    <option value="">-- Select Department --</option>
                                    <?php 
                                    mysqli_data_seek($departments, 0); // reset pointer again
                                    while ($dept = mysqli_fetch_assoc($departments)): ?>
                                        <option value="<?= htmlspecialchars($dept['id']) ?>">
                                            <?= htmlspecialchars($dept['name']) ?>
                                        </option>
                                    <?php endwhile; ?>
                                </select>
                            </div>

                            <!-- Date -->
                            <div class="col-6">
                                <label><strong>Date:</strong></label>
                                <input type="datetime-local" name="date"id="date" class="form-control" required>
                            </div>
                        </div>

                        <!-- Notes -->
                        <div class="mb-3">
                            <label><strong>Notes:</strong></label>
                            <textarea name="notes" class="form-control" placeholder="Enter transfer notes"></textarea>
                        </div>

                        <!-- Gold Weight -->
                        <div class="mb-3">
                            <label><strong>Gold Weight:</strong></label>
                            <input type="number" name="weight" step="0.01" class="form-control" placeholder="Enter gold weight" id="gwei" required>
                        </div>

                        <!-- Hidden Scanner Input -->
                        <input type="text" id="scannerInput" autofocus 
                               style="opacity:0; position:absolute; left:-9999px;" />

                        <div id="scanResult" class="mt-2 text-primary fw-bold"></div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-success">Transfer Selected Orders</button>
                        </div>
                        
                         <button type="button" id="toggleScanner" class="btn btn-primary">
    Start Scanner
</button>
                        <?php } ?>

                        <!-- ✅ Orders Table -->
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th><input type="checkbox" id="selectAll"></th>
                                        <th>Order Number</th>
                                        <th>Order Details</th>
                                        <th>Tracking Details</th>
                                        <!--<th>Actions</th>-->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sr = 1;
                                    if ($orders && mysqli_num_rows($orders) > 0):
                                        while ($order = mysqli_fetch_assoc($orders)):
                                            $oid = $order['id'];

                                            $sqlTrack = "SELECT ot.*, 
                d_from.name AS from_dept_name, 
                d_to.name AS to_dept_name 
            FROM order_tracking ot
            LEFT JOIN departments d_from ON ot.from_dept = d_from.id
            LEFT JOIN departments d_to ON ot.to_dept = d_to.id
            WHERE FIND_IN_SET('$oid', ot.order_id) 
            ORDER BY ot.id DESC 
            LIMIT 1";
                                                
                                            $resTrack = mysqli_query($link, $sqlTrack);
                                            $track = ($resTrack && mysqli_num_rows($resTrack) > 0) ? mysqli_fetch_assoc($resTrack) : null;
                                        ?>
                                            <tr>
                                                <td><?= $sr++ ?></td>
                                                <td>
                                                    <input type="checkbox" name="order_ids[]"
                                                           value="<?= htmlspecialchars($order['id']) ?>"
                                                           class="orderCheckbox"
                                                           data-order-number="<?= htmlspecialchars($order['order_number']) ?>"
                                                           data-weight="<?= htmlspecialchars($order['gold_weight']) ?>"
                                                           data-pieces="<?= (int)$order['description'] ?>">
                                                </td>
                                                <td><?= htmlspecialchars($order['order_number']) ?></td>
                                                <td>
                                                    <div><b>Order Pieces:</b> <?= (int)$order['description'] ?></div>
                                                    <div><b>Department: </b><?= $order['dept_name'] ?: 'Not assigned' ?></div>
                                                </td>
                                                <td>
                                                    <?php if ($track): ?>
                                                        <div><b>From:</b> <?= $track['from_dept_name'] ?: 'N/A' ?></div>
                                                        <div><b>To:</b> <?= $track['to_dept_name'] ?: 'N/A' ?></div>
                                                        <div><b>Transferred:</b> <?= $track['transferred_at'] ? date('d M Y H:i', strtotime($track['transferred_at'])) : '-' ?></div>
                                                        <div><b>Received:</b> <?= $track['success_at'] ? date('d M Y H:i', strtotime($track['success_at'])) : '-' ?></div>
                                                    <?php else: ?>
                                                        <span class="text-muted">No tracking info</span>
                                                    <?php endif; ?>
                                                </td>
                                                
                                               
                                            </tr>
                                        <?php endwhile;
                                     elseif ($from_dept !== ""): ?>
        <tr><td colspan="5" class="text-center">No orders found</td></tr>
    <?php else: ?>
        <tr><td colspan="5" class="text-center">Please select a department to view orders</td></tr>
    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'include/footer.php'; ?>

<!--<script src="https://unpkg.com/html5-qrcode"></script>-->

<script>
document.addEventListener("DOMContentLoaded", function() {
    let totalWeightEl = document.getElementById("totalWeight");
    let totalPiecesEl = document.getElementById("totalPieces");
    let gwei = document.getElementById("gwei");
    let selectAllCb = document.getElementById("selectAll");
    const scannerInput = document.getElementById("scannerInput");
    const scanResultEl = document.getElementById("scanResult");
    const notesInput = document.querySelector("textarea[name='notes']");
    const toggleBtn = document.getElementById("toggleScanner");
    let scannedCodes = [];
    let scannerActive = false;

    // Toggle button
    toggleBtn.addEventListener("click", function() {
        scannerActive = !scannerActive;
        if (scannerActive) {
            scannerInput.focus();
            toggleBtn.textContent = "Stop Scanner";
            toggleBtn.classList.remove("btn-primary");
            toggleBtn.classList.add("btn-danger");
        } else {
            toggleBtn.textContent = "Start Scanner";
            toggleBtn.classList.remove("btn-danger");
            toggleBtn.classList.add("btn-primary");
        }
    });
    
    // ðŸ”¹ Handle select all checkbox 
    if (selectAllCb) {
        selectAllCb.addEventListener("change", function() { 
            scannedCodes = [];
            document.querySelectorAll(".orderCheckbox").forEach(cb => {
                cb.checked = selectAllCb.checked; 
                if (selectAllCb.checked) {
                    let orderId = cb.dataset.orderNumber;
                    if (!scannedCodes.includes(orderId)) {
                        scannedCodes.push(orderId); } } }); updateScannedList(); updateTotals(); }); }
                        
                        document.querySelectorAll(".orderCheckbox").forEach(cb => {
                            cb.addEventListener("change", function() { 
                                let orderId = cb.dataset.orderNumber; 
                            if (cb.checked) {
                                if (!scannedCodes.includes(orderId)) { 
                                    scannedCodes.push(orderId); 
                                    
                                } 
                            } else {
                                scannedCodes = scannedCodes.filter(id => id !== orderId);
                                } updateScannedList(); updateTotals(); 
                                
                            });
                            });


    // Process scanner input on Enter
    scannerInput.addEventListener("keydown", function(e) {
        if (!scannerActive) return;
        if (e.key === "Enter") {
            e.preventDefault();
            processScan(scannerInput.value.trim());
            scannerInput.value = "";
        }
    });

    function processScan(decodedText) {
        if (!decodedText) return;

        let found = false;
        document.querySelectorAll(".orderCheckbox").forEach(cb => {
            if (cb.dataset.orderNumber === decodedText) {
                cb.checked = true;
                found = true;

                if (!scannedCodes.includes(decodedText)) {
                    scannedCodes.push(decodedText);
                }
                updateScannedList();
                updateTotals();

                let row = cb.closest("tr");
                if (row) {
                    row.scrollIntoView({ behavior: "smooth", block: "center" });
                    row.classList.add("highlighted");
                    setTimeout(() => row.classList.remove("highlighted"), 2000);
                }
            }
        });

        if (!found && notesInput) {
            notesInput.value = notesInput.value
                ? notesInput.value + ", " + decodedText
                : decodedText;
            notesInput.focus();
        }
    }

    // Update scanned list
    function updateScannedList() {
        scanResultEl.textContent = scannedCodes.length
            ? "Scanned: " + scannedCodes.join(", ")
            : "";
    }

    // Update totals
    function updateTotals() {
        let totalWeight = 0, totalPieces = 0;
        document.querySelectorAll(".orderCheckbox:checked").forEach(cb => {
            totalWeight += parseFloat(cb.dataset.weight) || 0;
            totalPieces += parseInt(cb.dataset.pieces) || 0;
        });
        if (totalWeightEl){ 
            
            totalWeightEl.textContent = totalWeight.toFixed(2);
            gwei.value = totalWeight.toFixed(2);
        }
        if (totalPiecesEl) totalPiecesEl.textContent = totalPieces;
    }

    // Keep focus on scanner only when active
    // document.addEventListener("keydown", function(e) {
    //     if (!scannerActive) return;
    //     if (e.key.length === 1 || e.key === "Enter") {
    //         if (document.activeElement !== notesInput) {
    //             scannerInput.focus();
    //         }
    //     }
    // });
    // Keep focus on scanner only when active
    document.addEventListener("keydown", function(e) {
        if (!scannerActive) return;
        if (e.key.length === 1 || e.key === "Enter") {
            if (document.activeElement !== notesInput) {
                scannerInput.focus();
            }
        }
    });

    // 🚨 Auto-disable scanner when clicking into input/select/textarea or outside
    document.addEventListener("click", function(e) {
        const target = e.target;

        if (
            target.tagName === "INPUT" ||
            target.tagName === "TEXTAREA" ||
            target.tagName === "SELECT" ||
            target.closest("#transferForm") === null // clicked outside main form
        ) {
            if (scannerActive) {
                scannerActive = false;
                toggleBtn.textContent = "Start Scanner";
                toggleBtn.classList.remove("btn-danger");
                toggleBtn.classList.add("btn-primary");
            }
        }
    });
    
    document.addEventListener("click", function(e) {
    if (scannerActive && e.target !== toggleBtn) {
        scannerActive = false;
        toggleBtn.textContent = "Start Scanner";
        toggleBtn.classList.remove("btn-danger");
        toggleBtn.classList.add("btn-primary");
    }
});

$("#date").val(new Date().toISOString().slice(0,16));

 var table = $('#example2').DataTable({
        dom: 'Bfrtip',
        pageLength: -1,
        buttons: [
            'copy', 
            'csv', 
            'excel', 
            'pdf',
            {
                extend: 'print',
                title: 'Report',
                messageTop: 'Report Generated on: <?= date("M d, Y H:i:s") ?>',
                exportOptions: {
                    columns: ':visible'
                }
            }
        ]
    });

});

</script>
<script>
    $(document).ready(function() {
			var table = $('#example').DataTable( {
				lengthChange: false,
				buttons: [ 'copy', 'excel', 'pdf', 'print']
			} );
		 
			table.buttons().container()
				.appendTo( '#example2_wrapper .col-md-6:eq(0)' );
		} );
</script>