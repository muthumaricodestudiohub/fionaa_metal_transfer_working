<?php
session_start();
include("include/connection.php");

$current_time = date("M d, Y H:i:s");

// ✅ Validate UUID cookie
if (isset($_COOKIE['uuid'])) {
    $u_uname = mysqli_real_escape_string($link, $_COOKIE['uuid']);
} else {
    $_SESSION['error'] = "Session expired. Please log in again.";
    header("location:logout.php");
    exit;
}

// ✅ Verify user
$sql4 = "SELECT * FROM ods WHERE uuid='$u_uname' AND status='verified'";
$result4 = mysqli_query($link, $sql4);
if ($result4 && $result4->num_rows > 0) {
    $row4 = $result4->fetch_assoc();
    $user_id = mysqli_real_escape_string($link, $row4['user_id']);
} else {
    header("location:logout.php");
    exit;
}

// ✅ Update status if dropdown submitted    
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ot_id'], $_POST['status'], $_POST['from_dept'], $_POST['order_id'])) {

    $ot_id   = mysqli_real_escape_string($link, $_POST['ot_id']);
    $status  = mysqli_real_escape_string($link, $_POST['status']);
    $from_dept = mysqli_real_escape_string($link, $_POST['from_dept']);
    $order_id  = mysqli_real_escape_string($link, $_POST['order_id']);

    // Update order_tracking table
    $update_sql = "UPDATE order_tracking SET status='$status' WHERE id='$ot_id'";
    if (mysqli_query($link, $update_sql)) {

        // If status is success, update orders table current_dept
        // if ($status == '1') {
            mysqli_query($link, "UPDATE orders SET current_dept='$from_dept',status='success' WHERE id='$order_id'");
        // }

        $_SESSION['success'] = "Order status updated successfully.";
    } else {
        $_SESSION['error'] = "Failed to update status. Please try again.";
    }

    // Refresh page to avoid resubmission
    header("Location: pending_history.php");
    exit;
}

include("include/header.php");

// ✅ Success/Error alerts
if (isset($_SESSION['success'])) {
    echo '<div class="alert alert-success">'.$_SESSION['success'].'</div>';
    unset($_SESSION['success']);
}
if (isset($_SESSION['error'])) {
    echo '<div class="alert alert-danger">'.$_SESSION['error'].'</div>';
    unset($_SESSION['error']);
}

// ✅ Fetch transfer history
$transfers = $link->query("
    SELECT 
        ot.id, 
        ot.order_id, 
        ot.notes, 
        ot.transferred_at,
        ot.status,
        ot.from_dept,
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
            <h6 class="mb-0 text-uppercase">Pending Transfer History</h6>
            <hr/>
            <div class="card border-top border-0 border-4 border-primary">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Sr.no</th>
                                    <th>Order ID</th>
                                    <th>Transferred To (Department)</th>
                                    <th>Transferred From (Department)</th>
                                    <th>Notes</th>
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
                                                $order_id = $row['order_id'];
                                                $sql46 = "SELECT * FROM orders WHERE id='$order_id'";
                                                $result46 = mysqli_query($link, $sql46);
                                                if ($result46 && $result46->num_rows > 0) {
                                                    $row46 = $result46->fetch_assoc();
                                                    echo htmlspecialchars($row46['order_number']);
                                                } else {
                                                    echo "N/A";
                                                }
                                                ?>
                                            </td>
                                            <td><?php echo $row['to_department_name'] ? htmlspecialchars($row['to_department_name']) : 'Not assigned'; ?></td>
                                            <td><?php echo $row['from_department_name'] ? htmlspecialchars($row['from_department_name']) : 'Not assigned'; ?></td>
                                            <td><?php echo htmlspecialchars($row['notes']); ?></td>
                                            <td><?php echo date('d M Y H:i', strtotime($row['transferred_at'])); ?></td>
                                            <td>
                                                <form method="post" action="">
                                                    <input type="hidden" name="ot_id" value="<?php echo $row['id']; ?>">
                                                    <input type="hidden" name="order_id" value="<?php echo $row['order_id']; ?>">
                                                    <input type="hidden" name="from_dept" value="<?php echo $row['from_dept']; ?>">
                                                    <select name="status" class="form-select form-select-sm" onchange="this.form.submit()">
                                                        <option value="0" <?php if ($row['status'] == '0') echo 'selected'; ?>>Pending</option>
                                                        <option value="1" <?php if ($row['status'] == '1') echo 'selected'; ?>>Success</option>

                                                    </select>
                                                </form>
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
