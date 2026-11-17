<?php
session_start();
include("include/connection.php");

// Authentication check
if (!isset($_COOKIE['auth_token'])) {
    header("location:index.php");
    exit();
}

$date = date("Y-m-d H:i:s");
$dep_id = $_GET['dep_id'];
$net_weight = $_GET['net_weight'];

//   $sql_to1 = "SELECT id,use_gold,loss FROM departments WHERE admin=0 AND id='$dep_id'";
//         $res_to1 = mysqli_query($link, $sql_to1);
//         if ($res_to1 && $res_to1->num_rows > 0) {
//               while ($dept1 = $res_to1->fetch_assoc()){
//                   $did=$dept1['id'];
                   $result = $link->query("SELECT COUNT(*) AS total FROM orders WHERE current_dept='$dep_id'");
                   $row = $result->fetch_assoc();
                   if($row['total']>0){
                       $_SESSION['error'] = "Selected department having orders first transfer it to return department before booking loss";
                       header("Location: lossreport.php");
                       exit;
                   }
                  
        //       }
        // }



        $sql_to = "SELECT id,use_gold,loss FROM departments WHERE  id='$dep_id'";
        $res_to = mysqli_query($link, $sql_to);
        if ($res_to && $res_to->num_rows > 0) {
              while ($dept = $res_to->fetch_assoc()){
                   $id = $dept['id'];
                   $use_gold = $dept['use_gold'];
                    $loss = $dept['loss'];
                    $new_use_gold = 0;
                    $new_loss = $loss + $use_gold;
                    if($new_loss!=0){
                        
                     $insert = "INSERT INTO `loss`( `from_department`, `to_department`,`weight` ,`date`, `net_weight`)
                  VALUES ('$id','0','$use_gold','$date','$net_weight')";
                  
               // $insert   = "UPDATE order_tracking SET from_dept='$to_dept' WHERE order_id='$oid'";
                    if (mysqli_query($link, $insert)) {
                        //  echo " UPDATE departments SET use_gold='0', loss='$new_loss' WHERE id='$id'";
                        //             exit;
                                mysqli_query($link, "UPDATE departments SET use_gold='0', loss='$new_loss' WHERE id='$id'");
                    }
        
                    }
              }
               $_SESSION['success'] = "Loss Booked successfully.";
               header("Location: lossreport.php");
                exit;
        }
            
            
            
            
         
   
        
   

?>