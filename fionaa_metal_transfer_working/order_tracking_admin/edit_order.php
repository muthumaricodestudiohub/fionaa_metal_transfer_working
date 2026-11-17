<?php
session_start();
include("include/connection.php");

// Authentication check
if (!isset($_COOKIE['auth_token'])) {
    header("location:index.php");
    exit();
}

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;


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

// Handle update form
if (isset($_POST['update_order'])) {
    $gold_weight = floatval($_POST['gold_weight']);
        $pieces = mysqli_real_escape_string($link, $_POST['pieces']);
    $order_number = mysqli_real_escape_string($link, $_POST['order_number']);
    $tag_weight = mysqli_real_escape_string($link, $_POST['tag_weight']);

    $update_query = "
        UPDATE orders 
        SET order_number = $order_number,gold_weight = $gold_weight,
            description = '$pieces',tag_weight = '$tag_weight'
        WHERE id = $id
    ";

    if (mysqli_query($link, $update_query)) {
        $success = "Order updated successfully.";
        // Refresh order details after update
        $order_query = mysqli_query($link, "
            SELECT o.*, d.name 
            FROM orders o
            LEFT JOIN departments d ON o.current_dept = d.id
            WHERE o.id = $id
            LIMIT 1
        ");
        $order = mysqli_fetch_assoc($order_query);
    } else {
        $error = "Error updating order: " . mysqli_error($link);
    }
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
                                <label for="tag_weight" class="form-label">Tag Weight</label>
                                <input type="number" step="0.01" class="form-control" id="tag_weight" name="tag_weight" 
                                       value="<?= htmlspecialchars($order['tag_weight']) ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="pieces" class="form-label">Order Pieces</label>
                                <input type="number" class="form-control" id="pieces" name="pieces" 
                                       value="<?= htmlspecialchars($order['description']) ?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Department</label>
                                <input type="text" class="form-control" value="<?= htmlspecialchars($order['name']) ?>" readonly>
                            </div>
                            <button type="submit" name="update_order" class="btn btn-primary">Update Order</button>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>
</div>

<?php include('include/footer.php'); ?>
