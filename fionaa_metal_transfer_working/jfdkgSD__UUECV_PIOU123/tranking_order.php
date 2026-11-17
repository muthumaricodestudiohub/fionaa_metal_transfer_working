<?php
session_start();
include("include/connection.php");

// Debugging ke liye (production me hata dena)
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Authentication check
if (!isset($_COOKIE['auth_token'])) {
    header("location:index.php");
    exit();
}

$orderData = null;
$transfers = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $order_number = trim($_POST['order_id']);

    // ✅ Step 1: Get order details
    $stmt = $link->prepare("SELECT 
        o.id,
        o.order_number,
        o.user_id,
        o.gold_weight,
        o.current_dept,
        d.name as department_name,
        o.description,
        o.status,
        o.created_at,
        o.previous_dept
    FROM orders o
    INNER JOIN departments d ON o.current_dept = d.id
    WHERE o.order_number = ?");
    $stmt->bind_param("s", $order_number);
    $stmt->execute();
    $result = $stmt->get_result();
    $orderData = $result->fetch_assoc();


    if ($orderData) {
        $order_id = $orderData['id'];

        // ✅ Step 2: Get order tracking history
        $stmt2 = $link->prepare("SELECT 
                t.*,
                fd.name as from_department_name,
                td.name as to_department_name
            FROM order_tracking t
            LEFT JOIN departments fd ON t.from_dept = fd.id
            LEFT JOIN departments td ON t.to_dept = td.id
            WHERE FIND_IN_SET(?, t.order_id) > 0
            ORDER BY t.transferred_at ASC");
        $stmt2->bind_param("i", $order_id);
        $stmt2->execute();
        $transfers = $stmt2->get_result();

    

    }
}

include 'include/header.php';
?>

<div class="page-wrapper">
    <div class="page-content">
        <div class="row justify-content-center">
            <div class="col-xl-6">
                <form action="" method="POST">
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

            <div class="card border-top border-0 border-4 border-primary mt-3">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Transferred From (Department)</th>
                                    <th>Transferred At</th>
                                    <th>Transferred To (Department)</th>
                                    <th>Received At</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                if ($transfers && $transfers->num_rows > 0) {
                                    $sr = 1;
                                    while ($row = $transfers->fetch_assoc()) { ?>
                                        <tr>
                                            <td><?= $sr ?></td>
                                            <td><?= $row['from_department_name'] ? htmlspecialchars($row['from_department_name']) : 'Not assigned' ?></td>
                                            <td><?= date('d M Y H:i', strtotime($row['transferred_at'])) ?></td>
                                           
                                            <td><?= $row['to_department_name'] ? htmlspecialchars($row['to_department_name']) : 'Not assigned' ?></td>
                                            <td><?= $row['success_at'] ? date('d M Y H:i', strtotime($row['success_at'])) : "-" ?></td>
                                            <td>
                                               <?php 
                                                if ($row['status'] == '0') {
                                                    echo '<span class="badge bg-warning text-dark">Pending</span>';
                                                } elseif ($row['status'] == '1') {
                                                    echo '<span class="badge bg-success">Success</span>';
                                                } elseif ($row['status'] == '2') {
                                                    echo '<span class="badge bg-danger">Failed</span>';
                                                } else {
                                                    echo '<span class="badge bg-secondary">Unknown</span>';
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                        <?php
                                        $sr++;
                                    }
                                } else { ?>
                                    <tr>
                                        <td colspan="8" class="text-center">No tracking history found.</td>
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
