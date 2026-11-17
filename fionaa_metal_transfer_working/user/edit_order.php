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

$sql47 = "SELECT * FROM users WHERE userid='$user_id'";
$result47 = mysqli_query($link, $sql47);
if ($result47 && $result47->num_rows > 0) {
     $row47 = $result47->fetch_assoc();
        $department_id = mysqli_real_escape_string($link, $row47['department_id']);
} 

// Get order ID from URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$c_query = "SELECT * FROM carat ORDER BY name ASC";
$carat = mysqli_query($link, $c_query);

// Fetch existing order details
 $order_query = mysqli_query($link, "
    SELECT o.*, d.name 
    FROM orders o
    LEFT JOIN departments d ON o.current_dept = d.id
    WHERE o.id = $id
    LIMIT 1
");
if (!$order_query || mysqli_num_rows($order_query) === 0) {
    die("Order not found.");
}
$order = mysqli_fetch_assoc($order_query);
$weight = $order['gold_weight'];
// Handle update form
if (isset($_POST['update_order'])) {
    $gold_weight = floatval($_POST['gold_weight']);
        $pieces = mysqli_real_escape_string($link, $_POST['pieces']);
    $order_number = mysqli_real_escape_string($link, $_POST['order_number']);
    $gold_touch = mysqli_real_escape_string($link, $_POST['gold_touch']);
    $tag_weight = mysqli_real_escape_string($link, $_POST['tag_weight']);

$sql_from = "SELECT use_gold FROM departments WHERE id='$department_id'";
        $res_from = mysqli_query($link, $sql_from);
        if ($res_from && $res_from->num_rows > 0) {
            $row_from = $res_from->fetch_assoc();
            if($row_from['use_gold'] >= $gold_weight){
                $update_query = "
                UPDATE orders 
                SET order_number = $order_number,gold_weight = $gold_weight,
                    description = '$pieces',tag_weight='$tag_weight',gold_touch='$gold_touch'
                WHERE id = $id
            ";
    
                if (mysqli_query($link, $update_query)) {
                    $_SESSION['success'] = "Order updated successfully.";
                    // Redirect to all_order.php after success
                    // $order_query = mysqli_query($link, "
                    //     SELECT o.*, d.name 
                    //     FROM orders o
                    //     LEFT JOIN departments d ON o.current_dept = d.id
                    //     WHERE o.id = $id
                    //     LIMIT 1
                    // ");
                    // $order = mysqli_fetch_assoc($order_query);
                } else {
                    $_SESSION['error'] = "Error updating order: " . mysqli_error($link);
                }
                
            }else{
                  $_SESSION['error'] = "There is no Enough gold in total gold to edit order";
            }
        }else{
             $_SESSION['error'] = "Department not found";
        }
        
           header("Location: all_order.php");
                    exit;


    
}else if(isset($_POST['update_stone_weight'])){
     $stone_weight = mysqli_real_escape_string($link, $_POST['stone_weight']);
      $update_query = "
                UPDATE orders 
                SET stone_weight = '$stone_weight'
                WHERE id = $id
            ";
    
                if (mysqli_query($link, $update_query)) {
                    $_SESSION['success'] = "Stone weight updated successfully.";
                    // Redirect to all_order.php after success
                    // $order_query = mysqli_query($link, "
                    //     SELECT o.*, d.name 
                    //     FROM orders o
                    //     LEFT JOIN departments d ON o.current_dept = d.id
                    //     WHERE o.id = $id
                    //     LIMIT 1
                    // ");
                    // $order = mysqli_fetch_assoc($order_query);
                } else {
                    $_SESSION['error'] = "Error updating order: " . mysqli_error($link);
                }
                 header("Location: all_order.php");
                    exit;
}
?>

<?php include('include/header.php'); ?>

<div class="page-wrapper">
    <div class="page-content">
        <div class="row">
            <main>
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Edit Order</h1>
                </div>

                <?php if (isset($error)): ?>
                    <div class="alert alert-danger"><?= $error ?></div>
                <?php endif; ?>

                <?php if (isset($success)): ?>
                    <div class="alert alert-success"><?= $success ?></div>
                <?php endif; ?>

                <div class="card">
                    <div class="card-body">
                        <form method="POST">
                            <?php if($department_id=='67'){  ?>
                            
                          <div class="mb-3">
                                <label for="stone_weight" class="form-label">Stone Weight</label>
                                <input type="number" class="form-control" id="stone_weight" name="stone_weight" 
                                       value="<?= $order['stone_weight'] ?>" >
                            </div>
                             <button type="submit" name="update_stone_weight" class="btn btn-primary">Update Order</button>
                          <?php }else{  ?>
                          
                         <div class="mb-3">
                                <label for="order_number" class="form-label">Order Number</label>
                                <input type="text" class="form-control" id="order_number" name="order_number" 
                                       value="<?= htmlspecialchars($order['order_number']) ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="gold_weight" class="form-label">Gold Weight (grams)</label>
                                <input type="number" step="0.01" class="form-control" id="gold_weight" name="gold_weight" 
                                       value="<?= htmlspecialchars($order['gold_weight']) ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="pieces" class="form-label">Order Pieces</label>
                                <input type="number" class="form-control" id="pieces" name="pieces" 
                                       value="<?= htmlspecialchars($order['description']) ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="tag_weight" class="form-label">Tag Weight</label>
                                <input type="number" class="form-control" id="tag_weight" name="tag_weight" 
                                       value="<?= $order['tag_weight'] ?>" >
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Department</label>
                                <input type="text" class="form-control" value="<?= htmlspecialchars($order['name']) ?>" readonly>
                            </div>
                             <div class="mb-3">
                            <label><strong>Select Carat:</strong></label>
                            <select name="gold_touch" class="form-control" required>
    <option value="">-- Select Carat --</option>
    <?php if ($carat): ?>
        <?php while ($c = mysqli_fetch_assoc($carat)): ?>
            <option value="<?= htmlspecialchars($c['percentage']) ?>" 
                <?= ($order['gold_touch'] == $c['percentage']) ? 'selected' : '' ?>>
                <?= htmlspecialchars($c['name']) ?>
            </option>
        <?php endwhile; ?>
    <?php endif; ?>
</select>

                        </div>
                           <button type="submit" name="update_order" class="btn btn-primary">Update Order</button>
                          <?php } ?>
                           
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>
</div>

<?php include('include/footer.php'); ?>
