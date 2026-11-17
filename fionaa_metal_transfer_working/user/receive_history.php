<?php
error_reporting(0);
ini_set('display_errors', 0);


session_start();
include("include/connection.php");

$current_time = date("M d, Y H:i:s");

// ✅ Validate UUID cookie
if (isset($_COOKIE['uuid'])) {
    $u_uname = mysqli_real_escape_string($link, $_COOKIE['uuid']);
} else {
    $_SESSION['error'] = "Session expired. Please log in again.";
    header("location:logout.php");
    exit;
}

// ✅ Verify user
$sql4 = "SELECT * FROM ods WHERE uuid='$u_uname' AND status='verified'";
$result4 = mysqli_query($link, $sql4);
if ($result4 && $result4->num_rows > 0) {
    $row4 = $result4->fetch_assoc();
    $user_id = mysqli_real_escape_string($link, $row4['user_id']);
} else {
    header("location:logout.php");
    exit;
}

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

// ✅ Fetch transfer history where to_dept = userDeptId
$transfers = $link->query("
    SELECT 
        ot.id, 
        ot.order_id, 
        ot.notes, 
        ot.transferred_at,
        ot.status,
        ot.weight,
        ot.gold_touch,
        ot.success_at,
        d_to.name   AS to_department_name,
        d_from.name AS from_department_name
    FROM order_tracking ot
    LEFT JOIN departments d_to   ON ot.to_dept = d_to.id
    LEFT JOIN departments d_from ON ot.from_dept = d_from.id
    WHERE ot.to_dept = '$userDeptId'
    ORDER BY ot.transferred_at DESC
");
?>

<div class="page-wrapper">
    <div class="page-content">
        <div class="col-xl-12 mx-auto">
            <h6 class="mb-0 text-uppercase">Received History</h6>
            <hr/>
            <div class="card border-top border-0 border-4 border-primary">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Order ID</th>

                                    <th>No. PCS</th>
                                    <th>Department From</th>
                                    <th>Department To</th>
                                    <th>Gold Weight</th>
                                     <th>Gold Touch</th>
                                    <th>Tag Weight</th>
                                   
                                    <th>Total Weight</th>
                                    <th>Notes</th>
                                    <th>Transferred At</th>
                                    <th>Received At</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
if ($transfers && $transfers->num_rows > 0) {
    $sr = 1;
    while ($row = $transfers->fetch_assoc()) { 
        $order_ids_str = $row['order_id'];
        $order_ids = array_filter(explode(',', $order_ids_str));

        $order_numbers = [];
        $total_pieces = 0;
        $total_weight = 0;
         $total_tag_weight = 0; // <-- yaha reset karo
           $total_stone_weight = 0; 

        $order_status = "unknown";
         $ordert_status =$row['status'];

        if (!empty($order_ids)) {
            $ids_in = implode("','", array_map('intval', $order_ids));
            $sql46 = "SELECT order_number, status, gold_weight, description ,tag_weight, stone_weight
                      FROM orders 
                      WHERE id IN ('$ids_in')";
            $result46 = mysqli_query($link, $sql46);

            if ($result46 && $result46->num_rows > 0) {
                while ($row46 = $result46->fetch_assoc()) {
                    $order_numbers[] = htmlspecialchars($row46['order_number']);
                    $total_pieces += (int)$row46['description'];
                    $total_weight += (float)$row46['gold_weight'];
                    $order_status = $row46['status']; 
                    $total_tag_weight += (float)$row46['tag_weight'];
                     $total_stone_weight += (float)$row46['stone_weight'];
                }
            }
        }
        ?>
        <tr>
            <td><?= $sr ?></td>
            <td><?= implode(", ", $order_numbers) ?></td>
              <td>
                <!--<div><b>Weight (g):</b> <?= number_format($total_weight, 2) ?></div>-->
                <div> <?= $total_pieces ?></div>
            </td>
          
            <td><?= $row['from_department_name'] ? htmlspecialchars($row['from_department_name']) : 'Not assigned' ?></td>
            <td><?= $row['to_department_name'] ? htmlspecialchars($row['to_department_name']) : 'Not assigned' ?></td>
            <td><?= htmlspecialchars($row['weight']) ?></td>
            <td>
    <?php
    $gold_touch = $row['gold_touch'];
    $carat_name = "N/A";

    if (!empty($gold_touch)) {
        $sqlCarat = "SELECT name FROM carat WHERE percentage = '".mysqli_real_escape_string($link, $gold_touch)."' LIMIT 1";
        $resCarat = mysqli_query($link, $sqlCarat);
        if ($resCarat && mysqli_num_rows($resCarat) > 0) {
            $rowCarat = mysqli_fetch_assoc($resCarat);
            $carat_name = $rowCarat['name'];
        }
    }

    echo $carat_name;
    ?>
</td>

            
            
            <td><?= number_format($total_tag_weight, 2) ?></td>
            
            <td>
    <?php
    $weight_tag = (float)$row['weight'] + $total_tag_weight  ;
    echo number_format($weight_tag, 2);
    ?>
</td>
            <td><?= htmlspecialchars($row['notes']) ?></td>
            <td><?= date('Y-m-d H:i:s', strtotime($row['transferred_at'])) ?></td>
            <td>
                <?php 
                if (!empty($row['success_at'])) {
                    echo date('Y-m-d H:i:s', strtotime($row['success_at']));
                } else {
                    echo "-";
                }
                ?>
            </td>
            <td>
                <?php 
                if ($ordert_status == '0') {
                    echo '<span class="badge bg-warning text-dark">Pending</span>';
                } elseif ($ordert_status == '1') {
                    echo '<span class="badge bg-success">Success</span>';
                } elseif ($ordert_status == '2') {
                    echo '<span class="badge bg-danger">Failed</span>';
                } else {
                    echo '<span class="badge bg-secondary">Unknown</span>';
                }
                ?>
            </td>
        </tr>
    <?php
    $sr++;
    }
} else { ?>
    <tr>
        <td colspan="9" class="text-center">No transfer history found.</td>
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
