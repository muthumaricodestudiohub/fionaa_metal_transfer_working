<?php
session_start();
include("../include/connection.php");

// Check authentication
if(!isset($_SESSION['user_id'])) {
    header("location:../index.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Search functionality
$search = '';
if(isset($_GET['search'])) {
    $search = mysqli_real_escape_string($conn, $_GET['search']);
    $where = "AND (o.order_number LIKE '%$search%' OR d.name LIKE '%$search%')";
} else {
    $where = '';
}

// Get all orders created by user or in user's departments
$orders = mysqli_query($conn, "SELECT o.*, d.name as dept_name 
                              FROM orders o 
                              JOIN departments d ON o.current_dept=d.id 
                              WHERE (o.user_id=$user_id OR o.current_dept IN (
                                  SELECT department_id FROM user_departments WHERE user_id=$user_id
                              )) $where 
                              ORDER BY o.created_at DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders</title>
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/user.css" rel="stylesheet">
</head>
<body>
    <?php include('../include/user_header.php'); ?>
    
    <div class="container-fluid">
        <div class="row">
            <?php include('../include/user_sidebar.php'); ?>
            
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">My Orders</h1>
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <div class="btn-group me-2">
                            <a href="add_order.php" class="btn btn-sm btn-primary">Add New</a>
                        </div>
                        <form class="d-flex" method="GET">
                            <input class="form-control me-2" type="search" name="search" placeholder="Search" value="<?php echo $search; ?>">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                    </div>
                </div>
                
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>Order #</th>
                                <th>Weight (g)</th>
                                <th>Current Dept</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($order = mysqli_fetch_assoc($orders)): ?>
                                <tr>
                                    <td><?php echo $order['order_number']; ?></td>
                                    <td><?php echo $order['gold_weight']; ?></td>
                                    <td><?php echo $order['dept_name']; ?></td>
                                    <td><?php echo ucfirst($order['status']); ?></td>
                                    <td><?php echo date('d M Y H:i', strtotime($order['created_at'])); ?></td>
                                    <td>
                                        <a href="order_details.php?id=<?php echo $order['id']; ?>" class="btn btn-sm btn-info">View</a>
                                        <?php if($order['user_id'] == $user_id): ?>
                                            <a href="edit_order.php?id=<?php echo $order['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </main>
        </div>
    </div>
    
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>