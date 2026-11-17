<?php
session_start();
include("include/connection.php");

$u_uname = '';
if (isset($_COOKIE['auth_token'])) {
    $u_uname = $_COOKIE['auth_token'];
} else {
    header("location:index.php");
}

include 'include/header.php';
?>

<div class="page-wrapper">
    <div class="page-content">
        <form action="validation/add_alloy.php" method="POST">
            <div class="col-xl-6 mx-auto">
                <h6 class="mb-0 text-uppercase">Add New Alloy</h6>
                <hr/>
                <div class="card border-top border-0 border-4 border-info">
                    <div class="card-body">
                         
                        <div class="border p-4 rounded">
                            <!-- Alloy Name -->
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Alloy Name</label>
                                <div class="col-sm-9">
                                    <input type="text" name="name" class="form-control" placeholder="Enter alloy name" required>
                                </div>
                            </div>

                            <!-- Alloy Percentage -->
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Percentage</label>
                                <div class="col-sm-9">
                                    <input type="number" step="0.01" name="percentage" class="form-control" placeholder="Enter percentage" required>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="row">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-primary px-5">Add Alloy</button>
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
