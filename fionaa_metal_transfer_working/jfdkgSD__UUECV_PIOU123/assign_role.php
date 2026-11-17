<?php
session_start();
include("include/connection.php");

$u_uname = '';
    if (isset($_COOKIE['auth_token'])) {
        $u_uname = $_COOKIE['auth_token'];
    } else {
        header("location:index.php");
    }
// Check if user_id is passed in URL
$user_id = isset($_GET['user_id']) ? intval($_GET['user_id']) : 0;

// Fetch all departments
$departments = $link->query("SELECT * FROM departments ORDER BY name");

// Fetch all users for dropdown
$users = $link->query("SELECT id, name FROM users ORDER BY name");

include 'include/header.php';
?>

<div class="page-wrapper">
    <div class="page-content">
        <div class="row">
            <!-- Add Department Form -->
            <div class="col-xl-6">
                <form action="validation/add_department.php" method="POST">
                    <div class="card border-top border-0 border-4 border-warning">
                        <div class="card-body">
                            <h6 class="mb-0 text-uppercase">Add New Department</h6>
                            <hr/>
                            <div class="border p-4 rounded">
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">Department Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="name" class="form-control" placeholder="Enter department name" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-3 col-form-label"></label>
                                    <div class="col-sm-9">
                                        <button type="submit" class="btn btn-warning px-5">Add Department</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            
            <!-- Assign Department Form -->
            <div class="col-xl-6">
                <form action="validation/assign_department.php" method="POST">
                    <div class="card border-top border-0 border-4 border-success">
                        <div class="card-body">
                            <h6 class="mb-0 text-uppercase">Assign Department to User</h6>
                            <hr/>
                            <div class="border p-4 rounded">
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">Select User</label>
                                    <div class="col-sm-9">
                                        <select name="user_id" class="form-select" required>
                                            <option value="">Select User</option>
                                            <?php while ($user = $users->fetch_assoc()): ?>
                                                <option value="<?= $user['id'] ?>" <?= $user_id == $user['id'] ? 'selected' : '' ?>>
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
                                            <?php while ($dept = $departments->fetch_assoc()): ?>
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
                        </div>
                    </div>
                </form>
            </div>
        </div>
        
        <!-- List of Departments -->
        <div class="col-xl-12 mx-auto mt-4">
            <h6 class="mb-0 text-uppercase">All Departments</h6>
            <hr/>
            <div class="card border-top border-0 border-4 border-info">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $departments = $link->query("SELECT * FROM departments ORDER BY name");
                                while ($dept = $departments->fetch_assoc()): ?>
                                <tr>
                                    <td><?= $dept['id'] ?></td>
                                    <td><?= htmlspecialchars($dept['name']) ?></td>
                                    <td><?= date('d M Y H:i', strtotime($dept['created_at'])) ?></td>
                                    <td>
                                        <a href="javascript:void(0)" onclick="confirmDelete(<?= $dept['id'] ?>)" class="btn btn-sm btn-danger">Delete</a>
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

<script>
function confirmDelete(deptId) {
    if (confirm("Are you sure you want to delete this department?")) {
        window.location.href = "validation/delete_department.php?id=" + deptId;
    }
}
</script>

<?php include 'include/footer.php'; ?>