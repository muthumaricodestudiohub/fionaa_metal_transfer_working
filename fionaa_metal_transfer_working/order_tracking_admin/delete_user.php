<?php
session_start();
include("./include/connection.php");

$u_uname = '';
    if (isset($_COOKIE['auth_token'])) {
        $u_uname = $_COOKIE['auth_token'];
    } else {
        header("location:index.php");
    }

// if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = $_GET['id'];
    // $name = $link->real_escape_string($_POST['name']);
    // // $userid = $link->real_escape_string($_POST['userid']);
    // $mobile = $link->real_escape_string($_POST['mobile']);
    // $role = $link->real_escape_string($_POST['role']);
    //  $department_id = $link->real_escape_string($_POST['department_id']);
    
    // Check if user exists
    $check = $link->query("SELECT * FROM users WHERE id = $id");
    if ($check->num_rows == 0) {
        $_SESSION['error'] = "User not found!";
        header("location:../all_users.php");
        exit();
    }
    
    // // Check if userid is being changed to one that already exists
    // $check = $link->query("SELECT id FROM users WHERE userid = '$userid' AND id != $id");
    // if ($check->num_rows > 0) {
    //     $_SESSION['error'] = "User ID already exists!";
    //     header("location:../edit_user.php?id=$id");
    //     exit();
    // }
    
    // Build update query
    $sql = "DELETE FROM users WHERE id = $id";
    
    // // Update password if provided
    // if (!empty($_POST['password'])) {
    //     $password = $link->real_escape_string($_POST['password']);
    //     $sql .= ", password = '$password'";
    // }
    
    // $sql .= " WHERE id = $id";
    
    if ($link->query($sql) === TRUE) {
        $_SESSION['success'] = "User Deleted successfully!";
    } else {
        $_SESSION['error'] = "Error: " . $link->error;
    }
    
    header("location:./all_users.php");
    exit();
//}
?>