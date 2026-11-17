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

        <form action="validation/add_user.php" method="POST">
            <div class="col-xl-6 mx-auto">
                <h6 class="mb-0 text-uppercase">Add New User</h6>
                <hr/>
                <div class="card border-top border-0 border-4 border-info">
                    <div class="card-body">
                         
                        <div class="border p-4 rounded">
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Full Name</label>
                                <div class="col-sm-9">
                                    <input type="text" name="name" class="form-control" placeholder="Enter full name" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">User ID</label>
                                <div class="col-sm-9">
                                    <input type="text" name="userid" class="form-control" placeholder="Enter user ID" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Mobile Number</label>
                                <div class="col-sm-9">
                                    <input type="text" name="mobile" class="form-control" placeholder="Enter mobile number" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Password</label>
                                <div class="col-sm-9">
                                    <input type="password" name="password" class="form-control" placeholder="Enter password" required>
                                </div>
                            </div>

                             <div class="row mb-3">
                            <label class="col-sm-3 col-form-label">Select Department:</label>
                            <div class="col-sm-9">
                                 <?php
                                 $dept_query = "SELECT id, name FROM departments ORDER BY name ASC";
$departments = mysqli_query($link, $dept_query);

                                 ?>
                            <select name="department" class="form-control" required>
                                <option value="">-- Select Department --</option>
                                <?php if ($departments): ?>
                                    <?php while ($dept = mysqli_fetch_assoc($departments)): ?>
                                        <option value="<?= htmlspecialchars($dept['id']) ?>">
                                            <?= htmlspecialchars($dept['name']) ?>
                                        </option>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                            </select>
                            </div>
                        </div>

                            <div class="row">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-primary px-5">Add User</button>
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