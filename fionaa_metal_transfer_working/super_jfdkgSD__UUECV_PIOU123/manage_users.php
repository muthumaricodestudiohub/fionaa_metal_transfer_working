<?php
session_start();
include("include/connection.php");

// Authentication check
if (!isset($_COOKIE['auth_token'])) {
    header("location:index.php");
    exit();
}

// Sorting logic
$sort = isset($_GET['sort']) ? $_GET['sort'] : 'name';
$order = isset($_GET['order']) ? $_GET['order'] : 'asc';

// Validate sort column
$valid_columns = ['id', 'name', 'email', 'created_at'];
if (!in_array($sort, $valid_columns)) {
    $sort = 'name';
}

// Validate order
$order = strtolower($order) === 'desc' ? 'DESC' : 'ASC';

// Fetch all users with sorting
$users = $link->query("SELECT * FROM users ORDER BY $sort $order");

include 'include/header.php';
?>

<div class="page-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h6 class="mb-0 text-uppercase">All Users</h6>
                            <div>
                                <a href="assign_department.php" class="btn btn-success">Assign Departments</a>
                            </div>
                        </div>
                        <hr/>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered" id="usersTable">
                                <thead>
                                    <tr>
                                        <th><a href="?sort=id&order=<?= $sort == 'id' && $order == 'ASC' ? 'desc' : 'asc' ?>">ID</a></th>
                                        <th><a href="?sort=name&order=<?= $sort == 'name' && $order == 'ASC' ? 'desc' : 'asc' ?>">Name</a></th>
                                        <th><a href="?sort=email&order=<?= $sort == 'email' && $order == 'ASC' ? 'desc' : 'asc' ?>">Email</a></th>
                                        <th><a href="?sort=created_at&order=<?= $sort == 'created_at' && $order == 'ASC' ? 'desc' : 'asc' ?>">Created At</a></th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while ($user = $users->fetch_assoc()): ?>
                                    <tr>
                                        <td><?= $user['id'] ?></td>
                                        <td><?= htmlspecialchars($user['name']) ?></td>
                                        <td><?= htmlspecialchars($user['email']) ?></td>
                                        <td><?= date('d M Y H:i', strtotime($user['created_at'])) ?></td>
                                        <td>
                                            <a href="edit_user.php?id=<?= $user['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                                            <a href="javascript:void(0)" onclick="confirmDelete(<?= $user['id'] ?>)" class="btn btn-sm btn-danger">Delete</a>
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
</div>

<script>
function confirmDelete(userId) {
    if (confirm("Are you sure you want to delete this user?")) {
        window.location.href = "validation/delete_user.php?id=" + userId;
    }
}

// Initialize DataTable for exporting
$(document).ready(function() {
    $('#usersTable').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        // Disable DataTable sorting since we're using server-side sorting
        ordering: false
    });
});
</script>

<?php include 'include/footer.php'; ?>