<?php
session_start();
include("include/connection.php");

// Authentication check
if (!isset($_COOKIE['auth_token'])) {
    header("location:index.php");
    exit();
}

$orderData = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $order_id = trim($_POST['order_id']);

    // Query with department join
    $stmt = $link->prepare("
        SELECT o.*, d.name ,d.total_weight,d.use_gold  
        FROM orders o
        LEFT JOIN departments d ON o.current_dept = d.id
        WHERE o.order_number = ?
    ");
    $stmt->bind_param("s", $order_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $orderData = $result->fetch_assoc();
}



include 'include/header.php';
?>

<div class="page-wrapper">
    <div class="page-content">
        <div class="row justify-content-center">
            <div class="col-xl-6">
                <form action="validation/id_track.php" method="POST">
                    <div class="card border-top border-0 border-4 border-primary">
                        <div class="card-body">
                            <h6 class="mb-0 text-uppercase">Tracking Order</h6>
                            <hr/>
                            <div class="border p-4 rounded">
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">Order Id</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="order_id" class="form-control" placeholder="Enter Order ID" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <button type="submit" class="btn btn-primary px-5">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <?php if ($orderData): ?>
            <div class="col-xl-8 mt-4">
                <div class="card border-top border-0 border-4 border-success">
                    <div class="card-body">
                        <h6 class="mb-0 text-uppercase">Order Details</h6>
                        <hr/>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Order Number</th>
                                    <td><?= htmlspecialchars($orderData['order_number']) ?></td>
                                </tr>

                                
                                <tr>
                                    <th>Transfer Gold Weight</th>
                                    <td><?= htmlspecialchars($orderData['use_gold']) ?></td>
                                </tr>
                                <tr>
                                    <th>Current Department</th>
                                    <td><?= htmlspecialchars($orderData['name'] ?? 'N/A') ?></td>
                                </tr>
                                <tr>
                                    <th>Pieces</th>
                                    <td><?= htmlspecialchars($orderData['description']) ?></td>
                                </tr>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <?php elseif ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
            <div class="col-xl-8 mt-4">
                <div class="alert alert-danger">No order found for the given Order ID.</div>
            </div>
            <?php endif; ?>
            
            
        </div>
    </div>
</div>

<?php include 'include/footer.php'; ?>
