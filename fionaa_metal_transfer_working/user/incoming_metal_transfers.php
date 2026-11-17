<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
session_start();
include("include/connection.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $department_id  = mysqli_real_escape_string($link, $_POST['deptid']);
    $ot_id   = mysqli_real_escape_string($link, $_POST['ot_id']);
    $status  = mysqli_real_escape_string($link, $_POST['status']);
    $from_dept = mysqli_real_escape_string($link, $_POST['from_dept']);
    $to_dept = mysqli_real_escape_string($link, $_POST['to_dept']);
   $weight  = mysqli_real_escape_string($link, $_POST['weight']);
   $touch  = mysqli_real_escape_string($link, $_POST['touch']);
   $stone_weight = mysqli_real_escape_string($link, $_POST['stone_weight']);
    $success_at = date("Y-m-d H:i:s");
    
   
    
    
    
    // 1. Update order_tracking status
    if ($status == '2') {
        mysqli_query($link,"UPDATE metal_tracking 
                      SET status='$status'
                  WHERE id='$ot_id'");
        mysqli_query($link,"UPDATE alloy_history 
                      SET status='$status'
                  WHERE entry_id='$ot_id'");
        mysqli_query($link,"UPDATE metal_entry 
                      SET status='$status'
                  WHERE entry_id='$ot_id'");
        $_SESSION['success'] = "Metal Rejected successfully.";          
    }
    else {
        
        if($stone_weight != 'NULL' AND $status='1' AND $from_dept==67){  // if request comes from stone setting
            $sql_from = "SELECT use_gold FROM departments WHERE id='$from_dept'";
            $res_from = mysqli_query($link, $sql_from);
            if ($res_from && $res_from->num_rows > 0) {
                $row_from = $res_from->fetch_assoc();
               
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
                        
                         $new_from_use_gold = $row_from['use_gold'] - $weight ;
                          mysqli_query($link, "UPDATE departments SET use_gold='$new_from_use_gold' WHERE id='$from_dept'");
                        
                        $new_tw = $current_tw - $stone_weight;
                       mysqli_query($link, "UPDATE alloy SET total_weight='$new_tw' WHERE id='$alloy_id'");
                         mysqli_query($link,"INSERT INTO `alloy_history`( `dept_id`, `alloy_id`, `weight`, `status`, `accept_status`) VALUES ('$from_dept','$alloy_id','$stone_weight','1','1')");
                        
                        $sql_to = "SELECT use_gold FROM departments WHERE id='$to_dept'";
                        $res_to = mysqli_query($link, $sql_to);
                        if ($res_to && $res_to->num_rows > 0) {
                            $row_to =  $res_to ->fetch_assoc();
                        $new_to_use_gold = $row_to['use_gold'] + $weight + $stone_weight;
                           mysqli_query($link,"UPDATE metal_tracking 
                      SET status='$status',
                          success_at='$success_at' 
                  WHERE id='$ot_id'");
                        mysqli_query($link, "UPDATE departments SET use_gold='$new_to_use_gold' WHERE id='$to_dept'");
                        }
                    }
            }
       }else{
           $alloy_weight = 0;
        if ($department_id=='14' || $department_id=='41'){
             $res15 = mysqli_query($link, "SELECT * FROM alloy_history where entry_id='$ot_id'");
             
            if ($res15 && mysqli_num_rows($res15) > 0) {
                
                While($row15 = mysqli_fetch_assoc($res15)){
                    $id = $row15['alloy_id'];
                    $alloy_weight += $row15['weight'];
                     $aweight = $row15['weight'];
                    $res16 = mysqli_query($link, "SELECT * FROM alloy WHERE id='$id'");
                  
                    if ($res16 && mysqli_num_rows($res16) > 0) {
                        $row16 = mysqli_fetch_assoc($res16);
                        $alloy_id = $row16['id'];
                        $current_tw = floatval($row16['total_weight']);
                         $new_tw = $current_tw - $aweight;
                        mysqli_query($link, "UPDATE alloy SET total_weight='$new_tw' WHERE id='$alloy_id'");
                    }
           
                }
            }    
            
        
        }
        
        $weight = $weight - $alloy_weight;
        // echo $weight;
        // echo $alloy_weight;
        // exit;
        //else{
            $sql_from = "SELECT use_gold FROM departments WHERE id='$from_dept'";
            $res_from = mysqli_query($link, $sql_from);
            if ($res_from && $res_from->num_rows > 0) {
                $row_from = $res_from->fetch_assoc();
                $from_use_gold = $row_from['use_gold'];
             $from_use_gold = floatval(trim($from_use_gold));
$weight = floatval(trim($weight));
// var_dump($from_use_gold, $weight);

                if($from_use_gold >= $weight){
                    // echo "3445";
                    // exit;
                    mysqli_query($link,"UPDATE metal_tracking 
                      SET status='$status',
                          success_at='$success_at' 
                  WHERE id='$ot_id'");
                   mysqli_query($link,"UPDATE alloy_history 
                      SET accept_status='$status'
                  WHERE entry_id='$ot_id'");
        mysqli_query($link,"UPDATE metal_entry 
                      SET status='$status'
                  WHERE entry_id='$ot_id'");
       
                    $use_gold = $row_from['use_gold'] - $weight;    
                    $new_from_use_gold = $row_from['use_gold'] - $weight;
                    mysqli_query($link, "UPDATE departments SET use_gold='$new_from_use_gold' WHERE id='$from_dept'");
                }else{
                   // echo "34456";
                   //  exit;
                    $_SESSION['error'] = "Enter weight is greater than total gold weight of transfer department.";
                    header("Location: dashboard.php");
                    exit;
                }
            }
            
             $weight = $weight + $alloy_weight;

            $sql_to = "SELECT use_gold FROM departments WHERE id='$department_id'";
            $res_to = mysqli_query($link, $sql_to);
            if ($res_to && $res_to->num_rows > 0) {
                $row_to = $res_to->fetch_assoc();
                $use_gold = $row_to['use_gold'] ;
                $to_use_gold = $row_to['use_gold'] + $weight;
                mysqli_query($link, "UPDATE departments SET use_gold='$to_use_gold' WHERE id='$department_id'");
            }
           
       }
        
        
        
        
        
        
        
        
        
      
      
        

            $_SESSION['success'] = "Gold transfer updated successfully.";
            
        //}
        
   }
    header("Location: dashboard.php");
    exit;
}
?>
