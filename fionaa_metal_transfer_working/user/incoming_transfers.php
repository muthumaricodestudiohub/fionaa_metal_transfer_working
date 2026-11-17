<?php
session_start();
include("include/connection.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ot_id'], $_POST['order_id'])) {
$department_id  = mysqli_real_escape_string($link, $_POST['deptid']);
        $ot_id   = mysqli_real_escape_string($link, $_POST['ot_id']);
    $status  = mysqli_real_escape_string($link, $_POST['status']);
    $from_dept = mysqli_real_escape_string($link, $_POST['from_dept']);
    $order_id_raw  = mysqli_real_escape_string($link, $_POST['order_id']);
    $weight  = mysqli_real_escape_string($link, $_POST['weight']);
    $total_weight  = mysqli_real_escape_string($link, $_POST['total_weight']);
     $t_stone_weight  = mysqli_real_escape_string($link, $_POST['t_stone_weight']);

    $success_at = date("Y-m-d H:i:s");
    $order_ids = array_map('trim', explode(',', $order_id_raw));
    
    
    
    // 1. Update order_tracking status
    if($status == '2' ){
        
        
        
        mysqli_query($link,"UPDATE order_tracking SET status='$status' WHERE id='$ot_id'");
        $_SESSION['success'] = "Order Rejected successfully.";          
    }else{
    
    // $update_sql = "UPDATE order_tracking 
    //                   SET status='$status',
    //                       success_at='$success_at' 
    //               WHERE id='$ot_id'";
                  
                  
    // if (mysqli_query($link, $update_sql)) {
        

        // 3. Handle use_gold transfer between departments
        // --- From Department (minus use_gold) ---
        $sql_from = "SELECT use_gold FROM departments WHERE id='$from_dept'";
        $res_from = mysqli_query($link, $sql_from);
        if ($res_from && $res_from->num_rows > 0) {
            $row_from = $res_from->fetch_assoc();
             $from_use_gold = $row_from['use_gold'];
              if($from_dept==67){
                  $res16 = mysqli_query($link, "SELECT * FROM alloy WHERE id='17'");
                    if ($res16 && mysqli_num_rows($res16) > 0) {
                        $row16 = mysqli_fetch_assoc($res16);
                        $alloy_id = $row16['id'];
                        $current_tw = floatval($row16['total_weight']);
                      if ($current_tw < $stone_weight) {
                            $_SESSION['error'] = "Alloy does not have enough stone available!";
                            header("Location: dashboard.php");
                            exit; // yaha stop hoga
                        }  
                        
                        
                        $new_tw = $current_tw - $t_stone_weight;
                       mysqli_query($link, "UPDATE alloy SET total_weight='$new_tw' WHERE id='$alloy_id'");
                         mysqli_query($link,"INSERT INTO `alloy_history`( `dept_id`, `alloy_id`, `weight`, `status`, `accept_status`) VALUES ('$from_dept','$alloy_id','$t_stone_weight','1','1')");
                        $t_gold = $weight - $t_stone_weight;    
                        $new_from_use_gold = $row_from['use_gold'] - $t_gold;
                        mysqli_query($link, "UPDATE departments SET use_gold='$new_from_use_gold' WHERE id='$from_dept'");
                        // 2. Update each order current_dept
                           $stone_weight =0;
                           foreach ($order_ids as $oid) {
                                if (!is_numeric($oid)) continue;
                                    mysqli_query($link, "UPDATE orders SET current_dept='$department_id', status='success' WHERE id='$oid'");
                               // }
                            }
                     mysqli_query($link,"UPDATE order_tracking 
                              SET status='$status',
                                  success_at='$success_at'
                          WHERE id='$ot_id'");
                    
                     // --- To Department (plus use_gold) ---
                    $sql_to = "SELECT use_gold FROM departments WHERE id='$department_id'";
                    $res_to = mysqli_query($link, $sql_to);
                    if ($res_to && $res_to->num_rows > 0) {
                        $row_to = $res_to->fetch_assoc();
                        $use_gold = $row_to['use_gold'];
                        $to_use_gold = $row_to['use_gold'] + $weight ;
                        mysqli_query($link, "UPDATE departments SET use_gold='$to_use_gold' WHERE id='$department_id'");
                    }
                       
                    }
                        
              }else if($from_dept==26){
                   $use_gold = $row_from['use_gold'] - $weight;    
                            $new_from_use_gold = $row_from['use_gold'] - $weight;
                            mysqli_query($link, "UPDATE departments SET use_gold='$new_from_use_gold' WHERE id='$from_dept'");
                            // 2. Update each order current_dept
                               $stone_weight =0;
                               foreach ($order_ids as $oid) {
                                    if (!is_numeric($oid)) continue;
                                        mysqli_query($link, "UPDATE orders SET current_dept='$department_id', status='success' WHERE id='$oid'");
                                   // }
                                }
                         mysqli_query($link,"UPDATE order_tracking 
                                  SET status='$status',
                                      success_at='$success_at'
                              WHERE id='$ot_id'");
                        
                         // --- To Department (plus use_gold) ---
                        $sql_to = "SELECT use_gold FROM departments WHERE id='$department_id'";
                        $res_to = mysqli_query($link, $sql_to);
                        if ($res_to && $res_to->num_rows > 0) {
                            $row_to = $res_to->fetch_assoc();
                            $use_gold = $row_to['use_gold'];
                            $to_use_gold = $row_to['use_gold'] + $weight;
                            mysqli_query($link, "UPDATE departments SET use_gold='$to_use_gold' WHERE id='$department_id'");
                        }
              
              
              }else{
                  
                    if($from_use_gold >= $weight){
                        mysqli_query($link,"UPDATE order_tracking 
                              SET status='$status',
                                  success_at='$success_at' 
                          WHERE id='$ot_id'");
                        $use_gold = $row_from['use_gold'] - $weight;    
                        $new_from_use_gold = $row_from['use_gold'] - $weight;
                        mysqli_query($link, "UPDATE departments SET use_gold='$new_from_use_gold' WHERE id='$from_dept'");
                        // 2. Update each order current_dept
                            foreach ($order_ids as $oid) {
                            if (!is_numeric($oid)) continue;
                                mysqli_query($link, "UPDATE orders SET current_dept='$department_id', status='success' WHERE id='$oid'");
                            }
                    }else{
                          $_SESSION['error'] = "Enter weight is greater than total gold weight of transfer department.";
                           header("Location: dashboard.php");
                         exit;
                          
                    }
                    
                                 // --- To Department (plus use_gold) ---
                    $sql_to = "SELECT use_gold FROM departments WHERE id='$department_id'";
                    $res_to = mysqli_query($link, $sql_to);
                    if ($res_to && $res_to->num_rows > 0) {
                        $row_to = $res_to->fetch_assoc();
                        $use_gold = $row_to['use_gold'] ;
                        $to_use_gold = $row_to['use_gold'] + $weight;
                        mysqli_query($link, "UPDATE departments SET use_gold='$to_use_gold' WHERE id='$department_id'");
                    }   
                  
              }
            
            
        }

       

        $_SESSION['success'] = "Order status & gold transfer updated successfully.";
    // } else {
    //     $_SESSION['error'] = "Failed to update status. Please try again.";
    // }
}

   // $_SESSION['success'] = "Status updated successfully.";

    // 🔴 Redirect to the same page (Post → Redirect → Get)
    header("Location: dashboard.php");
    exit;
}
?>
