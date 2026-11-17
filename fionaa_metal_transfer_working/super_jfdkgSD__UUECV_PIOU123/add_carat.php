<?php
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
            <!-- ✅ Success / Error Messages -->
        <?php if (isset($_SESSION['success'])): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= $_SESSION['success']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php unset($_SESSION['success']); ?>
        <?php endif; ?>

        <?php if (isset($_SESSION['error'])): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= $_SESSION['error']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php unset($_SESSION['error']); ?>
        <?php endif; ?>
        <!-- ✅ End Messages -->

        <form action="validation/add_carat.php" method="POST">
            <div class="col-xl-6 mx-auto">
                <h6 class="mb-0 text-uppercase">Add New Carat</h6>
                <hr/>
                <div class="card border-top border-0 border-4 border-info">
                    <div class="card-body">
                        <div class="border p-4 rounded">
                            
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Carat Name</label>
                                <div class="col-sm-9">
                                    <input type="text" name="name" class="form-control" placeholder="Enter carat name" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Percentage</label>
                                <div class="col-sm-9">
                                    <input type="number" step="0.01" name="percentage" class="form-control" placeholder="Enter percentage" required>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-primary px-5">Add Carat</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<?php include 'include/footer.php'; ?>
