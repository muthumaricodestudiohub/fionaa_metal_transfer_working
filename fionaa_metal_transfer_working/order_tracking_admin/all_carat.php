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
    exit;
}

include 'include/header.php';

?>

<div class="page-wrapper">
    <div class="page-content">
        <div class="col-xl-12 mx-auto">
            <h6 class="mb-0 text-uppercase">All Carats</h6>
            <hr/>
            <div class="card border-top border-0 border-4 border-primary">
                <div class="card-body">

                    <!-- Success / Error Messages -->
                    <?php if (isset($_SESSION['success'])): ?>
                        <div class="alert alert-success">
                            <?= $_SESSION['success']; unset($_SESSION['success']); ?>
                        </div>
                    <?php endif; ?>

                    <?php if (isset($_SESSION['error'])): ?>
                        <div class="alert alert-danger">
                            <?= $_SESSION['error']; unset($_SESSION['error']); ?>
                        </div>
                    <?php endif; ?>

                    <!-- Carat Table -->
                    <div class="table-responsive">
                        <table id="example2" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Carat Name</th>
                                    <th>Percentage</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $sr = 1; 
                                $sql = "SELECT * FROM `carat` ORDER BY id DESC";
                                $carats = $link->query($sql);
                                
                                if ($carats->num_rows > 0) {
                                  // output data of each row
                                  while($carat = $carats->fetch_assoc()) {
                                      ?>
                                <tr>
                                    <td><?= $sr++ ?></td>
                                    <td><?= htmlspecialchars($carat['name']) ?></td>
                                    <td><?= htmlspecialchars($carat['percentage']) ?>%</td>
                                    <td><?= date('d M Y H:i', strtotime($carat['date'])) ?></td>
                                    <td>
                                        <a href="edit_carat.php?id=<?= $carat['id'] ?>" class="btn btn-sm btn-primary">Edit</a>
                                        <a href="delete_carat.php?id=<?= $carat['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete this carat?');">Delete</a>
                                    </td>
                                </tr>
                                <?php  
                                }
                                }
                                ?>
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
            buttons: ['copy', 'excel', 'pdf', 'print']
        });
        table.buttons().container()
            .appendTo('#example2_wrapper .col-md-6:eq(0)');
    });
</script>
