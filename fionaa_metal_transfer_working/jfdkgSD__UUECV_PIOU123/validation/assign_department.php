<?php
session_start();
include("../include/connection.php");

$u_uname = '';
    if (isset($_COOKIE['auth_token'])) {
        $u_uname = $_COOKIE['auth_token'];
    } else {
        header("location:index.php");
    }


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = intval($_POST['user_id']);
    $department_id = intval($_POST['department_id']);
    
    $sql = "UPDATE users SET department_id = $department_id WHERE id = $user_id";
    
    if ($link->query($sql)) {
        $_SESSION['success'] = "Department assigned successfully!";
    } else {
        $_SESSION['error'] = "Error: " . $link->error;
    }
    
    header("location:../assign_role.php");
    exit();
}
?>