<?php
session_start();
include("include/connection.php");


$u_uname = '';
    if (isset($_COOKIE['auth_token'])) {
        $u_uname = $_COOKIE['auth_token'];
    } else {
        header("location:index.php");
    }

if (!isset($_GET['id'])) {
    header("location:all_users.php");
    exit();
}

$id = intval($_GET['id']);
$user = $link->query("SELECT * FROM users WHERE id = $id")->fetch_assoc();

if (!$user) {
    $_SESSION['error'] = "User not found!";
    header("location:all_users.php");
    exit();
}

include 'include/header.php';
?>

<div class="page-wrapper">
    <div class="page-content">
        <form action="validation/update_user.php" method="POST">
            <input type="hidden" name="id" value="<?= $user['id'] ?>">
            <div class="col-xl-6 mx-auto">
                <h6 class="mb-0 text-uppercase">Edit User</h6>
                <hr/>
                <div class="card border-top border-0 border-4 border-primary">
                    <div class="card-body">
                        <div class="border p-4 rounded">
                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Full Name</label>
                                <div class="col-sm-9">
                                    <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($user['name']) ?>" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">User ID</label>
                                <div class="col-sm-9">
                                    <input type="text" name="userid" class="form-control" value="<?= htmlspecialchars($user['userid']) ?>" readonly required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Mobile Number</label>
                                <div class="col-sm-9">
                                    <input type="text" name="mobile" class="form-control" value="<?= htmlspecialchars($user['mobile']) ?>" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Password</label>
                                <div class="col-sm-9">
                                    <input type="password" name="password" class="form-control" placeholder="Leave blank to keep current">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-3 col-form-label">Role</label>
                                <div class="col-sm-9">
                                    <select name="role" class="form-select" required>
                                        <option value="admin" <?= $user['role'] == 'admin' ? 'selected' : '' ?>>Admin</option>
                                        <option value="user" <?= $user['role'] == 'user' ? 'selected' : '' ?>>User</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-primary px-5">Update User</button>
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