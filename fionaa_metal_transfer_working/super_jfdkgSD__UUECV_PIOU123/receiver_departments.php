<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include("include/connection.php");
include("include/header.php");

// Authentication check
if (!isset($_COOKIE['auth_token'])) {
    header("location:index.php");
    exit();
}

$sql48 = "SELECT * FROM departments where admin='1'";
$result48 = mysqli_query($link, $sql48);
if ($result48 && $result48->num_rows > 0) {
     $row48 = $result48->fetch_assoc();
        $role = mysqli_real_escape_string($link, $row48['role']);
        $total_weight = mysqli_real_escape_string($link, $row48['use_gold']);
        $department_id = mysqli_real_escape_string($link, $row48['id']);
} 
$roles_array = explode(',', $role); // Convert string to array


// --- When Status Update Happens ---
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ot_id'], $_POST['status'], $_POST['from_dept'], $_POST['order_id'], $_POST['weight'], $_POST['total_weight'])) {
    
    $ot_id   = mysqli_real_escape_string($link, $_POST['ot_id']);
    $status  = mysqli_real_escape_string($link, $_POST['status']);
    $from_dept = mysqli_real_escape_string($link, $_POST['from_dept']);
    $order_id_raw  = mysqli_real_escape_string($link, $_POST['order_id']);
    $weight  = mysqli_real_escape_string($link, $_POST['weight']);
    $total_weight  = mysqli_real_escape_string($link, $_POST['total_weight']);
    $success_at = date("Y-m-d H:i:s");

    // Split multiple order IDs
    $order_ids = array_map('trim', explode(',', $order_id_raw));

    // 1. Update order_tracking status
    $update_sql = "UPDATE order_tracking 
                      SET status='$status',
                          success_at='$success_at' 
                   WHERE id='$ot_id'";

    if (mysqli_query($link, $update_sql)) {

        // 2. Update each order current_dept
        foreach ($order_ids as $oid) {
            if (!is_numeric($oid)) continue;
            mysqli_query($link, "UPDATE orders SET current_dept='$department_id', status='success' WHERE id='$oid'");
        }

        // 3. Handle use_gold transfer between departments
        // --- From Department (minus use_gold) ---
        $sql_from = "SELECT use_gold FROM departments WHERE id='$from_dept'";
        $res_from = mysqli_query($link, $sql_from);
        if ($res_from && $res_from->num_rows > 0) {
            $row_from = $res_from->fetch_assoc();
            $from_use_gold = $row_from['use_gold'] - $weight;
            mysqli_query($link, "UPDATE departments SET use_gold='$from_use_gold' WHERE id='$from_dept'");

            echo "<script>console.log('From Dept ($from_dept) Old use_gold: {$row_from['use_gold']}, Transferred: $weight, New use_gold: $from_use_gold');</script>";
        }

        // --- To Department (plus use_gold) ---
        $sql_to = "SELECT use_gold FROM departments WHERE id='$department_id'";
        $res_to = mysqli_query($link, $sql_to);
        if ($res_to && $res_to->num_rows > 0) {
            $row_to = $res_to->fetch_assoc();
            $to_use_gold = $row_to['use_gold'] + $weight;
            mysqli_query($link, "UPDATE departments SET use_gold='$to_use_gold' WHERE id='$department_id'");

            echo "<script>console.log('To Dept ($department_id) Old use_gold: {$row_to['use_gold']}, Received: $weight, New use_gold: $to_use_gold');</script>";
        }

        $_SESSION['success'] = "Order status & gold transfer updated successfully.";
    } else {
        $_SESSION['error'] = "Failed to update status. Please try again.";
    }
}
 

$transfers = $link->query("
    SELECT 
        ot.id, 
        ot.order_id, 
        ot.notes, 
        ot.transferred_at,
        ot.status,
        ot.from_dept,
        ot.weight,
        d_to.name AS to_department_name,
        d_from.name AS from_department_name
    FROM order_tracking ot
    LEFT JOIN departments d_to ON ot.to_dept = d_to.id
    LEFT JOIN departments d_from ON ot.from_dept = d_from.id
    WHERE ot.status = '0' 
");
?>
<div class="page-wrapper">
    <div class="page-content">
        <div class="col-xl-12 mx-auto">
<?php
// ✅ Success/Error alerts
if (isset($_SESSION['success'])) {
    echo '<div class="alert alert-success">'.$_SESSION['success'].'</div>';
    unset($_SESSION['success']);
}
if (isset($_SESSION['error'])) {
    echo '<div class="alert alert-danger">'.$_SESSION['error'].'</div>';
    unset($_SESSION['error']);
}
?>
 <h6 class="mb-0 text-uppercase">Incomming Transfer History</h6>
            <hr/>
            <div class="card border-top border-0 border-4 border-primary">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Order ID</th>
                                    <th>Transferred From (Department)</th>
                                    <th>Transferred To (Department)</th>
                                    <th>Notes</th>
                                    <th>Order Details</th>
                                    <th>Transferred At</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                if ($transfers && $transfers->num_rows > 0) {
                                    $sr = 1;
                                    while ($row = $transfers->fetch_assoc()) { ?>
                                        <tr>
                                            <td><?php echo $sr; ?></td>
                                            <td>
    <?php  
    $order_ids = explode(',', $row['order_id']); // multiple IDs split
    $order_numbers = [];

    foreach ($order_ids as $oid) {
        $oid = trim($oid);
        if (!is_numeric($oid)) continue; // safety check

        $sql46 = "SELECT order_number, description FROM orders WHERE id='$oid'";
        $result46 = mysqli_query($link, $sql46);
        if ($result46 && $result46->num_rows > 0) {
            $row46 = $result46->fetch_assoc();
            $order_numbers[] = htmlspecialchars($row46['order_number']);
            $pieces = (int)$row46['description']; // last one saved, you can also sum them if needed
        }
    }

    if (!empty($order_numbers)) {
        echo implode(", ", $order_numbers);
    } else {
        echo "N/A";
    }
    ?>
</td>

                                            <td><?php echo $row['from_department_name'] ? htmlspecialchars($row['from_department_name']) : 'Not assigned'; ?></td>
                                            <td><?php echo $row['to_department_name'] ? htmlspecialchars($row['to_department_name']) : 'Not assigned'; ?></td>
                                            
                                            <td><?php echo htmlspecialchars($row['notes']); ?></td>
                                            
                                            <td>
                                                <div><b>Pieces:</b> <?= $pieces ?></div>
                                            </td>
                                            <td><?php echo date('d M Y H:i', strtotime($row['transferred_at'])); ?></td>
                                            
                                            <td>
                                                <?php
                                                if(in_array(5,$roles_array)){
                                                    ?>
                                                <form method="post" action="" onsubmit="showLoader()">
                                                    <input type="hidden" name="ot_id" value="<?php echo $row['id']; ?>">
                                                    <input type="hidden" name="order_id" value="<?php echo $row['order_id']; ?>">
                                                    <input type="hidden" name="from_dept" value="<?php echo $row['from_dept']; ?>">
                                                    <input type="hidden" name="weight" value="<?php echo $row['weight']; ?>">
                                                    <input type="hidden" name="total_weight" value="<?php echo $row48['use_gold']; ?>">
                                                    <select name="status" class="form-select form-select-sm" onchange="this.form.submit()">
                                                        <option value="0" <?php if ($row['status'] == '0') echo 'selected'; ?>>Pending</option>
                                                        <option value="1" <?php if ($row['status'] == '1') echo 'selected'; ?>>Success</option>

                                                    </select>
                                                </form>
                                                <?php 
                                                }else{
                                                    echo "No Permission";
                                                }?>
                                            </td>
                                            
                                        </tr>
                                    <?php
                                    $sr++;
                                    }
                                } else { ?>
                                    <tr>
                                        <td colspan="7" class="text-center">No transfer history found.</td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'include/footer.php'; ?>