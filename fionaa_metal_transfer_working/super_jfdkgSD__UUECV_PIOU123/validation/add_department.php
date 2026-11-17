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
    $permissions = $link->real_escape_string($_POST['permissions']);
    $admin_permissions = $link->real_escape_string($_POST['admin_permissions']);
   
    // Check if department already exists
    $check = $link->query("SELECT id FROM departments WHERE name = '$name'");
    if ($check->num_rows > 0) {
        $_SESSION['error'] = "Department already exists!";
        header("location:../assign_role.php");
        exit();
    }
    
    $sql = "INSERT INTO departments (name,role,admin) VALUES ('$name','$permissions','$admin_permissions')";
    
    if ($link->query($sql)) {
        $_SESSION['success'] = "Department added successfully!";
    } else {
        $_SESSION['error'] = "Error: " . $link->error;
    }
    
    header("location:../manage_departments.php");
    exit();
}
?>