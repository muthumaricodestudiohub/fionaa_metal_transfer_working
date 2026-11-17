<?php
session_start();
include("include/connection.php");

// ✅ Validate UUID cookie
if (!isset($_COOKIE['uuid'])) {
    header("location:logout.php");
    exit;
}
$uuid_cookie = mysqli_real_escape_string($link, $_COOKIE['uuid']);
$sql4 = "SELECT * FROM ods WHERE uuid='$uuid_cookie' AND status='verified'";
$result4 = mysqli_query($link, $sql4);
if (!$result4 || mysqli_num_rows($result4) == 0) {
    header("location:logout.php");
    exit;
}
$row4 = mysqli_fetch_assoc($result4);
$user_id = mysqli_real_escape_string($link, $row4['user_id']);

// ✅ Get user department id
$sqlUser = "SELECT department_id FROM users WHERE userid='$user_id' LIMIT 1";
$resUser = mysqli_query($link, $sqlUser);
if (!$resUser || $resUser->num_rows == 0) {
    $_SESSION['error'] = "User department not found.";
    header("location:logout.php");
    exit;
}
$rowUser = $resUser->fetch_assoc();
$userDeptId = (int)$rowUser['department_id'];

include("include/header.php");

// ✅ Fetch alloy history
echo $sql = "SELECT ah.*, a.name AS name, d.name AS dept_name
        FROM alloy_history ah
        LEFT JOIN alloy a ON ah.alloy_id = a.id
        LEFT JOIN departments d ON ah.dept_id = d.id
      
        ORDER BY ah.date DESC";
$history = mysqli_query($link, $sql);
?>

<div class="page-wrapper">
    <div class="page-content">
        <div class="col-xl-12 mx-auto">
            <h6 class="mb-0 text-uppercase">Alloy History</h6>
            <hr/>
            <div class="card border-top border-0 border-4 border-primary">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Department</th>
                                    <th>Alloy Name</th>
                                    <th>Weight (g)</th>
                                    <th>Date</th>
                                     <th>Type</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                if ($history && $history->num_rows > 0) {
                                    $sr = 1;
                                    while ($row = $history->fetch_assoc()) { ?>
                                        <tr>
                                            <td><?= $sr ?></td>
                                            <td><?= htmlspecialchars($row['dept_name']) ?></td>
                                            <td><?= htmlspecialchars($row['name']) ?></td>
                                            <td><?= number_format($row['weight'], 2) ?></td>
                                            <td><?= date("Y-m-d H:i:s", strtotime($row['date'])) ?></td>
                                                                                        <td>
<?php
switch ($row['status']) {
    case '0':
        echo '<span class="badge bg-success">Credit</span>';
        break;
    case '1':
        echo '<span class="badge bg-danger">Debit</span>';
        break;
   
    default:
        echo '<span class="badge bg-secondary">Unknown</span>';
        break;
}
?>
</td>
                                            <td>
<?php
switch ($row['accept_status']) {
    case '0':
        echo '<span class="badge bg-warning">Pending</span>';
        break;
    case '1':
        echo '<span class="badge bg-success">Success</span>';
        break;
    case '2':
        echo '<span class="badge bg-danger">Failed</span>';
        break;
    default:
        echo '<span class="badge bg-secondary">Unknown</span>';
        break;
}
?>
</td>

                                        </tr>
                                    <?php 
                                    $sr++;
                                    }
                                } else { ?>
                                    <tr>
                                        <td colspan="6" class="text-center">No alloy history found.</td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'include/footer.php'; ?>
