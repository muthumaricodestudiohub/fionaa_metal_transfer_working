<?php
session_start();
include("include/connection.php");

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "DELETE FROM alloy WHERE id=$id";
    if (mysqli_query($link, $sql)) {
        $_SESSION['success'] = "Alloy deleted successfully!";
    } else {
        $_SESSION['error'] = "Error deleting alloy: " . mysqli_error($link);
    }
}

header("Location: alloy_history.php");
exit;
