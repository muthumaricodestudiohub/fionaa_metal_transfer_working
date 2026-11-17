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

 if (!empty($_POST['order_ids']) && !empty($_POST['to_dept'])) {
    $order_ids = $_POST['order_ids']; // array
    $order_ids_str = implode(",", $order_ids); // comma-separated string
    $weight = $_POST['weight'];
     $gold_touch = $_POST['gold_touch'];
     $to_dept = mysqli_real_escape_string($link, $_POST['to_dept']);
    $notes = $_POST['notes']; 
     $Stone_weight = !empty($_POST['stone_weight']) ? $_POST['stone_weight'] : 0;
       $t_tag_weight = !empty($_POST['t_tag_weight']) ? $_POST['t_tag_weight'] : 0;
    
     if($weight > $t_tag_weight){
        if($department_id != '25'){
            $weight = $weight - $t_tag_weight;
        }    
     }else{
        $_SESSION['error'] = "Tag weight is grater than gold weight";
        header("Location: all_order.php");
        exit;
     }
    $success_count = 0;
 $date = date("Y-m-d H:i:s");
if($department_id == $to_dept){
    $_SESSION['error'] = "Cannot transfer to the same department!";
    header("Location: all_order.php");
exit;
}

  $res16 = mysqli_query($link, "SELECT * FROM alloy WHERE id='17'");
                    if ($res16 && mysqli_num_rows($res16) > 0) {
                        $row16 = mysqli_fetch_assoc($res16);
                        $alloy_id = $row16['id'];
                        $current_tw = floatval($row16['total_weight']);
                      if ($current_tw < $stone_weight) {
                            $_SESSION['error'] = "Does not have enough stone available, contact central department to add stones";
                            header("Location: all_order.php");
                            exit; // yaha stop hoga
                        }  
                    }

 

if($to_dept == '30'  ){
       $sql_from = "SELECT use_gold FROM departments WHERE id='$department_id'";
        $res_from = mysqli_query($link, $sql_from);
        if ($res_from && $res_from->num_rows > 0) {
            $row_from = $res_from->fetch_assoc();
            // $previous_gold = $row_from['use_gold'];
            
           
            
            
            // if($to_dept != '62'){
                
            if($row_from['use_gold'] >= $weight){
                $from_use_gold = $row_from['use_gold'] - $weight;
                $new_previous_gold = $row_from['previous_gold'] + $weight;
                mysqli_query($link, "UPDATE departments SET use_gold='$from_use_gold',previous_gold='$new_previous_gold' WHERE id='$department_id'");
            
                // --- To Department (plus use_gold) ---
                $sql_to = "SELECT use_gold FROM departments WHERE id='$to_dept'";
                $res_to = mysqli_query($link, $sql_to);
                if ($res_to && $res_to->num_rows > 0) {
                    $row_to = $res_to->fetch_assoc();
                    $to_use_gold = $row_to['use_gold'] + $weight;
                    mysqli_query($link, "UPDATE departments SET use_gold='$to_use_gold' WHERE id='$to_dept'");
                }
            
                $insert = "INSERT INTO order_tracking (order_id, to_dept, transferred_by, notes,from_dept,status,success_at,weight,date,gold_touch,t_stone_weight)
                  VALUES ('$order_ids_str', '$to_dept', '$department_id', '$notes','$department_id','1','$success_date','$weight','$date','$gold_touch','$Stone_weight')";
                if (mysqli_query($link, $insert)) {
                    foreach ($order_ids as $oid) {
                        mysqli_query($link, "UPDATE orders SET current_dept='$to_dept', status='success',previous_dept='$department_id' WHERE id='$oid'");
                        $success_count++;
                    }
                }else{
                    $_SESSION['error'] = "Query error";
                    header("Location: all_order.php");
                    exit;
                }
            
            
            }else{
                $_SESSION['error'] = "Entered weight is greater than total weight of selected department.";
                header("Location: all_order.php");
                exit;
            }
        }
}else{
    $sql_from = "SELECT use_gold FROM departments WHERE id='$department_id'";
        $res_from = mysqli_query($link, $sql_from);
        if ($res_from && $res_from->num_rows > 0) {
            $row_from = $res_from->fetch_assoc();
$sql_pending = "SELECT SUM(weight) AS pending_weight 
                FROM order_tracking 
                WHERE from_dept='$department_id' AND status='0'";
$res_pending = mysqli_query($link, $sql_pending);
$pending_weight = 0;
if ($res_pending && $res_pending->num_rows > 0) {
    $row_pending = mysqli_fetch_assoc($res_pending);
    $pending_weight = $row_pending['pending_weight'];
}
$available_use_gold = $row_from['use_gold'] - $pending_weight;
if($department_id != '26' && $department_id != '67' ){
    if($available_use_gold < $weight){
  $_SESSION['error'] = "Entered weight is greater than total weight of selected department.";
                header("Location: all_order.php");
                exit;  
}
}
}

// $sql478 = "SELECT * FROM order_tracking WHERE order_id='$order_ids' AND status='pending'";
// $result478 = mysqli_query($link, $sql478);
// if ($result478 && $result478->num_rows > 0) {
//      $row478 = $result478->fetch_assoc();
//         $_SESSION['error'] = "You already have a previous pending order. Please wait until it is processed.";
// } 

    // foreach ($order_ids as $oid) {
        $oid = mysqli_real_escape_string($link, $oid);

        // Insert into order_tracking
        $insert = "INSERT INTO order_tracking (order_id, to_dept, transferred_by, notes,from_dept,weight,gold_touch,t_stone_weight)
                  VALUES ('$order_ids_str', '$to_dept', '$user_id', '$notes','$department_id','$weight','$gold_touch','$Stone_weight')";
                   
               // $insert   = "UPDATE order_tracking SET from_dept='$to_dept' WHERE order_id='$oid'";
                   
        if (mysqli_query($link, $insert)) {
            // Update current_dept in orders table
            // mysqli_query($link, "UPDATE orders SET current_dept='$to_dept' WHERE id='$oid'");
            $success_count++;
        }
    // }
 }    
     if ($success_count > 0) {
        $_SESSION['success'] = "$success_count order(s) transferred successfully.";
    } else {
        $_SESSION['error'] = "No orders were transferred.";
    }
} else {
    $_SESSION['error'] = "Please select orders and a department.";
}
header("Location: all_order.php");
exit;
