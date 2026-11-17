<?php
session_start();
include("include/connection.php");

// Authentication check
if (!isset($_COOKIE['auth_token'])) {
    header("location:index.php");
    exit();
}
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
mysqli_query($link,"DELETE FROM `orders` WHERE id='$id'");
header("location:all_order.php?success=34342");
exit;
?>