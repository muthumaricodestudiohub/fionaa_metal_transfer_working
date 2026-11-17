<?php
session_start();
include("include/connection.php");
$current_time = date("M d, Y H:i:s");
if (isset($_COOKIE['uuid'])) {
    $u_uname = mysqli_real_escape_string($link, $_COOKIE['uuid']);
} else {
    $_SESSION['error'] = "Session expired. Please log in again.";
    header("location:logout.php");
    exit;
}
$sql4 = "SELECT * FROM ods WHERE uuid='$u_uname' AND status='verified'";
$result4 = mysqli_query($link, $sql4);
if ($result4 && $result4->num_rows > 0) {
    while ($row4 = $result4->fetch_assoc()) {
        $user_id = mysqli_real_escape_string($link, $row4['user_id']);
    }
} else {
    header("location:logout.php");
    exit;
}
include 'include/header.php';




?>

<?php


$sql45 = "SELECT * FROM users where userid='$user_id'";
$result45 = mysqli_query($link, $sql45);
if ($result45 && $result45->num_rows > 0) {
     $row45 = $result45->fetch_assoc();
        $department_id = mysqli_real_escape_string($link, $row45['department_id']);
}
 $sql48 = "SELECT * FROM departments WHERE id='$department_id'";
$result48 = mysqli_query($link, $sql48);
if ($result48 && $result48->num_rows > 0) {
     $row48 = $result48->fetch_assoc();
        $role = mysqli_real_escape_string($link, $row48['role']);
        $total_weight = mysqli_real_escape_string($link, $row48['use_gold']);
        $dept_name  = mysqli_real_escape_string($link, $row48['name']);
} 

$roles_array = explode(',', $role); // Convert string to array



$sql458 = "SELECT 
              SUM(gold_weight) AS total_gold_weight, 
              SUM(description) AS total_pieces,
              SUM(tag_weight) AS total_tag_weight,
               SUM(stone_weight) AS total_order_stone_weight,
              COUNT(*) AS total_orders
           FROM orders 
           WHERE current_dept='$department_id'";
$result458 = mysqli_query($link, $sql458);
$totals = mysqli_fetch_assoc($result458); 
$total_pieces = $totals['total_pieces'] ?? 0;
$total_orders = $totals['total_orders'] ?? 0;
$total_tag_weight= $totals['total_tag_weight'] ?? 0;
$total_order_stone_weight= $totals['total_order_stone_weight'] ?? 0;

// // --- When Status Update Happens ---
// if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ot_id'], $_POST['status'], $_POST['from_dept'], $_POST['order_id'], $_POST['weight'], $_POST['total_weight'])) {
    
//     $ot_id   = mysqli_real_escape_string($link, $_POST['ot_id']);
//     $status  = mysqli_real_escape_string($link, $_POST['status']);
//     $from_dept = mysqli_real_escape_string($link, $_POST['from_dept']);
//     $order_id_raw  = mysqli_real_escape_string($link, $_POST['order_id']);
//     $weight  = mysqli_real_escape_string($link, $_POST['weight']);
//     $total_weight  = mysqli_real_escape_string($link, $_POST['total_weight']);
//     $success_at = date("Y-m-d H:i:s");

//     // Split multiple order IDs
//     $order_ids = array_map('trim', explode(',', $order_id_raw));
    
    

//     // 1. Update order_tracking status
//     $update_sql = "UPDATE order_tracking 
//                       SET status='$status',
//                           success_at='$success_at' 
//                   WHERE id='$ot_id'";

//     if (mysqli_query($link, $update_sql)) {

//         // 2. Update each order current_dept
//         foreach ($order_ids as $oid) {
//             if (!is_numeric($oid)) continue;
//             mysqli_query($link, "UPDATE orders SET current_dept='$department_id', status='success' WHERE id='$oid'");
//         }

//         // 3. Handle use_gold transfer between departments
//         // --- From Department (minus use_gold) ---
//         $sql_from = "SELECT use_gold FROM departments WHERE id='$from_dept'";
//         $res_from = mysqli_query($link, $sql_from);
//         if ($res_from && $res_from->num_rows > 0) {
//             $row_from = $res_from->fetch_assoc();
//              $from_use_gold = $row_from['use_gold'];
//             if($from_use_gold > $weight){
//             $new_from_use_gold = $row_from['use_gold'] - $weight;
//             mysqli_query($link, "UPDATE departments SET use_gold='$new_from_use_gold' WHERE id='$from_dept'");
//             }else{
//                   $_SESSION['error'] = "error";
//             }

//             echo "<script>console.log('From Dept ($from_dept) Old use_gold: {$row_from['use_gold']}, Transferred: $weight, New use_gold: $from_use_gold');</script>";
//         }

//         // --- To Department (plus use_gold) ---
//         $sql_to = "SELECT use_gold FROM departments WHERE id='$department_id'";
//         $res_to = mysqli_query($link, $sql_to);
//         if ($res_to && $res_to->num_rows > 0) {
//             $row_to = $res_to->fetch_assoc();
//             $to_use_gold = $row_to['use_gold'] + $weight;
//             mysqli_query($link, "UPDATE departments SET use_gold='$to_use_gold' WHERE id='$department_id'");

//             echo "<script>console.log('To Dept ($department_id) Old use_gold: {$row_to['use_gold']}, Received: $weight, New use_gold: $to_use_gold');</script>";
//         }

//         $_SESSION['success'] = "Order status & gold transfer updated successfully.";
//     } else {
//         $_SESSION['error'] = "Failed to update status. Please try again.";
//     }
//     header("location:dashboard.php");
//     exit;
// }
 

$transfers = $link->query("
    SELECT 
        ot.id, 
        ot.order_id, 
        ot.notes, 
        ot.transferred_at,
        ot.status,
        ot.from_dept,
        ot.weight,
        ot.gold_touch,
         ot.t_stone_weight,
        d_to.name AS to_department_name,
        d_from.name AS from_department_name
    FROM order_tracking ot
    LEFT JOIN departments d_to ON ot.to_dept = d_to.id
    LEFT JOIN departments d_from ON ot.from_dept = d_from.id
    WHERE ot.status = '0' AND ot.to_dept='$department_id'
");



// $total_packing_weight = 0;
// $sql481 = "SELECT * FROM departments WHERE id='25'";
// $result481 = mysqli_query($link, $sql481);
// if ($result481 && $result481->num_rows > 0) {
//      $row481 = $result481->fetch_assoc();
//         $role = mysqli_real_escape_string($link, $row481['role']);
//         $rt = mysqli_real_escape_string($link, $row481['use_gold']);
//         $total_packing_weight = ($rt * 91.6) / 100;
// } 

// $tot_bal = $total_pure - $total_packing_weight;



$sql = "SELECT m.*, d.name AS receiver_name
        FROM message m
        LEFT JOIN departments d ON m.receiver_id = d.id
        WHERE m.receiver_type='department' 
          AND m.receiver_id='$department_id'
        ORDER BY m.created_at ASC";

$result = mysqli_query($link, $sql);


$goldBalances = [];
$totalToSum = 0;
$totalFromSum = 0;
$totalBalance = 0;
$qGold = "SELECT DISTINCT touch FROM metal_tracking";
$resGold = mysqli_query($link, $qGold);
if ($resGold && mysqli_num_rows($resGold) > 0) {
    while ($row = mysqli_fetch_assoc($resGold)) {
        $touchVal = $row['touch'];
        $toSum1 = 0;
        if($department_id==33){
             $toSum1 = mysqli_fetch_assoc(mysqli_query($link,
            "SELECT SUM(weight) as total FROM metal_tracking WHERE to_dept=$department_id AND from_dept=$department_id AND  touch='$touchVal' AND status='1'"
        ))['total'] ?? 0;
            
        }
        $stonetoSum =0;
         if($department_id==56){
         $stonetoSum = mysqli_fetch_assoc(mysqli_query($link,
            "SELECT SUM(stone_weight) as total FROM metal_tracking WHERE to_dept=$department_id AND touch='$touchVal' AND status='1'"
        ))['total'] ?? 0;
         }
        $toSum = mysqli_fetch_assoc(mysqli_query($link,
            "SELECT SUM(weight) as total FROM metal_tracking WHERE to_dept=$department_id AND touch='$touchVal' AND status='1'"
        ))['total'] ?? 0;
        
        
        
        
          $ordertoSum = mysqli_fetch_assoc(mysqli_query($link,
            "SELECT SUM(weight) as total FROM order_tracking WHERE to_dept=$department_id AND gold_touch='$touchVal' AND status='1'"
        ))['total'] ?? 0;
        $ostonefromSum =0;
         if($department_id==67){
         $ostonefromSum = mysqli_fetch_assoc(mysqli_query($link,
            "SELECT SUM(t_stone_weight) as total FROM order_tracking WHERE from_dept=$department_id AND gold_touch='$touchVal' AND status='1'"
        ))['total'] ?? 0;
         }
          
         $orderfromSum = mysqli_fetch_assoc(mysqli_query($link,
            "SELECT SUM(weight) as total FROM order_tracking WHERE from_dept=$department_id AND gold_touch='$touchVal' AND status='1'"
        ))['total'] ?? 0;
        
        $o_bal = ((($ordertoSum ?: 0) - ($orderfromSum ?: 0)) * $touchVal) / 100; 
        
        
        $fromSum = 0;
        if($department_id==37){
             $fromSum = mysqli_fetch_assoc(mysqli_query($link,
            "SELECT SUM(total_weight) as total FROM metal_entry WHERE from_dept=$department_id AND gold_touch='$touchVal' AND status='1'"
        ))['total'] ?? 0;
        }else{
             $fromSum = mysqli_fetch_assoc(mysqli_query($link,
            "SELECT SUM(weight) as total FROM metal_tracking WHERE from_dept=$department_id AND touch='$touchVal' AND status='1'"
        ))['total'] ?? 0;
        }
        $ostonefromSum = ($ostonefromSum * $touchVal) / 100;
       
        $new_toSum = $toSum + $toSum1 + $stonetoSum;
        $balance = ($new_toSum ?: 0) - ($fromSum ?: 0);
        // if($balance<0){
        //      $balance = -($balance);
        // }
        $new_balance = ($balance * $touchVal) / 100;
         
         // Add to totals
        $totalToSum += $new_toSum;
        $totalFromSum += $fromSum;
        $t = $new_balance + $o_bal + $ostonefromSum ;
        $totalBalance += $t;
        $goldBalances[] = [
            'touch' => $touchVal,
            'to_sum' => number_format($new_toSum, 2),
            'from_sum' => number_format($fromSum, 2),
            'balance' => $balance
        ];
    }
}

 //print_r($goldBalances);

// ✅ fetch alloy list from DB
$alloyList = [];
$resAlloy = mysqli_query($link, "SELECT * FROM alloy");
if ($resAlloy && mysqli_num_rows($resAlloy) > 0) {
    while ($row = mysqli_fetch_assoc($resAlloy)) {
        $alloyList[] = $row;
    }
}
?>



<style>
    .col{
        margin-bottom:1% !important;
    }

</style>



<div class="page-wrapper">
    <div class="page-content">








        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
              <?php
                    if(in_array(9,$roles_array)){
                ?>
           
                <!--<div class="col">-->
                <!--    <div class="card radius-10 bg-gradient-orange">-->
                <!--        <div class="card-body">-->
                <!--            <div class="d-flex align-items-center">-->
                <!--                <h5 class="mb-0 text-white"><?= number_format($total_packing_weight, 2) ?> g</h5>-->
                <!--                <div class="ms-auto">-->
                <!--                    <i class='bx bx-weight fs-3 text-white'></i>-->
                <!--                </div>-->
                <!--            </div>-->
                <!--            <div class="progress my-2 bg-white-transparent" style="height:3px;">-->
                <!--                <div class="progress-bar bg-white" role="progressbar" style="width: 100%"></div>-->
                <!--            </div>-->
                <!--            <div class="d-flex align-items-center text-white">-->
                <!--                <p>Total Metal Out (in 100%)</p>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->
                <!-- <div class="col">-->
                <!--    <div class="card radius-10 bg-gradient-orange">-->
                <!--        <div class="card-body">-->
                <!--            <div class="d-flex align-items-center">-->
                <!--                <h5 class="mb-0 text-white"><?= number_format($tot_bal, 2) ?> g</h5>-->
                <!--                <div class="ms-auto">-->
                <!--                    <i class='bx bx-weight fs-3 text-white'></i>-->
                <!--                </div>-->
                <!--            </div>-->
                <!--            <div class="progress my-2 bg-white-transparent" style="height:3px;">-->
                <!--                <div class="progress-bar bg-white" role="progressbar" style="width: 100%"></div>-->
                <!--            </div>-->
                <!--            <div class="d-flex align-items-center text-white">-->
                <!--                <p>Total Metal Balance (in 100%)</p>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->
                  <?php
                    }
                ?>
                <div class="col">
                    <div class="card radius-10 bg-gradient-orange">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <h5 class="mb-0 text-white"><?= number_format($total_weight, 2) ?> g</h5>
                                <div class="ms-auto">
                                    <i class='bx bx-weight fs-3 text-white'></i>
                                </div>
                            </div>
                            <div class="progress my-2 bg-white-transparent" style="height:3px;">
                                <div class="progress-bar bg-white" role="progressbar" style="width: 100%"></div>
                            </div>
                            <div class="d-flex align-items-center text-white">
                                <p>Total Gross Weight</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                 <?php
                if ($department_id != '69') { 
                
                ?>
                <div class="col">
                    <div class="card radius-10 bg-gradient-orange">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <h5 class="mb-0 text-white"><?php
                                
                                 $total_book_loss = mysqli_fetch_assoc(mysqli_query($link,
            "SELECT 
            SUM(weight) AS total_weight, 
            SUM(net_weight) AS total_net_weight 
        FROM loss 
        WHERE from_department='$department_id' 
          AND to_department='0'"));
          $total_net_weight = $total_book_loss['total_net_weight'] ?? 0;
           $fine= $totalBalance - $total_net_weight;
                               echo number_format($fine, 2);
                                
                                ?> g</h5>
                                <div class="ms-auto">
                                    <i class='bx bx-weight fs-3 text-white'></i>
                                </div>
                            </div>
                            <div class="progress my-2 bg-white-transparent" style="height:3px;">
                                <div class="progress-bar bg-white" role="progressbar" style="width: 100%"></div>
                            </div>
                            <div class="d-flex align-items-center text-white">
                                <p>Total Net Weight (fine)</p>
                            </div>
                        </div>
                    </div>
                </div>
            
   
                

<?php
}
?>
                
                
                
                <?php
                if ($department_id == '37') {  // central
  
?>

 
                <?php
}
else if($department_id == '33'){   //office
                    
                }else{
                    
                    $sql = "SELECT *FROM metal_tracking 
                            WHERE to_dept = '$department_id' AND status='1'";
                    $result = mysqli_query($link, $sql);
                    if ($result && mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $weight = (float)$row['weight'];
                            $touch = (float)$row['touch'];
                            $total_pure = ($weight * $touch) / 100;
                        }
                    }    
                }
                ?>
                
                
                
                
                 

                <?php
//                 $sql_stone = "SELECT SUM(stone_weight) AS total_stone 
//               FROM metal_tracking 
//               WHERE status = '1'";
// $res_stone = mysqli_query($link, $sql_stone);

// $total_stone = 0;
// if ($res_stone && $res_stone->num_rows > 0) {
//     $row_stone = mysqli_fetch_assoc($res_stone);
//     $total_stone = (float)$row_stone['total_stone'];
// }

$sql47 = "SELECT * FROM alloy WHERE id='17'";
$result47 = mysqli_query($link, $sql47);
if ($result47 && $result47->num_rows > 0) {
     $row47 = $result47->fetch_assoc();
        $total_stone = mysqli_real_escape_string($link, $row47['total_weight']);
} 

$sql478 = "SELECT SUM(pieces) AS total_pieces
           FROM metal_tracking mt
           WHERE from_dept != '$department_id' 
             AND to_dept = '$department_id' AND status=1";
             $result478 = $link->query($sql478);
$row478 = $result478->fetch_assoc();
$totalm_pieces = $row478['total_pieces'] ?? 0;

$sql4781 = "SELECT SUM(pieces) AS total_pieces
           FROM metal_tracking mt
           WHERE from_dept = '$department_id' 
             AND to_dept != '$department_id' AND status=1";
             $result4781 = $link->query($sql4781);
$row4781 = $result4781->fetch_assoc();
$totalm_pieces1 = $row4781['total_pieces'] ?? 0;
$new_totalm_pieces = $totalm_pieces - $totalm_pieces1;
                if($department_id == '67' || $department_id == '56'){ ?>
                <div class="col">
    <div class="card radius-10 bg-gradient-orange">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <h5 class="mb-0 text-white"><?= $new_totalm_pieces; ?></h5>
                                <div class="ms-auto">
                                    <i class='bx bx-weight fs-3 text-white'></i>
                                </div>
                            </div>
                            <div class="progress my-2 bg-white-transparent" style="height:3px;">
                                <div class="progress-bar bg-white" role="progressbar" style="width: 100%"></div>
                            </div>
                            <div class="d-flex align-items-center text-white">
                                <p>No. of metal pieces</p>
                            </div>
                        </div>
                    </div>
    
    
</div>

<?php  if( $department_id == '56'){ 
 $total_stone_receive = mysqli_fetch_assoc(mysqli_query($link,
            "SELECT SUM(stone_weight) as total FROM metal_tracking WHERE to_dept=$department_id  AND status='1'"
        ))['total'] ?? 0;
?>

<div class="col">
    <div class="card radius-10 bg-gradient-orange">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <h5 class="mb-0 text-white"><?= number_format($total_stone_receive, 2); ?></h5>
                                <div class="ms-auto">
                                    <i class='bx bx-weight fs-3 text-white'></i>
                                </div>
                            </div>
                            <div class="progress my-2 bg-white-transparent" style="height:3px;">
                                <div class="progress-bar bg-white" role="progressbar" style="width: 100%"></div>
                            </div>
                            <div class="d-flex align-items-center text-white">
                                <p>Total Stone Weight (components)</p>
                            </div>
                        </div>
                    </div>
    
    
</div>
<?php }else{ 

?>
<div class="col">
    <div class="card radius-10 bg-gradient-orange">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <h5 class="mb-0 text-white"><?= number_format($total_stone, 2); ?></h5>
                                <div class="ms-auto">
                                    <i class='bx bx-weight fs-3 text-white'></i>
                                </div>
                            </div>
                            <div class="progress my-2 bg-white-transparent" style="height:3px;">
                                <div class="progress-bar bg-white" role="progressbar" style="width: 100%"></div>
                            </div>
                            <div class="d-flex align-items-center text-white">
                                <p>Total Stone Weight (central)</p>
                            </div>
                        </div>
                    </div>
    
    
</div>
<?php } ?>

<?php } ?>

                
                
                <?php
                    if(in_array(5,$roles_array)){
                ?>
                 <div class="col">
                    <div class="card radius-10 bg-gradient-orange">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <h5 class="mb-0 text-white"><?=    number_format($total_pieces, 2);  
  ?> </h5>
                                <div class="ms-auto">
                                    <i class='bx bx-weight fs-3 text-white'></i>
                                </div>
                            </div>
                            <div class="progress my-2 bg-white-transparent" style="height:3px;">
                                <div class="progress-bar bg-white" role="progressbar" style="width: 100%"></div>
                            </div>
                            <div class="d-flex align-items-center text-white">
                                <p>Total Pieces</p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                    }
                    if(in_array(5,$roles_array)){
                ?>
                <div class="col">
                    <div class="card radius-10 bg-gradient-orange">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <h5 class="mb-0 text-white"><?= (int)$total_orders ?> </h5>
                                <div class="ms-auto">
                                    <i class='bx bx-weight fs-3 text-white'></i>
                                </div>
                            </div>
                            <div class="progress my-2 bg-white-transparent" style="height:3px;">
                                <div class="progress-bar bg-white" role="progressbar" style="width: 100%"></div>
                            </div>
                            <div class="d-flex align-items-center text-white">
                                <p>Total Orders</p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                    }
                ?>
                 <?php
                    if(in_array(1,$roles_array) || in_array(2,$roles_array)){
                ?>
                <div class="col">
                    <div class="card radius-10 bg-gradient-orange">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <h5 class="mb-0 text-white"><?= number_format($total_tag_weight,2) ?> </h5>
                                <div class="ms-auto">
                                    <i class='bx bx-weight fs-3 text-white'></i>
                                </div>
                            </div>
                            <div class="progress my-2 bg-white-transparent" style="height:3px;">
                                <div class="progress-bar bg-white" role="progressbar" style="width: 100%"></div>
                            </div>
                            <div class="d-flex align-items-center text-white">
                                <p>Total Tag Weight</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card radius-10 bg-gradient-orange">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <h5 class="mb-0 text-white"><?= number_format($total_order_stone_weight,2) ?> </h5>
                                <div class="ms-auto">
                                    <i class='bx bx-weight fs-3 text-white'></i>
                                </div>
                            </div>
                            <div class="progress my-2 bg-white-transparent" style="height:3px;">
                                <div class="progress-bar bg-white" role="progressbar" style="width: 100%"></div>
                            </div>
                            <div class="d-flex align-items-center text-white">
                                <p>Total Order Stone Weight</p>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                if(in_array(2,$roles_array)){
                ?>
                   <div class="col">
                    <div class="card radius-10 bg-gradient-orange">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <h5 class="mb-0 text-white"><?= number_format(($total_tag_weight + $total_weight + $total_order_stone_weight),2)   ?></h5>
                                <div class="ms-auto">
                                    <i class='bx bx-weight fs-3 text-white'></i>
                                </div>
                            </div>
                            <div class="progress my-2 bg-white-transparent" style="height:3px;">
                                <div class="progress-bar bg-white" role="progressbar" style="width: 100%"></div>
                            </div>
                            <div class="d-flex align-items-center text-white">
                                <p>Total Gold + Tag Weight + Stone weight</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                 <?php
}
                    }
                ?>

        </div>
        
           <?php
                if ($department_id == '37') {  // central
  
?>
  <div class="container mt-4">
  <div class="row">
    <!-- ✅ Gold Balance -->
    <div class="col-md-6">
      <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
          <h5 class="mb-0">Gold Balance</h5>
        </div>
        <div class="card-body">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Sr.no</th>
                <th>Gross Weight</th>
                <th>Touch</th>
                <th>Fine Weight</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                $totalGold = 0;
                $totalFine = 0;
                if(!empty($goldBalances)): 
                  $i=1; 
                  foreach($goldBalances as $g): 
                    $balance = (float)$g['balance'];
                    $touch   = (float)$g['touch'];
                    $fine    = $balance * $touch / 100;
                    $totalGold += $balance;
                    $totalFine += $fine;
              ?>
                <tr>
                  <td><?= $i++ ?></td>
                   <td><strong><?= number_format($balance, 2) ?></strong></td>
                  <td><?= htmlspecialchars($g['touch']) ?></td>
                  <td><strong><?= number_format($fine, 2) ?></strong></td>
                </tr>
              <?php endforeach; ?>
              <?php else: ?>
                <tr><td colspan="4" class="text-center">No data found</td></tr>
              <?php endif; ?>
            </tbody>
            <?php if(!empty($goldBalances)): ?>
              <tfoot>
                <tr class="table-secondary">
                  <th colspan="2" class="text-end">Total:</th>
                  <th><strong><?= number_format($totalGold, 2) ?></strong></th>
                  <th><strong><?= number_format($totalFine, 2) ?></strong></th>
                </tr>
              </tfoot>
            <?php endif; ?>
          </table>
        </div>
      </div>
    </div>

    <!-- ✅ Alloy Summary -->
    <div class="col-md-6">
      <div class="card shadow-sm">
        <div class="card-header bg-info text-white">
          <h5 class="mb-0">Alloy Summary</h5>
        </div>
        <div class="card-body">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Sr.no</th>
                <th>Alloy Name</th>
                <th>Total Weight</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                $totalAlloy = 0;
                if(!empty($alloyList)): 
                  $i=1; 
                  foreach($alloyList as $a): 
                    $weight = (float)$a['total_weight'];
                    $totalAlloy += $weight;
              ?>
                <tr>
                  <td><?= $i++ ?></td>
                  <td><?= htmlspecialchars($a['name']) ?></td>
                  <td><?= number_format($weight, 2) ?></td>
                </tr>
              <?php endforeach; ?>
              <?php else: ?>
                <tr><td colspan="3" class="text-center">No alloys found</td></tr>
              <?php endif; ?>
            </tbody>
            <?php if(!empty($alloyList)): ?>
              <tfoot>
                <tr class="table-secondary">
                  <th colspan="2" class="text-end">Total:</th>
                  <th><strong><?= number_format($totalAlloy, 2) ?></strong></th>
                </tr>
              </tfoot>
            <?php endif; ?>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>



   <?php
         }  // central
  
?>

        
                <div class="col-xl-12 mx-auto">
                    <hr><hr>
                    <?php
if (isset($_SESSION['success'])) {
    echo '<div class="alert alert-success">'.$_SESSION['success'].'</div>';
    unset($_SESSION['success']);
}
if (isset($_SESSION['error'])) {
    echo '<div class="alert alert-danger">'.$_SESSION['error'].'</div>';
    unset($_SESSION['error']);
}
?>


                                                <?php
                                                if(in_array(5,$roles_array)){
                                                    ?>
            <h6 class="mb-0 text-uppercase">Incoming Order Transfer History</h6>
            <hr/>
            <div class="card border-top border-0 border-4 border-primary">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example2" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Sr.no</th>
                                    <th>Order ID</th>
                                    <th>No. PCS</th>
                                    <th>Department From</th>
                                    <th>Department To</th>
                                    <th>Gold Weight</th>
                                     <th>Gold Touch</th>
                                    <th>Tag Weight</th>
                                     <!--<th>Stone Weight</th>-->
                                    <th>Total Weight</th>


                                    <th>Notes</th>
                                    <!-- <th>Order Details</th> -->
                                    <th>Transferred At</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                if ($transfers && $transfers->num_rows > 0) {
                                    $sr = 1;
                                    while ($row = $transfers->fetch_assoc()) { ?>
                                        <tr>
                                            <td><?php echo $sr; ?></td>
                                            <td>
    <?php  


    $order_ids = explode(',', $row['order_id']); // multiple IDs split
    $order_numbers = [];
$row_tag_weight = 0; // <-- reset for each transfer row
$pieces = 0; // <-- initialize sum
$row_stone_weight = 0;
    foreach ($order_ids as $oid) {
        $oid = trim($oid);
        if (!is_numeric($oid)) continue; // safety check

        $sql46 = "SELECT * FROM orders WHERE id='$oid'";
        $result46 = mysqli_query($link, $sql46);
        if ($result46 && $result46->num_rows > 0) {
            $row46 = $result46->fetch_assoc();
            $order_numbers[] = htmlspecialchars($row46['order_number']);
        $pieces += (int)$row46['description'];   // ✅ pieces sum
            $row_tag_weight += (float)$row46['tag_weight']; // tag weight sum
            $row_stone_weight += (float)$row46['stone_weight']; // tag weight sum

        }
    }

    if (!empty($order_numbers)) {
        echo implode(", ", $order_numbers);
    } else {
        echo "N/A";
    }
    ?>
</td>
  <td>
                                                <div> <?= $pieces ?></div>
                                            </td>

                                            <td><?php echo $row['from_department_name'] ? htmlspecialchars($row['from_department_name']) : 'Not assigned'; ?></td>
                                            <td><?php echo $row['to_department_name'] ? htmlspecialchars($row['to_department_name']) : 'Not assigned'; ?></td>
                                            <td><?php echo htmlspecialchars($row['weight']); ?></td>
  <td>
    <?php
    $gold_touch1 = $row['gold_touch'];
    $carat_name1 = "N/A";

    if (!empty($gold_touch1)) {
        $sqlCarat1 = "SELECT name FROM carat WHERE percentage = '".mysqli_real_escape_string($link, $gold_touch1)."' LIMIT 1";
        $resCarat1 = mysqli_query($link, $sqlCarat1);
        if ($resCarat1 && mysqli_num_rows($resCarat1) > 0) {
            $rowCarat1 = mysqli_fetch_assoc($resCarat1);
            $carat_name1 = $rowCarat1['name'];
        }
    }

    echo $carat_name1;
    ?>
</td>

                                               <td><?php echo number_format($row_tag_weight, 2); ?></td>
                                                 
<td>
    <?php
    $weight_tag = (float)$row['weight'] + $row_tag_weight ;
    echo number_format($weight_tag, 2);
    ?>
</td>
                               

                                            
                                            <td><?php echo htmlspecialchars($row['notes']); ?></td>
                                            
                                          
                                            <td><?php echo date('d M Y H:i', strtotime($row['transferred_at'])); ?></td>
                                            
                                            <td>

                                                <form method="post" action="incoming_transfers.php" onsubmit="disableSubmit(this)">
                                                     <input type="hidden" name="deptid" value="<?php echo $department_id; ?>">
                                                    <input type="hidden" name="ot_id" value="<?php echo $row['id']; ?>">
                                                    <input type="hidden" name="order_id" value="<?php echo $row['order_id']; ?>">
                                                    <input type="hidden" name="from_dept" value="<?php echo $row['from_dept']; ?>">
                                                    <input type="hidden" name="weight" value="<?php echo $row['weight']; ?>">
                                                     <input type="hidden" name="t_stone_weight" value="<?php echo $row_stone_weight; ?>">
                                                    <select name="status" class="form-select form-select-sm" onchange="this.form.submit()">
                                                        <option value="0" <?php if ($row['status'] == '0') echo 'selected'; ?>>Pending</option>
                                                        <option value="1" <?php if ($row['status'] == '1') echo 'selected disabled' ?>>Accept</option>
                                                        <option value="2" <?php if ($row['status'] == '2') echo 'selected disabled' ?>>Reject</option>
                                                    </select>
                                                </form>
                                                
                                            </td>
                                            
                                        </tr>
                                    <?php
                                    $sr++;
                                    }
                                }  ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <?php
            }?>
            
               <?php
                    if(in_array(11,$roles_array)){
             ?>
             
            <h6 class="mb-0 text-uppercase">Incoming Metal Transfer History <?php if($department_id=='37'){ ?>
                                 
                                         <?php } ?></h6>
            <hr/>
            <div class="card border-top border-0 border-4 border-primary">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Sr.no</th>
                                    <th>Transferred To (Department)</th>
                                    <th>Transferred From (Department)</th>
                                    <th>Touch</th>
                                    <th>Weight</th>
                                      <?php if($department_id=='56'){ ?>
                                     <th>Stone Weight</th>
                                      <?php } ?>
                                    <th>Pieces</th>
                                     <!--<th>Touch</th>-->
                                      <?php if($department_id=='37'){ ?>
                                         <!--<th>Fine</th>-->
                                         <?php } ?>
                                    <th>Notes</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $sr = 1;
                                $sql478 = "SELECT * FROM metal_tracking WHERE to_dept='$department_id' AND from_dept !='$department_id' AND status='0'";
                                    $result478 = mysqli_query($link, $sql478);
                                    if ($result478 && $result478->num_rows > 0) {
                                         while($row478 = $result478->fetch_assoc()){
                                             $to_dept= $row478['to_dept'];
                                             $from_dept =$row478['from_dept'];
                                              $weight = $row478['weight'];
                                             $stone_weight = $row478['stone_weight'];
                                            //  $new_weight = ($weight * $touch) / 100;
                                             ?>
                                        <tr>
                                            <td><?php echo $sr; ?></td>
                                           <?php
                                          $sql_from = "SELECT * FROM departments where id='$from_dept'";
                                            $res_from = mysqli_query($link, $sql_from);
                                            if ($res_from && $res_from->num_rows > 0) {
                                                $row_from = $res_from->fetch_assoc();
                                                 $from_use_gold = $row_from['name'];
                                            }
                                            
                                              $sql_to = "SELECT * FROM departments WHERE id='$to_dept'";
                                            $res_to = mysqli_query($link, $sql_to);
                                            if ($res_to && $res_to->num_rows > 0) {
                                                $row_to = $res_to->fetch_assoc();
                                                $use_gold = $row_to['name'] ;
                                            }
                                            
                                           ?>

                                            <td><?php echo $use_gold ? htmlspecialchars($use_gold) : 'Not assigned'; ?></td>
                                            <td><?php echo $from_use_gold ? htmlspecialchars($from_use_gold) : 'Not assigned'; ?></td>
                                            <td>
    <?php
    $gold_touch = $row478['touch'];
    $carat_name1 = "N/A";

    if (!empty($gold_touch)) {
       $gold_touch = mysqli_real_escape_string($link, $gold_touch);

$sqlCarat1 = "
SELECT name 
FROM carat 
WHERE CAST(percentage AS DECIMAL(10,2)) = CAST('$gold_touch' AS DECIMAL(10,2)) 
LIMIT 1
";
        $resCarat1 = mysqli_query($link, $sqlCarat1);
        if ($resCarat1 && mysqli_num_rows($resCarat1) > 0) {
            $rowCarat1 = mysqli_fetch_assoc($resCarat1);
            $carat_name1 = $rowCarat1['name'];
        }
    }

    echo $carat_name1;
    ?>
</td>
                                            
                                            
                                            <td><?php echo htmlspecialchars($row478['weight']); ?></td>
                                             <?php if($department_id=='56'){ ?>
                                              <td><?php echo htmlspecialchars($row478['stone_weight']); ?></td>
                                              <?php } ?>
                                         <td><?php echo htmlspecialchars($row478['pieces']); ?></td>


                                              <?php if($department_id=='37'){ ?>
                                                  <!--<td>-->
                                                      <?php 
                                                    //   echo $new_weight; 
                                                      ?>
                                                      <!--</td>-->
                                                   <?php } ?>
                                            <td><?php echo htmlspecialchars($row478['notes']); ?></td>
                                            
                                            
                                            <td>

                                               
                                                <form method="post" action="incoming_metal_transfers.php" onsubmit="disableSubmit(this)">
                                        <input type="hidden" name="deptid" value="<?php echo $department_id; ?>">
                                                    <input type="hidden" name="ot_id" value="<?php echo $row478['id']; ?>">
                                                    <input type="hidden" name="from_dept" value="<?php echo $row478['from_dept']; ?>">
                                                    <input type="hidden" name="to_dept" value="<?php echo $row478['to_dept']; ?>">
                                                    <input type="hidden" name="weight" value="<?php echo $row478['weight']; ?>">
                                                    <input type="hidden" name="touch" value="<?php echo $row478['touch']; ?>">
                                                    <input type="hidden" name="stone_weight" value="<?php echo $row478['stone_weight']; ?>">
                                                     
                                                    <select name="status" class="form-select form-select-sm" onchange="this.form.submit()">
                                                        <option value="0" <?php if ($row478['status'] == '0') echo 'selected'; ?>>Pending</option>
                                                        <option value="1" <?php if ($row478['status'] == '1') echo 'selected disabled'; ?>>Accept</option>
                                                        <option value="2" <?php if ($row478['status'] == '2') echo 'selected disabled'; ?>>Reject</option>

                                                    </select>
                                                </form>
                                                
                                            </td>
                                            
                                        </tr>
                                    <?php
                                    $sr++;
                                         }
                                    }
                                    ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
             <?php
                    }
             ?>
            
            
            
            
            
        </div>
    </div>
</div>
<?php include 'include/footer.php'; ?>
