<?php
error_reporting(0);
ini_set('display_errors', 0);
session_start();
include("include/connection.php");

$u_uname = '';
if (isset($_COOKIE['auth_token'])) {
    $u_uname = $_COOKIE['auth_token'];
} else {
    header("location:index.php");
}

include 'include/header.php';

// Default SQL
$sql = "SELECT * FROM alloy WHERE 1";

// Apply date filter if submitted
$from_date = $to_date = "";
if (isset($_POST['filter'])) {
    if (!empty($_POST['from_date']) && !empty($_POST['to_date'])) {
        $from_date = $_POST['from_date'];
        $to_date = $_POST['to_date'];
        $sql .= " AND DATE(date) BETWEEN '$from_date' AND '$to_date'";
    }
}

$sql .= " ORDER BY date DESC";
$alloys = $link->query($sql);
?>

<div class="page-wrapper">
    <div class="page-content">
        <div class="col-xl-12 mx-auto">
            <h6 class="mb-0 text-uppercase">Alloy History</h6>
            <hr/>
            <div class="card border-top border-0 border-4 border-primary">
                <div class="card-body">

                    <!-- Success / Error Messages -->
                    <?php if (isset($_SESSION['success'])): ?>
                        <div class="alert alert-success"><?= $_SESSION['success']; unset($_SESSION['success']); ?></div>
                    <?php endif; ?>
                    
                    <?php if (isset($_SESSION['error'])): ?>
                        <div class="alert alert-danger"><?= $_SESSION['error']; unset($_SESSION['error']); ?></div>
                    <?php endif; ?>

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
                            <a href="alloy_list.php" class="btn btn-secondary ms-2">Reset</a>
                        </div>
                    </form>

                    <!-- Alloy Table -->
                    <div class="table-responsive">
                        <table id="example2" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Percentage</th>
                                    <th>Total Weight</th>
                                    <th>Created At</th>
                                    
                                    <th>Actions</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $sr = 1; 
                                while ($row = $alloys->fetch_assoc()): ?>
                                <tr>
                                    <td><?= $sr++ ?></td>
                                    <td><?= htmlspecialchars($row['name']) ?></td>
                                    <td><?= htmlspecialchars($row['percentage']) ?>%</td>
                                    <td><?= $row['total_weight'] ?></td>
                                    <td><?= $row['date'] ?></td>
                                    <td>
                                        <a href="edit_alloy.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-primary">Edit</a>
                                        <a href="delete_alloy.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete?')">Delete</a>
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

<?php include 'include/footer.php'; ?>
<script>
    $(document).ready(function() {
        var table = $('#example2').DataTable({
            lengthChange: false,
            buttons: [ 'copy', 'excel', 'pdf', 'print' ]
        });

        table.buttons().container()
            .appendTo('#example2_wrapper .col-md-6:eq(0)');
    });
</script>
