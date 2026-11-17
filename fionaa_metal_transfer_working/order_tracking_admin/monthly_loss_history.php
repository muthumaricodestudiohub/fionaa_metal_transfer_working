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
        $where .= " AND DATE(date) BETWEEN '$from_date' AND '$to_date'";
    }

    if (!empty($_POST['filter_from_dept'])) {
        $filter_from_dept = $_POST['filter_from_dept'];
        $where .= " AND from_department = '$filter_from_dept'";
    }
    
    if (!empty($_POST['filter_to_dept'])) {
        $filter_to_dept = $_POST['filter_to_dept'];
        $where .= " AND to_department = '$filter_to_dept'";
    }
}

// ---------------- Department list for dropdown ----------------
$dept_query = "SELECT id, name FROM departments ORDER BY name ASC";
$departments = $link->query($dept_query);

// ---------------- Fetch loss records ----------------
$losses = $link->query("
    SELECT 
        id, 
        from_department, 
        to_department, 
        weight, 
        date
    FROM loss
    WHERE $where  AND to_department = '70'
    ORDER BY date DESC
");
?>

<div class="page-wrapper">
    <div class="page-content">
        <div class="col-xl-12 mx-auto">
            <h6 class="mb-0 text-uppercase">Monthly Loss Tracking</h6>
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
                

                <div class="col-md-3 d-flex align-items-end">
                    <button type="submit" name="filter" class="btn btn-primary">Filter</button>
                    <a href="monthly_loss_history.php" class="btn btn-secondary ms-2">Reset</a>
                </div>
            </form>

            <div class="card border-top border-0 border-4 border-danger">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example2" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>From Department</th>
                                    <th>To Department</th>
                                    <th>Weight Loss</th>
                                    <th>Date</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $total_weight = 0; // ✅ Total weight tracker

                                if ($losses && $losses->num_rows > 0) {
                                    $sr = 1;
                                    while ($row = $losses->fetch_assoc()) { 
                                        // Get department names
                                        $from_dept_name = "Unknown";
                                        $to_dept_name = "Booked loss";
                                        
                                        if ($departments && $departments->num_rows > 0) {
                                            $departments->data_seek(0);
                                            while ($dept = $departments->fetch_assoc()) {
                                                if ($dept['id'] == $row['from_department']) {
                                                    $from_dept_name = htmlspecialchars($dept['name']);
                                                }
                                                if ($dept['id'] == $row['to_department']) {
                                                    $to_dept_name = htmlspecialchars($dept['name']);
                                                }
                                            }
                                        }
                                                    $total_weight += (float)$row['weight'];

                                        ?>
                                        <tr>
                                            <td><?= $sr ?></td>
                                            <td><?= $from_dept_name ?></td>
                                            <td><?= $to_dept_name ?></td>
                                            <td><?= number_format((float)$row['weight'], 2) ?></td>
                                            <td><?= $row['date'] ?></td>
                                           
                                        </tr>
                                        <?php
                                        $sr++;
                                    }
                                } else { ?>
                                    <tr>
                                        <td colspan="6" class="text-center">No loss records found.</td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot>
    <tr>
        <th colspan="3" class="text-end">Total Loss:</th>
        <th><?= number_format($total_weight, 2) ?></th>
        <th></th>
    </tr>
</tfoot>
                        </table>
                    </div>
                </div>
            </div>
            
            <!-- Add New Loss Record Button -->
           
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
