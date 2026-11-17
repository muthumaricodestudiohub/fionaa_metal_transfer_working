<?php
session_start();
include("../include/connection.php");

// Check authentication
if (!isset($_COOKIE['auth_token'])) {
    header("location:../index.php");
    exit();
}

// Validate input
if ($_SERVER['REQUEST_METHOD'] !== 'POST' || 
    !isset($_POST['id'], $_POST['name'], $_POST['admin_permissions'], $_POST['permissions']) || 
    !is_numeric($_POST['id']) || 
    empty(trim($_POST['name']))) {

    $_SESSION['error'] = "Invalid request!";
    header("location:../manage_departments.php");
    exit();
}

$id   = intval($_POST['id']);
$name = trim($_POST['name']);

// Admin permission (if checkbox checked → 1 else 0)
$admin_permissions = ($_POST['admin_permissions'] === '1') ? 1 : 0;
//  $melting_value = $_POST['melting_value'];
// Clean and format permissions
$permissions = trim($_POST['permissions']);
$permissionsArr = array_filter(array_map('trim', explode(',', $permissions)), 'strlen');
$permissionsClean = implode(',', $permissionsArr);

// ✅ Update query


// echo $dfg="UPDATE departments SET name ='$name', role = '$permissionsClean', admin = '$admin_permissions', melting_value = '$melting_value' WHERE id = '$id'";
// exit;

// $stmt = $link->prepare("UPDATE departments SET name = ?, role = ?, admin = ?, melting_value = ? WHERE id = ?");
// $stmt->bind_param("ssiii", $name, $permissionsClean, $admin_permissions, $melting_value, $id);


// $stmt = $link->prepare("UPDATE departments SET name = ?, role = ?, admin = ?,melting_value = ? WHERE id = ?");
// $stmt->bind_param("ssii", $name, $permissionsClean, $admin_permissions, $melting_value ,$id);

$sql = "UPDATE departments 
        SET 
            name = '$name', 
            role = '$permissionsClean', 
            admin = '$admin_permissions'
        WHERE id = '$id'";

if (mysqli_query($link, $sql)) {
    $_SESSION['success'] = "Department updated successfully.";
} else {
    $_SESSION['error'] = "Failed to update department.";
}


// Redirect back
header("location:../manage_departments.php");
exit();
