<?php
session_start();
include("include/connection.php");
$id=$_POST['id'];
$amount=$_POST['amount'];
 $sql_from = "SELECT * FROM metal_tracking WHERE id='$id'";
        $res_from = mysqli_query($link, $sql_from);
        if ($res_from && $res_from->num_rows > 0) {
            $row_from = $res_from->fetch_assoc();
             $weight = $row_from['weight'];
             $to_dept = $row_from['to_dept'];
            $new_weight = $weight - $amount;
            mysqli_query($link, "UPDATE metal_tracking SET weight='$new_weight' WHERE id='$id'");
            
                $sql_to = "SELECT * FROM departments WHERE id='$to_dept'";
                $res_to = mysqli_query($link, $sql_to);
                if ($res_to && $res_to->num_rows > 0) {
                    $row_to = $res_to->fetch_assoc();
                    $to_use_gold = $row_to['use_gold'] - $amount;
                    mysqli_query($link, "UPDATE departments SET use_gold='$to_use_gold' WHERE id='$to_dept'");
                   
                }
                
            header("location:all_metal.php?success=4356");    
        }

?>