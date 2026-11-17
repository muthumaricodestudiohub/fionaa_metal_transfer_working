<?php
// error_reporting(E_ALL);
// ini_set('display_errors', '1');
session_start();
include("include/connection.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $department_id  = mysqli_real_escape_string($link, $_POST['deptid']);
    $ot_id   = mysqli_real_escape_string($link, $_POST['ot_id']);
    $status  = mysqli_real_escape_string($link, $_POST['status']);
    $from_dept = mysqli_real_escape_string($link, $_POST['from_dept']);
     $weight  = mysqli_real_escape_string($link, $_POST['weight']);
     $touch  = mysqli_real_escape_string($link, $_POST['touch']);
   
    $success_at = date("Y-m-d H:i:s");
     
        $res1 = mysqli_query($link, "SELECT * FROM alloy_history where entity_id='$ot_id'");
        if ($res1 && mysqli_num_rows($res1) > 0) {
            $row1 = mysqli_fetch_assoc($res1);
            $alloy_weight = $row['weight'];
        }    
     
        $res = mysqli_query($link, "SELECT * FROM alloy");
        if ($res && mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_assoc($res);
            $alloy_id = $row['id'];
            $current_tw = floatval($row['total_weight']);
        }
            $new_tw = $current_tw - $alloy_weight;
            mysqli_query($link, "UPDATE alloy SET total_weight='$new_tw' WHERE id='$alloy_id'");
    
    
}
?>
    