<?php
session_start();
include("include/connection.php");

// Authentication check
if (!isset($_COOKIE['auth_token'])) {
    header("location:index.php");
    exit();
}

// Fetch all departments
$departments = $link->query("SELECT * FROM departments ORDER BY name");

// Fetch all users for dropdown
$users = $link->query("SELECT id, name FROM users ORDER BY name");

include 'include/header.php';
?>

<div class="page-wrapper">
    <div class="page-content">
        <div class="row justify-content-center">
            <div class="col-xl-8">
                <div class="card border-top border-0 border-4 border-success">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h6 class="mb-0 text-uppercase">Assign Department to User</h6>
                            <div>
                                <a href="manage_users.php" class="btn btn-info">View Users</a>
                            </div>
                        </div>
                        <hr/>
                        <form action="validation/assign_department.php" method="POST">
                            <div class="border p-4 rounded">
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">Select User</label>
                                    <div class="col-sm-9">
                                        <select name="user_id" class="form-select" required>
                                            <option value="">Select User</option>
                                            <?php while ($user = $users->fetch_assoc()): ?>
                                                <option value="<?= $user['id'] ?>">
                                                    <?= htmlspecialchars($user['name']) ?>
                                                </option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">Select Department</label>
                                    <div class="col-sm-9">
                                        <select name="department_id" class="form-select" required>
                                            <option value="">Select Department</option>
                                            <?php 
                                            $departments->data_seek(0); // Reset pointer
                                            while ($dept = $departments->fetch_assoc()): ?>
                                                <option value="<?= $dept['id'] ?>"><?= htmlspecialchars($dept['name']) ?></option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-3 col-form-label"></label>
                                    <div class="col-sm-9">
                                        <button type="submit" class="btn btn-success px-5">Assign Department</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'include/footer.php'; ?>