<?php
session_start();
include("include/connection.php");

// Check if super admin is logged in
$u_uname = '';
    if (isset($_COOKIE['auth_token'])) {
        $u_uname = $_COOKIE['auth_token'];
    } else {
        header("location:index.php");
    }


// Check if user ID is provided
if (!isset($_GET['id'])) {
    header("location:all_users.php");
    exit();
}

$user_id = intval($_GET['id']);

// Fetch user details
$user_query = $link->prepare("SELECT * FROM users WHERE id = ?");
$user_query->bind_param("i", $user_id);
$user_query->execute();
$user_result = $user_query->get_result();

if ($user_result->num_rows == 0) {
    $_SESSION['error'] = "User not found!";
    header("location:all_users.php");
    exit();
}

$user = $user_result->fetch_assoc();

include 'include/header.php';
?>

<div class="page-wrapper">
    <div class="page-content">
        <form action="validation/update_user.php" method="POST">
            <input type="hidden" name="id" value="<?= htmlspecialchars($user['id']) ?>">
            <div class="col-xl-6 mx-auto">
                <h6 class="mb-0 text-uppercase">Edit User</h6>
                <hr/>
                <div class="card border-top border-0 border-4 border-primary">
                    <div class="card-body">
                        <div class="border p-4 rounded">
                            <?php if (isset($_SESSION['edit_error'])): ?>
                                <div class="alert alert-danger"><?= $_SESSION['edit_error']; unset($_SESSION['edit_error']); ?></div>
                            <?php endif; ?>
                            
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Full Name</label>
                                <div class="col-sm-9">
                                    <input type="text" name="name" class="form-control" 
                                           value="<?= htmlspecialchars($user['name']) ?>" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">User ID</label>
                                <div class="col-sm-9">
                                    <input type="text" name="userid" class="form-control" 
                                           value="<?= htmlspecialchars($user['userid']) ?>" readonly>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Mobile Number</label>
                                <div class="col-sm-9">
                                    <input type="text" name="mobile" class="form-control" 
                                           value="<?= htmlspecialchars($user['mobile']) ?>" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Password</label>
                                <div class="col-sm-9">
                                    <input type="password" name="password" class="form-control" 
                                           placeholder="Leave blank to keep current password">
                                    <small class="text-muted">Only enter if you want to change the password</small>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Role</label>
                                <div class="col-sm-9">
                                    <select name="role" class="form-select" required>
                                        <!-- <option value="admin" <?= $user['role'] == 'admin' ? 'selected' : '' ?>>Admin</option> -->
                                        <option value="user" <?= $user['role'] == 'user' ? 'selected' : '' ?>>User</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Department</label>
                                <div class="col-sm-9">
                                    <?php
                                    // Fetch all departments
                                    $dept_query = $link->query("SELECT * FROM departments ORDER BY name");
                                    $current_dept = $user['department_id'];
                                    ?>
                                    <select name="department_id" class="form-select">
                                        <option value="">No Department</option>
                                        <?php while ($dept = $dept_query->fetch_assoc()): ?>
                                            <option value="<?= $dept['id'] ?>" 
                                                <?= $current_dept == $dept['id'] ? 'selected' : '' ?>>
                                                <?= htmlspecialchars($dept['name']) ?>
                                            </option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-primary px-5">Update User</button>
                                    <a href="all_users.php" class="btn btn-secondary px-5">Cancel</a>
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