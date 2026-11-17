<?php
session_start();
include("include/connection.php");

// ---------------- Authentication check ----------------
if (!isset($_COOKIE['auth_token'])) {
    header("location:index.php");
    exit();
}

include 'include/header.php';

// ---------------- Filters ----------------
$from_date = $to_date = "";
$filter_from_dept = $filter_to_dept = "";
$where = "1"; // default condition

if (isset($_POST['filter'])) {
    if (!empty($_POST['from_date']) && !empty($_POST['to_date'])) {
        $from_date = $_POST['from_date'];
        $to_date   = $_POST['to_date'];
        $where .= " AND DATE(date) BETWEEN '$from_date' AND '$to_date'";
    }

    if (!empty($_POST['from_dept'])) {
        $filter_from_dept = $_POST['from_dept'];
        $where .= " AND from_dept = '$filter_from_dept'";
    }

    if (!empty($_POST['to_dept'])) {
        $filter_to_dept = $_POST['to_dept'];
        $where .= " AND to_dept = '$filter_to_dept'";
    }
}

// ---------------- Department list (store in array) ----------------
$departments = [];
$dept_query = "SELECT id, name FROM departments ORDER BY name ASC";
$result = $link->query($dept_query);
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $departments[$row['id']] = $row['name'];
    }
}

// ---------------- Fetch metal tracking records ----------------
$sql = "
    SELECT id, weight, to_dept, notes, from_dept, status, date,success_at
    FROM metal_tracking
    WHERE to_dept != from_dept AND $where
    ORDER BY date DESC
";
$records = $link->query($sql);

// ---------------- Status labels ----------------
$status_labels = [
    0 => '<span class="badge bg-warning">Pending</span>',
    3 => '<span class="badge bg-info text-dark">Waiting for Accept</span>',
    1 => '<span class="badge bg-success">Success</span>',
    2 => '<span class="badge bg-danger">Failed</span>'
];
?>

<div class="page-wrapper">
    <div class="page-content">
        <div class="col-xl-12 mx-auto">
            <h6 class="mb-0 text-uppercase">Metal Transfer History</h6>
            <hr/>

            <!-- Date & Department Filter Form -->
            <form method="POST" class="row g-3 mb-3">
                <div class="col-md-2">
                    <label class="form-label">From Date</label>
                    <input type="date" name="from_date" value="<?= htmlspecialchars($from_date) ?>" class="form-control">
                </div>
                <div class="col-md-2">
                    <label class="form-label">To Date</label>
                    <input type="date" name="to_date" value="<?= htmlspecialchars($to_date) ?>" class="form-control">
                </div>
                <div class="col-md-3">
                    <label class="form-label">From Department</label>
                    <select name="from_dept" class="form-control">
                        <option value="">-- All --</option>
                        <?php foreach ($departments as $id => $name): ?>
                            <option value="<?= $id ?>" <?= ($filter_from_dept == $id) ? 'selected' : '' ?>>
                                <?= htmlspecialchars($name) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-3">
                    <label class="form-label">To Department</label>
                    <select name="to_dept" class="form-control">
                        <option value="">-- All --</option>
                        <?php foreach ($departments as $id => $name): ?>
                            <option value="<?= $id ?>" <?= ($filter_to_dept == $id) ? 'selected' : '' ?>>
                                <?= htmlspecialchars($name) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="col-md-2 d-flex align-items-end">
                    <button type="submit" name="filter" class="btn btn-primary">Filter</button>
                    <a href="metal_transfer_history.php" class="btn btn-secondary ms-2">Reset</a>
                </div>
            </form>

            <!-- Records Table -->
            <div class="card border-top border-0 border-4 border-danger">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example2" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>From Department</th>
                                    <th>To Department</th>
                                    <th>Weight (g)</th>
                                    <th>Notes</th>
                                    <th>Status</th>
                                    <th>Transfered At</th>
                                        <th>Received At</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                if ($records && $records->num_rows > 0) {
                                    $sr = 1;
                                    while ($row = $records->fetch_assoc()) {
                                        $from_dept_name = isset($departments[$row['from_dept']]) 
                                            ? htmlspecialchars($departments[$row['from_dept']]) 
                                            : "Admin";

                                        $to_dept_name = isset($departments[$row['to_dept']]) 
                                            ? htmlspecialchars($departments[$row['to_dept']]) 
                                            : "Unknown";

                                        $status_label = isset($status_labels[$row['status']]) 
                                            ? $status_labels[$row['status']] 
                                            : '<span class="badge bg-secondary">Unknown</span>';
                                        ?>
                                        <tr>
                                            <td><?= $sr ?></td>
                                            <td><?= $from_dept_name ?></td>
                                            <td><?= $to_dept_name ?></td>
                                            <td><?= number_format((float)$row['weight'], 2) ?> g</td>
                                            <td><?= htmlspecialchars($row['notes']) ?></td>
                                            <td><?= $status_label ?></td>
                                            <td><?= htmlspecialchars($row['date']) ?></td>
                                            <td><?= htmlspecialchars($row['success_at']) ?></td>
                                        </tr>
                                        <?php
                                        $sr++;
                                    }
                                } else { ?>
                                    <tr>
                                        <td colspan="8" class="text-center">No records found.</td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="3" class="text-end">Total:</th>
                                        <th></th> <!-- Weight total goes here -->
                                    <th colspan="4"></th>
                                </tr>
                            </tfoot>
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
    var table = $('#example2').DataTable({
        lengthChange: false,
        buttons: ['copy', 'excel', 'pdf', 'print'],
        footerCallback: function ( row, data, start, end, display ) {
            var api = this.api();

            // Helper to parse numbers
            var intVal = function ( i ) {
                return typeof i === 'string'
                    ? parseFloat(i.replace(/[\$,]/g, '').replace(' g','')) || 0
                    : typeof i === 'number'
                        ? i
                        : 0;
            };

            // Total over all pages
            var total = api
                .column(3, { search: 'applied' }) // 4th column (Weight)
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );

            // Update footer
            $( api.column(3).footer() ).html(total.toFixed(2) + " g");
        }
    });

    table.buttons().container()
        .appendTo('#example2_wrapper .col-md-6:eq(0)');
});

</script>
