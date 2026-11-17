
<?php
session_start();
include("include/connection.php");
$current_time = date("M d, Y H:i:s");
if (isset($_COOKIE['uuid'])) {
    $u_uname = mysqli_real_escape_string($link, $_COOKIE['uuid']);
} else {
    $_SESSION['error'] = "Session expired. Please log in again.";
    header("location:logout.php");
    exit;
}
$sql4 = "SELECT * FROM ods WHERE uuid='$u_uname' AND status='verified'";
$result4 = mysqli_query($link, $sql4);
if ($result4 && $result4->num_rows > 0) {
    while ($row4 = $result4->fetch_assoc()) {
        $user_id = mysqli_real_escape_string($link, $row4['user_id']);
    }
} else {
    header("location:logout.php");
    exit;
}
$query12 = "SELECT * FROM users WHERE userid='$user_id'";
$data = mysqli_query($link, $query12);
$datas = $data ? $data->fetch_assoc() : null;

if (!$datas) {
    $_SESSION['error'] = "User not found.";
    header("location:logout.php");
    exit;
}
$department_id = $datas['department_id'];
 $query = "
    SELECT o.*, d.name AS dept_name, u.name AS user_name
    FROM orders o
    LEFT JOIN departments d ON o.current_dept = d.id
    LEFT JOIN users u ON o.user_id = u.userid
    WHERE o.current_dept = '$department_id'
    ORDER BY o.id DESC
";

$orders = mysqli_query($link, $query);

$dept_query = "SELECT id, name FROM departments WHERE name != 'Loss' ORDER BY name ASC";
$departments = mysqli_query($link, $dept_query);

$sql48 = "SELECT * FROM departments WHERE id='$department_id' ";
$result48 = mysqli_query($link, $sql48);
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
            <h6 class="mb-0 text-uppercase">All Orders</h6>
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

                    <form method="post" id="transferForm" action="transfer_action.php">
                        
                        <?php if(in_array(2,$roles_array)){ ?>
                        <div class="mb-3">
                            <label><strong>Select Department:</strong></label>
                            <select name="to_dept" class="form-control" required>
                                <option value="">-- Select Department --</option>
                                <?php if ($departments): ?>
                                    <?php while ($dept = mysqli_fetch_assoc($departments)): ?>
                                        <option value="<?= htmlspecialchars($dept['id']) ?>">
                                            <?= htmlspecialchars($dept['name']) ?>
                                        </option>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label><strong>Notes:</strong></label>
                            <textarea name="notes" class="form-control" placeholder="Enter transfer notes"></textarea>
                        </div>
                        <div class="row mb-3">
                                    <label><strong>Gold Weight:</strong></label>
                                    
                                        <input type="number" name="weight" id="gwei" step="0.01" class="form-control" placeholder="Enter gold weight" required>

                                </div>

<?php
 if(in_array(1,$roles_array)){
?>

                                    <div class="row mb-3">
                                    <label><strong>Scanned Gold Weight:</strong></label>
                                    
                                        <input type="number" name="scangold_weight" id="gwei1" step="0.01" class="form-control" readonly >

                                </div>

<?php
}
?>

                        
                       <input type="text" id="scannerInput" autofocus 
       style="opacity:0; position:absolute; left:-9999px;" />

<div id="scanResult" class="mt-2 text-primary fw-bold"></div>



                        <div class="mb-3">
                            <button type="submit" class="btn btn-success">Transfer Selected Orders</button>
                        </div>
                    </form>
                    <div></div>
                             <!-- <div style="text-align: center;"> -->
                                <div>
                                                        <button type="button" id="toggleScanner" class="btn btn-primary">
    Start Scanner
</button>
</div>
                        <?php } ?>

                        <!-- Barcode Scan -->
                        <!--<div class="mb-3">-->
                        <!--    <label><strong>Scan Order Barcode:</strong></label><br>-->
                        <!--    <button type="button" class="btn btn-primary" id="startScanBtn">Ã°Å¸â€œÂ· Start Camera Scan</button>-->
                        <!--    <div id="reader" style="width:300px; display:none; margin-top:10px;"></div>-->
                           <!-- Show scanned response -->
                        <!--    <div id="scanResult" class="mt-2 text-primary fw-bold"></div>-->
                        <!--</div>-->
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th><input type="checkbox" id="selectAll"></th>
                                        <th>Order Number</th>
                                        <th>Order Details</th>
                                        <th>Tracking Details</th>
                                        <?php
                                        if(in_array(0,$roles_array)){
                                        ?>
                                        <th>Weight</th>
                                        <?php
                                        }
                                        ?>
                                        <!-- <th>Tag Weight</th> -->


                                        <!-- <th>Actions </th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sr = 1;
                                    if ($orders && mysqli_num_rows($orders) > 0):
                                        while ($order = mysqli_fetch_assoc($orders)):
                                            $oid=$order['id'];
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
                                                    <?php
                                                    $oid=$order['id'];
                                                    $sql48 = "SELECT * FROM order_tracking 
          WHERE FIND_IN_SET('$oid', order_id) > 0  AND from_dept = '$department_id' AND status = '0'";

                                                    //$sql48 = "SELECT * FROM order_tracking WHERE order_id='$oid' AND from_dept = '$department_id'";
                                                    $result48 = mysqli_query($link, $sql48);
                                                    if ($result48 && $result48->num_rows > 0) {
                                                        echo "Waiting to Accept";
                                                    } else { ?>
                                                        <input type="checkbox" name="order_ids[]"
                                                               value="<?= htmlspecialchars($order['id']) ?>"
                                                               class="orderCheckbox"
                                                               data-order-number="<?= htmlspecialchars($order['order_number']) ?>"
                                                               data-weight="<?= htmlspecialchars($order['gold_weight']) ?>"
                                                               data-pieces="<?= (int)$order['description'] ?>">
                                                    <?php } ?>
                                                </td>
                                                <td><?= htmlspecialchars($order['order_number']) ?></td>
                                                <td>
                                                    <!--<div><b>Order Weight (g):</b><?= number_format((float)$order['gold_weight'], 2) ?></div>-->
                                                    <div><b>Order Pieces:</b> <?= (int)$order['description'] ?></div>
                                                    <div><b>Department: </b><?= $order['dept_name'] ? htmlspecialchars($order['dept_name']) : 'Not assigned' ?></div>
                                                </td>
                                             <td>
                                                    <?php if ($track): ?>
                                                        <div><b>From:</b><?= $track['from_dept_name'] ?: 'N/A' ?></div>
                                                        <div><b>To:</b><?= $track['to_dept_name'] ?: 'N/A' ?></div>
                                                        <div><b>Transferred:</b><?= $track['transferred_at'] ? date('d M Y H:i', strtotime($track['transferred_at'])) : '-' ?></div>
                                                        <div><b>Received:</b>
                                                            <?php 
                                                            if (!empty($track['success_at'])) {
                                                               echo date('d M Y H:i', strtotime($track['success_at']));
                                                                //  echo $track['success_at'];
                                                            } else {
                                                                echo "-";
                                                            }
                                                            ?>
                                                        </div>
                                                    <?php else: ?>
                                                        <span class="text-muted">No tracking info</span>
                                                    <?php endif; ?>
                                                </td>
                                                 <?php if(in_array(1,$roles_array)){
                                                          
                                                        ?>
                                                <td>
                                                  <?=    $order['gold_weight']; ?>
                                                </td>
 
                                                    <?php } ?>


                                                    <!-- <td> <?=    $order['tag_weight']; ?></td> -->

                                                
                                            </tr>
                                        <?php endwhile;
                                    else: ?>
                                        <tr>
                                            <td colspan="7" class="text-center">No orders found</td>
                                        </tr>
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


<script src="https://unpkg.com/html5-qrcode"></script>

<script>
document.addEventListener("DOMContentLoaded", function() {
    let totalWeightEl = document.getElementById("totalWeight");
    let totalPiecesEl = document.getElementById("totalPieces");
      let gwei = document.getElementById("gwei");
      let gwei1 = document.getElementById("gwei1");

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
                                } 
                                updateScannedList(); 
                                updateTotals(); 
                                
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
        if (totalWeightEl) {
            totalWeightEl.textContent = totalWeight.toFixed(2);
           
           
        }
        <?php if(in_array(1,$roles_array)){ ?>
          gwei.value = totalWeight.toFixed(2);
          gwei1.value = totalWeight.toFixed(3);
           <?php } ?>
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

// document.getElementById("transferForm").addEventListener("submit", function(e) {
//     let checkboxes = document.querySelectorAll(".orderCheckbox:checked");
//     let notes = document.querySelector("textarea[name='notes']").value.trim();
//     let weight = document.getElementById("gwei").value.trim();

//     if (checkboxes.length === 0 && notes === "" && (weight === "" || parseFloat(weight) === 0)) {
//         e.preventDefault();
//         alert("⚠️ Please select at least one order, or enter notes, or gold weight before submitting!");
//         return false;
//     }
// });



    // ðŸš¨ Auto-disable scanner when clicking into input/select/textarea or outside
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
});

  $(document).ready(function() {
            var table = $('#example').DataTable( {
                lengthChange: false,
                buttons: [ 'copy', 'excel', 'pdf', 'print']
            } );
         
            table.buttons().container()
                .appendTo( '#example_wrapper .col-md-6:eq(0)' );
        } );


</script>

<?php include 'include/footer.php'; ?>