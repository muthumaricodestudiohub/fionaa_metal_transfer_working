<?php
session_start();
include("include/connection.php");

if (isset($_COOKIE['uuid'])) {
    $u_uname = mysqli_real_escape_string($link, $_COOKIE['uuid']);
} else {
    $_SESSION['error'] = "Session expired. Please log in again.";
    header("location:logout.php");
    exit;
}

// Verify user
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
$sql47 = "SELECT * FROM users WHERE userid='$user_id'";
$result47 = mysqli_query($link, $sql47);
if ($result47 && $result47->num_rows > 0) {
     $row47 = $result47->fetch_assoc();
        $department_id = mysqli_real_escape_string($link, $row47['department_id']);
} 
 if (!empty($_POST['to_dept'])) {
  
    $weight = $_POST['weight'];
      $gold_touch = $_POST['gold_touch'];
     $to_dept = mysqli_real_escape_string($link, $_POST['to_dept']);
        $notes = $_POST['notes'];
        $date = date("Y-m-d H:i:s");
        if( $to_dept == '69'  ){
            
              $success_count = 0;
if($department_id == $to_dept){
    $_SESSION['error'] = "Cannot transfer to the same department!";
    header("Location: all_order.php");
exit;
}

 $sql_from = "SELECT use_gold FROM departments WHERE id='$department_id'";
            $res_from = mysqli_query($link, $sql_from);
            if ($res_from && $res_from->num_rows > 0) {
                $row_from = $res_from->fetch_assoc();
                $from_use_gold = $row_from['use_gold'];
                if($from_use_gold >= $weight){
                   
                    $use_gold = $row_from['use_gold'] - $weight;    
                    $new_from_use_gold = $row_from['use_gold'] - $weight;
                    mysqli_query($link, "UPDATE departments SET use_gold='$new_from_use_gold' WHERE id='$department_id'");
                }else{
                    $_SESSION['error'] = "Enter weight is greater than total gold weight of transfer department.";
                    header("Location: dashboard.php");
                    exit;
                }
            }
            
            // $weight = $weight + $alloy_weight;

            $sql_to = "SELECT use_gold FROM departments WHERE id='$to_dept'";
            $res_to = mysqli_query($link, $sql_to);
            if ($res_to && $res_to->num_rows > 0) {
                $row_to = $res_to->fetch_assoc();
                $use_gold = $row_to['use_gold'] ;
                $to_use_gold = $row_to['use_gold'] + $weight;
                mysqli_query($link, "UPDATE departments SET use_gold='$to_use_gold' WHERE id='$to_dept'");
            }
        mysqli_query($link,"INSERT INTO metal_tracking ( to_dept, notes,from_dept,status,success_at,weight,touch)
                  VALUES ('$to_dept', '$notes','$department_id',1,'$date','$weight','$gold_touch')");
        $_SESSION['success'] = "Metal transferred successfully.";
            
        }else{
               $sql_to = "SELECT use_gold FROM departments WHERE id='$department_id'";
                $res_to = mysqli_query($link, $sql_to);
                if ($res_to && $res_to->num_rows > 0) {
                    $row_to = $res_to->fetch_assoc();
                    $to_use_gold = $row_to['use_gold'] ;
                     $sql_pending = "SELECT SUM(weight) AS pending_weight 
                    FROM metal_tracking 
                    WHERE from_dept='$department_id' AND status='0'";
                    $res_pending = mysqli_query($link, $sql_pending);
                    $pending_weight = 0;
                    if ($res_pending && $res_pending->num_rows > 0) {
                        $row_pending = mysqli_fetch_assoc($res_pending);
                        $pending_weight = (float)$row_pending['pending_weight'];
                    
                    $available_gold = $to_use_gold - $pending_weight;
                    if($weight > $available_gold){
                        $_SESSION['error'] = "Entered weight is greater than total gold weight of your department, some metals are in pending list to accept by other department ";
                        header("location:tranfer_metal.php");
                        exit;
                    }
                    }
                }
        
    $success_count = 0;
if($department_id == $to_dept){
    $_SESSION['error'] = "Cannot transfer to the same department!";
    header("Location: all_order.php");
exit;
}
        mysqli_query($link,"INSERT INTO metal_tracking ( to_dept, notes,from_dept,weight,touch)
                  VALUES ('$to_dept', '$notes','$department_id','$weight','$gold_touch')");
        $_SESSION['success'] = "Metal transferred successfully.";
            
        }
       
                 
    
} else {
    $_SESSION['error'] = "Please select orders and a department.";
}
header("Location: tranfer_metal.php");
exit;