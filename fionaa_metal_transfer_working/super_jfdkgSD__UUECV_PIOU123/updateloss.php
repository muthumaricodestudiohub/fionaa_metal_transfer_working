<?php
session_start();
include("include/connection.php");

// Authentication check
if (!isset($_COOKIE['auth_token'])) {
    header("location:index.php");
    exit();
}

if (!empty($_POST['dept_id']) && !empty($_POST['weight'])) {
 // $to_dept = mysqli_real_escape_string($link, $_POST['to_dept']);
    $weight = $_POST['weight'];
    $to_dept =$_POST['to_dept']; //loss department id
    $date = $_POST['loss_date'];
    $from_dept = $_POST['dept_id'];
       $gold_touch = $_POST['gold_touch'];
$weight= $weight * $gold_touch / 100;
    if($to_dept == $from_dept){
            $_SESSION['error'] = "From and to department are same";
        header("Location: lossreport.php");
exit;
    }
    
        $sql_from = "SELECT use_gold,loss FROM departments WHERE id='$from_dept'";
        $res_from = mysqli_query($link, $sql_from);
        if ($res_from && $res_from->num_rows > 0) {
            $row_from = $res_from->fetch_assoc();
              $from_use_gold = $row_from['loss'];
            
              if($from_dept == '26'){
                $new_from_use_gold = $from_use_gold - $weight;
                mysqli_query($link, "UPDATE departments SET loss='$new_from_use_gold' WHERE id='$from_dept'");
                // --- To Department (plus use_gold) ---
                $sql_to = "SELECT use_gold,loss FROM departments WHERE id='$to_dept'";
                $res_to = mysqli_query($link, $sql_to);
                if ($res_to && $res_to->num_rows > 0) {
                    $row_to = $res_to->fetch_assoc();
                    $loss = $row_to['use_gold'];
                    $newloss = $loss + $weight;
                    mysqli_query($link, "UPDATE departments SET use_gold='$newloss' WHERE id='$to_dept'");
                }
                if($to_dept == '32' || $to_dept == '70'){
                $insert = "INSERT INTO `loss`( `from_department`, `to_department`,`weight`, `note`,`date`)
                  VALUES ('$from_dept','$to_dept','$weight','Admin transfered from book loss','$date')";
                }else{
                $insert ="INSERT INTO `metal_tracking`(`weight`, `to_dept`, `notes`, `from_dept`, `status`,`touch`) VALUES ('$weight','$to_dept','Admin transfered metal from book loss','0','1','$gold_touch')";   
                }
                mysqli_query($link, $insert);
                $_SESSION['success'] = "Loss updated successfully";
                
              }else{
                if($from_use_gold >= $weight){
                $new_from_use_gold = $from_use_gold - $weight;
                mysqli_query($link, "UPDATE departments SET loss='$new_from_use_gold' WHERE id='$from_dept'");
                // --- To Department (plus use_gold) ---
                $sql_to = "SELECT use_gold,loss FROM departments WHERE id='$to_dept'";
                $res_to = mysqli_query($link, $sql_to);
                if ($res_to && $res_to->num_rows > 0) {
                    $row_to = $res_to->fetch_assoc();
                    $loss = $row_to['use_gold'];
                    $newloss = $loss + $weight;
                    mysqli_query($link, "UPDATE departments SET use_gold='$newloss' WHERE id='$to_dept'");
                }
                if($to_dept == '32' || $to_dept == '70'){
                $insert = "INSERT INTO `loss`( `from_department`, `to_department`,`weight`, `note`,`date`)
                  VALUES ('$from_dept','$to_dept','$weight','Admin transfered from book loss','$date')";
                }else{
                $insert ="INSERT INTO `metal_tracking`(`weight`, `to_dept`, `notes`, `from_dept`, `status`,`touch`) VALUES ('$weight','$to_dept','Admin transfered metal from book loss','0','1','$gold_touch')";   
                }
                mysqli_query($link, $insert);
                $_SESSION['success'] = "Loss updated successfully";
            }else{
                 $_SESSION['error'] = "Entered weight is greater than total loss of selected department";
            }
              }
            

        }

        
        
        // }else{
        //       $_SESSION['error'] = "Query error";
        // }
       
        
} else {
    $_SESSION['error'] = "Please select department";
}
header("Location: lossreport.php");
exit;
            
            
            
            
         
   
        
   

