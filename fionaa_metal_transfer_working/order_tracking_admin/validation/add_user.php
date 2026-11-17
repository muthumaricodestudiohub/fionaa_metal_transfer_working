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
    $name = $link->real_escape_string($_POST['name']);
    $userid = $link->real_escape_string($_POST['userid']);
    $mobile = $link->real_escape_string($_POST['mobile']);
    $password = $link->real_escape_string($_POST['password']);
    $department = $link->real_escape_string($_POST['department']);



    // Check if userid already exists
    $check = $link->query("SELECT id FROM users WHERE userid = '$userid'");
    if ($check->num_rows > 0) {
        $_SESSION['error'] = "User ID already exists!";
        header("location:../add_user.php");
        exit();
    }

    $sql = "INSERT INTO users (name, userid, mobile, password, department_id) 
            VALUES ('$name', '$userid', '$mobile', '$password', '$department')";

    if ($link->query($sql) === TRUE) {
        
        $_SESSION['success'] = "User added successfully!";
            header("location:../add_user.php");
    } else {
        $_SESSION['error'] = "Error: " . $link->error;
            header("location:../add_user.php");
    }
    
    header("location:../add_user.php");
    exit();
}
?>