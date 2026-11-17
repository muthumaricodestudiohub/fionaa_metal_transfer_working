<?php
session_start();
include("../include/connection.php");

$u_uname = '';
    if (isset($_COOKIE['auth_token'])) {
        $u_uname = $_COOKIE['auth_token'];
    } else {
        header("location:index.php");
    }


if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    
    // First check if any users are assigned to this department
    $check = $link->query("SELECT id FROM users WHERE department_id = $id");
    if ($check->num_rows > 0) {
        $_SESSION['error'] = "Cannot delete department - users are still assigned to it!";
        header("location:../assign_role.php");
        exit();
    }
    
    $sql = "DELETE FROM departments WHERE id = $id";
    
    if ($link->query($sql)) {
        $_SESSION['success'] = "Department deleted successfully!";
    } else {
        $_SESSION['error'] = "Error: " . $link->error;
    }
}

header("location:../assign_role.php");
exit();
?>