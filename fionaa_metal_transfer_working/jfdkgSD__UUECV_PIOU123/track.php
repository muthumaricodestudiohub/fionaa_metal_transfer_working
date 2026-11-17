<?php
session_start();
include("include/connection.php");

// Authentication check
if (!isset($_COOKIE['auth_token'])) {
    header("location:index.php");
    exit();
}

include 'include/header.php';

// ---------------- Filters ----------------
$from_date = $to_date = $filter_from_dept = $filter_to_dept = "";
$where = "1"; // default condition

if (isset($_POST['filter'])) {
    if (!empty($_POST['from_date']) && !empty($_POST['to_date'])) {
        $from_date = $_POST['from_date'];
        $to_date   = $_POST['to_date'];
        $where .= " AND DATE(ot.transferred_at) BETWEEN '$from_date' AND '$to_date'";
    }

    if (!empty($_POST['filter_from_dept'])) {
        $filter_from_dept = $_POST['filter_from_dept'];
        $where .= " AND ot.from_dept = '$filter_from_dept'";
    }
    
    if (!empty($_POST['filter_to_dept'])) {
        $filter_to_dept = $_POST['filter_to_dept'];
        $where .= " AND ot.to_dept = '$filter_to_dept'";
    }
}

// ---------------- Department list for dropdown ----------------
$dept_query = "SELECT id, name FROM departments ORDER BY name ASC";
$departments = $link->query($dept_query);

// ---------------- Fetch transfers ----------------
$transfers = $link->query("
    SELECT 
        ot.id, 
        ot.order_id, 
        ot.notes, 
        ot.status,
        ot.transferred_at,
        ot.success_at,
        d_to.use_gold,
        d_to.name AS to_department_name,
        d_from.name AS from_department_name
    FROM order_tracking ot
    LEFT JOIN departments d_to ON ot.to_dept = d_to.id
    LEFT JOIN departments d_from ON ot.from_dept = d_from.id
    WHERE $where
    ORDER BY ot.transferred_at DESC
");
?>

<div class="page-wrapper">
    <div class="page-content">
        <div class="col-xl-12 mx-auto">
            <h6 class="mb-0 text-uppercase">Transfer History</h6>
            <hr/>

            <!-- Date + Department Filter Form -->
            <form method="POST" class="row g-3 mb-3">
                <div class="col-md-3">
                    <label class="form-label">From Date</label>
                    <input type="date" name="from_date" value="<?= $from_date ?>" class="form-control">
                </div>
                <div class="col-md-3">
                    <label class="form-label">To Date</label>
                    <input type="date" name="to_date" value="<?= $to_date ?>" class="form-control">
                </div>
                <div class="col-md-3">
                    <label class="form-label">From Department</label>
                    <select name="filter_from_dept" class="form-control">
                        <option value="">-- All Departments --</option>
                        <?php 
                        if ($departments && $departments->num_rows > 0) {
                            // Reset pointer to reuse the same result set
                            $departments->data_seek(0);
                            while ($dept = $departments->fetch_assoc()) { ?>
                                <option value="<?= $dept['id'] ?>" 
                                    <?= ($filter_from_dept == $dept['id']) ? "selected" : "" ?>>
                                    <?= htmlspecialchars($dept['name']) ?>
                                </option>
                        <?php } } ?>
                    </select>
                </div>
                
                <div class="col-md-3">
                    <label class="form-label">To Department</label>
                    <select name="filter_to_dept" class="form-control">
                        <option value="">-- All Departments --</option>
                        <?php 
                        if ($departments && $departments->num_rows > 0) {
                            // Reset pointer to reuse the same result set
                            $departments->data_seek(0);
                            while ($dept = $departments->fetch_assoc()) { ?>
                                <option value="<?= $dept['id'] ?>" 
                                    <?= ($filter_to_dept == $dept['id']) ? "selected" : "" ?>>
                                    <?= htmlspecialchars($dept['name']) ?>
                                </option>
                        <?php } } ?>
                    </select>
                </div>
                <div class="col-md-3 d-flex align-items-end">
                    <button type="submit" name="filter" class="btn btn-primary">Filter</button>
                    <a href="track.php" class="btn btn-secondary ms-2">Reset</a>
                </div>
            </form>

            <div class="card border-top border-0 border-4 border-primary">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example2" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Order No</th>
                                    <th>Transferred From (Department)</th>
                                    <th>Transferred To (Department)</th>
                                    <th>Notes</th>
                                    <th>Order Details</th>
                                    <th>Transferred At</th>
                                    <th>Received At</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                if ($transfers && $transfers->num_rows > 0) {
                                    $sr = 1;
                                    while ($row = $transfers->fetch_assoc()) { 
                                         $order_ids_str = $row['order_id'];
                                        $order_ids = array_filter(explode(',', $order_ids_str));

                                        $order_numbers = [];
                                        $total_pieces = 0;
                                        $total_weight = 0;
                                        $order_status = "unknown";
                                         $ordert_status = $row['status'];
                                        
                                        if (!empty($order_ids)) {
                                            $ids_in = implode("','", array_map('intval', $order_ids));
                                            $sql46 = "SELECT order_number, status, gold_weight, description 
                                                      FROM orders 
                                                      WHERE id IN ('$ids_in')";
                                            $result46 = mysqli_query($link, $sql46);

                                            if ($result46 && $result46->num_rows > 0) {
                                                while ($row46 = $result46->fetch_assoc()) {
                                                    $order_numbers[] = htmlspecialchars($row46['order_number']);
                                                    $total_pieces += (int)$row46['description'];
                                                    $total_weight += (float)$row46['gold_weight'];
                                                    $order_status = $row46['status']; 
                                                }
                                            }
                                        }
                                        ?>
                                        <tr>
                                            <td><?= $sr ?></td>
                                            <td><?= implode(", ", $order_numbers) ?></td>
                                            <td><?= $row['from_department_name'] ? htmlspecialchars($row['from_department_name']) : 'Not assigned' ?></td>
                                            <td><?= $row['to_department_name'] ? htmlspecialchars($row['to_department_name']) : 'Not assigned' ?></td>
                                            <td><?= htmlspecialchars($row['notes']) ?></td>
                                            <td>
                                                <div><b>Transfer Gold(g):</b> <?= number_format((float)$row['use_gold'], 2) ?></div>
                                                <div><b>Pieces:</b> <?= $total_pieces ?></div>
                                            </td>
                                            <td><?= date('d M Y H:i', strtotime($row['transferred_at'])) ?></td>
                                            <td>
                                                <?= $row['success_at'] ? date('d M Y H:i', strtotime($row['success_at'])) : "-" ?>
                                            </td>
                                            <td>
                                               <?php 
                                                if ($ordert_status == '0') {
                                                    echo '<span class="badge bg-warning text-dark">Pending</span>';
                                                } elseif ($ordert_status == '1') {
                                                    echo '<span class="badge bg-success">Success</span>';
                                                } elseif ($ordert_status == '2') {
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
                                        <td colspan="9" class="text-center">No transfer history found.</td>
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