<?php
  ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
session_start();
include("include/connection.php");
$current_time = date("M d, Y H:i:s");

// Check UUID cookie
if (isset($_COOKIE['uuid'])) {
    $uuid_cookie = mysqli_real_escape_string($link, $_COOKIE['uuid']);
} else {
    $uuid_cookie = '';
}

// Validate user session
$sql4 = "SELECT * FROM ods WHERE uuid='$uuid_cookie' AND status='verified'";
$result4 = mysqli_query($link, $sql4);

if ($result4 && mysqli_num_rows($result4) > 0) {
    $row4 = mysqli_fetch_assoc($result4);
    $user_id = mysqli_real_escape_string($link, $row4['user_id']);
} else {
    header("location:logout.php");
    exit;
}

$order_id = intval($_GET['id']);

// Get order details
$order_query = mysqli_query($link, "SELECT o.*, d.name as dept_name 
                                  FROM orders o 
                                  JOIN departments d ON o.current_dept=d.id 
                                  WHERE o.id=$order_id");
if(mysqli_num_rows($order_query) == 0) {
    $error = "No order";
}

$order = mysqli_fetch_assoc($order_query);

// Check if user is assigned to current department
$check_dept = mysqli_query($link, "SELECT id FROM users 
                                  WHERE userid='$user_id' AND department_id=".$order['current_dept']);
if(mysqli_num_rows($check_dept) == 0) {
    $error = "You are not authorized to transfer this order";
    // header("location:transfer_order.php");
    // exit();
}

$depts = mysqli_query($link, "SELECT * FROM departments WHERE id!=".$order['current_dept']." ORDER BY name");

if(isset($_POST['transfer_order'])) {
    $to_dept = intval($_POST['to_dept']);
    $notes = mysqli_real_escape_string($link, $_POST['notes']);
    
    mysqli_query($link, "UPDATE orders SET current_dept=$to_dept WHERE id=$order_id");
    $track_query = "INSERT INTO order_tracking (order_id, from_dept, to_dept, transferred_by, notes) 
                   VALUES ($order_id, ".$order['current_dept'].", $to_dept, '$user_id', '$notes')";
    mysqli_query($link, $track_query);
    
    $success = "Order transferred successfully";
  
}
?> <?php include('include/header.php'); ?>
<div class="page-wrapper">
    <div class="page-content">
        <div class="row">
            <main>
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Transfer Order</h1>
                </div>
                <?php if (isset($error)): ?>
                    <div class="alert alert-danger"><?php echo $error; ?></div>
                <?php endif; ?>

                <?php if (isset($success)): ?>
                    <div class="alert alert-success"><?php echo $success; ?></div>
                <?php endif; ?>

                <div class="card">
                    <div class="card-body">
                        <div class="mb-4">
                            <h5>Order Details</h5>
                            <p><strong>Order #:</strong> <?php echo $order['order_number']; ?></p>
                            <p><strong>Weight:</strong> <?php echo $order['gold_weight']; ?>g</p>
                            <p><strong>Current Department:</strong> <?php echo $order['dept_name']; ?></p>
                        </div>
                        
                        <form method="POST">
                            <div class="mb-3">
                                <label for="to_dept" class="form-label">Transfer To Department</label>
                                <select class="form-select" id="to_dept" name="to_dept" required>
                                    <option value="">Select Department</option>
                                    <?php while($dept = mysqli_fetch_assoc($depts)): ?>
                                        <option value="<?php echo $dept['id']; ?>"><?php echo $dept['name']; ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="notes" class="form-label">Notes</label>
                                <textarea class="form-control" id="notes" name="notes" rows="3"></textarea>
                            </div>
                            <button type="submit" name="transfer_order" class="btn btn-primary">Transfer Order</button>
                            <a href="transfer_order.php" class="btn btn-secondary">Cancel</a>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>
</div>    
<?php include('include/footer.php'); ?>