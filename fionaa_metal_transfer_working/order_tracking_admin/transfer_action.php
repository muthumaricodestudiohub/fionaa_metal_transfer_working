<?php
session_start();
include("include/connection.php");

// Authentication check
if (!isset($_COOKIE['auth_token'])) {
    header("location:index.php");
    exit();
}



$sql47 = "SELECT * FROM departments WHERE admin='0'";
$result47 = mysqli_query($link, $sql47);
if ($result47 && $result47->num_rows > 0) {
     $row47 = $result47->fetch_assoc();
     $department_id = mysqli_real_escape_string($link, $row47['id']);
} 
// Validate POST data
if (!empty($_POST['order_ids']) && !empty($_POST['to_dept'])) {
    $order_ids = $_POST['order_ids']; // array
    $order_ids_str = implode(",", $order_ids); // comma-separated string
    $to_dept = mysqli_real_escape_string($link, $_POST['to_dept']);
    $notes = isset($_POST['notes']) ? mysqli_real_escape_string($link, $_POST['notes']) : '';
    $weight = $_POST['weight'];
    // $to_dept = $_POST['to_dept'];
    $date = $_POST['date'];
    $from_dept = $_POST['from_dept'];

$success_date = date("Y-m-d H:i:s"); 
$success_count = 0;
if($department_id == $to_dept){
    $_SESSION['error'] = "Cannot transfer to the same department!";
    exit;
}

              $sql_from = "SELECT use_gold FROM departments WHERE id='$from_dept'";
        $res_from = mysqli_query($link, $sql_from);
        if ($res_from && $res_from->num_rows > 0) {
            $row_from = $res_from->fetch_assoc();
            // $previous_gold = $row_from['use_gold'];
            if($row_from['use_gold'] >= $weight){
                $from_use_gold = $row_from['use_gold'] - $weight;
                mysqli_query($link, "UPDATE departments SET use_gold='$from_use_gold',previous_gold='$weight' WHERE id='$from_dept'");
            
                // --- To Department (plus use_gold) ---
                $sql_to = "SELECT use_gold FROM departments WHERE id='$to_dept'";
                $res_to = mysqli_query($link, $sql_to);
                if ($res_to && $res_to->num_rows > 0) {
                    $row_to = $res_to->fetch_assoc();
                    $to_use_gold = $row_to['use_gold'] + $weight;
                    mysqli_query($link, "UPDATE departments SET use_gold='$to_use_gold' WHERE id='$to_dept'");
                }
            
                $insert = "INSERT INTO order_tracking (order_id, to_dept, transferred_by, notes,from_dept,status,success_at,weight,date)
                  VALUES ('$order_ids_str', '$to_dept', '$department_id', '$notes','$from_dept','1','$success_date','$weight','$date')";
                if (mysqli_query($link, $insert)) {
                    foreach ($order_ids as $oid) {
                        mysqli_query($link, "UPDATE orders SET current_dept='$to_dept', status='success',previous_dept='$from_dept' WHERE id='$oid'");
                        $success_count++;
                    }
                }else{
                    $_SESSION['error'] = "Query error";
                    header("Location: transfer_departments.php");
                    exit;
                }
            
            
            }else{
                $_SESSION['error'] = "Entered weight is greater than total weight of selected department.";
                header("Location: transfer_departments.php");
                exit;
            }

        }

 
    if ($success_count > 0) {
        $_SESSION['success'] = "$success_count order(s) transferred successfully.";
    } else {
        $_SESSION['error'] = "No orders were transferred.";
    }
} else {
    $_SESSION['error'] = "Please select orders and a department.";
}
header("Location: transfer_departments.php");
exit;
