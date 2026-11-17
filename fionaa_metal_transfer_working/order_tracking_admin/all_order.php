<?php
session_start();
include("include/connection.php");
if (!isset($_COOKIE['auth_token'])) {
    header("location:index.php");
    exit();
}
include 'include/header.php';
$from_date ="";
$to_date = "";
$where = "1";
if (isset($_POST['filter'])) {
    if (!empty($_POST['from_date']) && !empty($_POST['to_date'])) {
        $from_date = $_POST['from_date'];
        $to_date   = $_POST['to_date'];
        $where .= " AND DATE(ot.transferred_at) BETWEEN '$from_date' AND '$to_date'";
    }
}
$orders = $link->query("
    SELECT o.*,d.name AS department_name
    FROM orders o
    LEFT JOIN departments d ON o.current_dept = d.id
    ORDER BY o.created_at DESC
");
?>
<div class="page-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h6 class="mb-0 text-uppercase">Orders History</h6>
                        </div>
                        <hr/>

                        <!-- Date Filter Form -->
                        <form method="POST" class="row g-3 mb-3">
                            <div class="col-md-3">
                                <label class="form-label">From Date</label>
                                <input type="date" name="from_date" value="<?= $from_date ?>" class="form-control">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">To Date</label>
                                <input type="date" name="to_date" value="<?= $to_date ?>" class="form-control">
                            </div>
                            <div class="col-md-3 d-flex align-items-end">
                                <button type="submit" name="filter" class="btn btn-primary">Filter</button>
                                <a href="" class="btn btn-secondary ms-2">Reset</a>
                            </div>
                        </form>

                        <div class="table-responsive">
                            <table id="example2" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Order No</th>
                                        <th>Order Details</th>
                                        <th>Tracking Details</th>
                                        <th>Tag Weight</th>
                                        <th>Gold Touch</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $sr = 1;
                                    while ($order = $orders->fetch_assoc()):
                                        $oid=$order['id'];

                                        $sqlTrack = "SELECT ot.*, d_from.name AS from_dept_name, d_to.name AS to_dept_name FROM order_tracking ot
            LEFT JOIN departments d_from ON ot.from_dept = d_from.id
            LEFT JOIN departments d_to ON ot.to_dept = d_to.id
            WHERE FIND_IN_SET('$oid', ot.order_id) ORDER BY ot.id DESC LIMIT 1";
                                        $resTrack = mysqli_query($link, $sqlTrack);
                                        $track = ($resTrack && mysqli_num_rows($resTrack) > 0) ? mysqli_fetch_assoc($resTrack) : null;
                                        if (isset($_POST['filter']) && !$track) {
                                            continue;
                                        }
                                    ?>
                                    <tr>
                                        <td><?= $sr++ ?></td>
                                        <td><?= htmlspecialchars($order['order_number']) ?></td>
                                        <td>
                                            <!--<div><b>Transfer Gold(g):</b> <?= number_format((float)$order['use_gold'], 2) ?></div>-->
                                            <div><b>Order Pieces:</b> <?= (int)$order['description'] ?></div>
                                            <div><b>Department:</b> <?= $order['department_name'] ? htmlspecialchars($order['department_name']) : 'Not assigned' ?></div>
                                        </td>
                                        <td>
                                            <?php if ($track): ?>
                                                <div><b>From:</b> <?= $track['from_dept_name'] ?: 'N/A' ?></div>
                                                <div><b>To:</b> <?= $track['to_dept_name'] ?: 'N/A' ?></div>
                                                <div><b>Transferred:</b> <?= $track['transferred_at'] ? date('d M Y H:i', strtotime($track['transferred_at'])) : '-' ?></div>
                                                <div><b>Received:</b>
                                                    <?php 
                                                    if (!empty($track['success_at'])) {
                                                        echo date('d M Y H:i', strtotime($track['success_at']));
                                                    } else {
                                                        echo "-";
                                                    }
                                                    ?>
                                                </div>
                                            <?php else: ?>
                                                <span class="text-muted">No tracking info</span>
                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo $order['tag_weight']; ?></td>
                                        <td><?php echo $order['gold_touch']; ?></td>
                                        <td>
                                            <button class="btn btn-sm btn-primary"><a style="color:white;" href="edit_order.php?id=<?php echo $order['id']; ?>">Edit</a></button>
                                            <button class="btn btn-sm btn-danger"> <a style="color:white;" href="delete_order.php?id=<?php echo $order['id']; ?>">Delete</a></button>
                                        </td>
                                    </tr>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'include/footer.php'; ?>
<script>
    $(document).ready(function() {
			var table = $('#example2').DataTable( {
				lengthChange: false,
				buttons: [ 'copy', 'excel', 'pdf', 'print']
			} );
		 
			table.buttons().container()
				.appendTo( '#example2_wrapper .col-md-6:eq(0)' );
		} );
</script>
