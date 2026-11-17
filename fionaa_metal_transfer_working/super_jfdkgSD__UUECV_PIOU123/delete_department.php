<?php
session_start();
include("include/connection.php");

// Authentication check
if (!isset($_COOKIE['auth_token'])) {
    header("location:index.php");
    exit();
}

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);
    $stmt = $link->prepare("DELETE FROM departments WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        $_SESSION['success'] = "Department deleted successfully.";
    } else {
        $_SESSION['error'] = "Failed to delete department.";
    }

    $stmt->close();
} else {
    $_SESSION['error'] = "Invalid department ID.";
}

// Change this to your desired redirect page
header("location:manage_departments.php");
exit();

?>
