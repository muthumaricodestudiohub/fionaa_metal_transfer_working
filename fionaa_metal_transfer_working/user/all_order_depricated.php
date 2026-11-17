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

// Fetch orders for the logged-in user's department (JOIN to get department name)
// $query = "SELECT o.*, d.name AS dept_name, u.name AS user_name
//     FROM orders o LEFT JOIN departments d ON o.current_dept = d.id LEFT JOIN users u ON o.user_id = u.userid 
//     WHERE o.current_dept = '$department_id'  ORDER BY o.id DESC";
  $query = "
    SELECT o.*, d.name AS dept_name, u.name AS user_name
    FROM orders o
    LEFT JOIN departments d ON o.current_dept = d.id
    LEFT JOIN users u ON o.user_id = u.userid
    WHERE o.current_dept = '$department_id' ORDER BY o.id DESC
";


//   echo $query = "
//     SELECT o.*, d.name AS dept_name, u.name AS user_name
//     FROM orders o
//     LEFT JOIN departments d ON o.current_dept = d.id
//     LEFT JOIN users u ON o.user_id = u.userid
//     WHERE o.current_dept = '$department_id'
//       AND NOT EXISTS (
//           SELECT 1 
//           FROM order_tracking ot 
//           WHERE ot.order_id = o.id 
//             AND ot.to_dept = '$department_id'
//       )
//     ORDER BY o.id DESC
// ";
$orders = mysqli_query($link, $query);
$dept_query = "SELECT id, name FROM departments ORDER BY name ASC";
$departments = mysqli_query($link, $dept_query);
$sql48 = "SELECT * FROM departments WHERE id='$department_id'";
$result48 = mysqli_query($link, $sql48);
if ($result48 && $result48->num_rows > 0) {
     $row48 = $result48->fetch_assoc();
        $role = mysqli_real_escape_string($link, $row48['role']);
} 
$roles_array = explode(',', $role); // Convert string to array
include("include/header.php");
?>
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

                    <!-- Post to backend handler -->
                    <form method="post" id="transferForm" action="transfer_action.php">
                        
                        <?php  if(in_array(2,$roles_array)){ ?>
                        <!-- Totals Display -->
                        <div class="mb-3">
                            <strong>Total Weight:</strong> <span id="totalWeight">0.00</span> g
                            &nbsp;&nbsp;|&nbsp;&nbsp;
                            <strong>Total Pieces:</strong> <span id="totalPieces">0</span>
                        </div>

                        <!-- Department Dropdown -->
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

                        <!-- Notes Textbox -->
                        <div class="mb-3">
                            <label><strong>Notes:</strong></label>
                            <textarea name="notes" class="form-control" placeholder="Enter transfer notes"></textarea>
                        </div>

                        <!-- Transfer Button -->
                        <div class="mb-3">
                            <button type="submit" class="btn btn-success">Transfer Selected Orders</button>
                        </div>
                        
                        <?php } ?>

                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th><input type="checkbox" id="selectAll"></th>
                                        <th>Order Number</th>
                                        <th>Order Weight (g)</th>
                                        <th>Order Pieces</th>
                                        <th>Department</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sr = 1;
                                    if ($orders && mysqli_num_rows($orders) > 0):
                                        while ($order = mysqli_fetch_assoc($orders)): ?>
                                            <tr>
                                                <td><?= $sr++ ?></td>
                                                <td>
                                                    <?php
                                                    $oid=$order['id'];
                                                    $sql48 = "SELECT * FROM order_tracking WHERE order_id='$oid' AND from_dept = '$department_id'";
                                                  
                                                    $result48 = mysqli_query($link, $sql48);
                                                    if ($result48 && $result48->num_rows > 0) {
                                                        $row48 = $result48->fetch_assoc();
                                                    ?>
                                                    
                                                    Already Transfered, waiting to receive
                                                    
                                                    <?php }else{ ?>
                                                    <input type="checkbox" name="order_ids[]"
                                                           value="<?= htmlspecialchars($order['id']) ?>"
                                                           class="orderCheckbox"
                                                           data-weight="<?= htmlspecialchars($order['gold_weight']) ?>"
                                                           data-pieces="<?= (int)$order['description'] ?>">
                                                    <?php } ?>
                                                </td>
                                                <td><?= htmlspecialchars($order['order_number']) ?></td>
                                                <td><?= number_format((float)$order['gold_weight'], 2) ?></td>
                                                <td><?= (int)$order['description'] ?></td>
                                                <td><?= $order['dept_name'] ? htmlspecialchars($order['dept_name']) : 'Not assigned' ?></td>
                                                <td>
                                                    <?php 
                                                    $hasPermission = false;

                                                    if(in_array(3,$roles_array)){
                                                     $hasPermission = true;
                                                    ?>
                                                    <a href="edit_order.php?id=<?= htmlspecialchars($order['id']) ?>" class="btn btn-sm btn-primary">Edit</a>
                                                    <?php } if(in_array(4,$roles_array)){ 
                                                     $hasPermission = true; 
                                                     ?>
                                                    <a href="delete_order.php?id=<?= htmlspecialchars($order['id']) ?>" class="btn btn-sm btn-danger">Delete</a>
                                                    <?php } 
                                                    if (!$hasPermission) {
                                                        echo "-";
                                                    }
                                                    ?>
                                                </td>
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

<?php include 'include/footer.php'; ?>

<script>
document.addEventListener("DOMContentLoaded", function() {
    let totalWeightEl = document.getElementById("totalWeight");
    let totalPiecesEl = document.getElementById("totalPieces");
    let selectAll = document.getElementById("selectAll");

    function updateTotals() {
        let totalWeight = 0;
        let totalPieces = 0;
        document.querySelectorAll(".orderCheckbox:checked").forEach(cb => {
            totalWeight += parseFloat(cb.dataset.weight) || 0;
            totalPieces += parseInt(cb.dataset.pieces) || 0;
        });
        totalWeightEl.textContent = totalWeight.toFixed(2);
        totalPiecesEl.textContent = totalPieces;
    }

    // Select/Deselect All
    if (selectAll) {
        selectAll.addEventListener("change", function() {
            document.querySelectorAll(".orderCheckbox").forEach(cb => {
                cb.checked = selectAll.checked;
            });
            updateTotals();
        });
    }

    // Update totals on individual checkbox change
    document.querySelectorAll(".orderCheckbox").forEach(cb => {
        cb.addEventListener("change", updateTotals);
    });
});
</script>