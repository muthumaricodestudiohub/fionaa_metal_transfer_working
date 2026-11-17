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
$sql = "
    SELECT u.*, d.name as department_name 
    FROM users u 
    LEFT JOIN departments d ON u.department_id = d.id 
    WHERE 1
";

// Apply date filter if submitted
$from_date = $to_date = "";
if (isset($_POST['filter'])) {
    if (!empty($_POST['from_date']) && !empty($_POST['to_date'])) {
        $from_date = $_POST['from_date'];
        $to_date = $_POST['to_date'];
        $sql .= " AND DATE(u.created_at) BETWEEN '$from_date' AND '$to_date'";
    }
}

$sql .= " ORDER BY u.created_at DESC";
$users = $link->query($sql);
?>

<div class="page-wrapper">
    <div class="page-content">
        <div class="col-xl-12 mx-auto">
            <h6 class="mb-0 text-uppercase">All Users</h6>
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
                            <a href="" class="btn btn-secondary ms-2">Reset</a>
                        </div>
                    </form>

                    <!-- Users Table -->
                    <div class="table-responsive">
                        <table id="example2" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>User ID</th>
                                    <th>Password</th>
                                    <th>Mobile</th>
                                    <th>Department</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                    <th>Login</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $sr = 1; 
                                while ($user = $users->fetch_assoc()): ?>
                                <tr>
                                    <td><?= $sr++ ?></td>
                                    <td><?= htmlspecialchars($user['name']) ?></td>
                                    <td><?= htmlspecialchars($user['userid']) ?></td>
                                    <td><?= htmlspecialchars($user['password']) ?></td>
                                    <td><?= htmlspecialchars($user['mobile']) ?></td>
                                    <td><?= htmlspecialchars($user['department_name']) ?></td>
                                    <td><?= date('d M Y H:i', strtotime($user['created_at'])) ?></td>
                                    <td>
                                        <a href="edit_user.php?id=<?= $user['id'] ?>" class="btn btn-sm btn-primary">Edit</a>
                                         <a href="delete_user.php?id=<?= $user['id'] ?>" class="btn btn-sm btn-danger">Delete</a>
                                    </td>
                                    <td>
                                         <a target="_blank" href="http://192.168.1.251/fionaa_working/user/login.php?uname=<?php echo $user['userid'];?>&password=<?php echo $user['password']; ?>&sec=<?php echo $u_uname; ?>" class="btn btn-success">Login</a>
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
			var table = $('#example2').DataTable( {
				lengthChange: false,
				buttons: [ 'copy', 'excel', 'pdf', 'print']
			} );
		 
			table.buttons().container()
				.appendTo( '#example2_wrapper .col-md-6:eq(0)' );
		} );
</script>