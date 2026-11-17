<?php
  ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
session_start();
include("include/connection.php");
$current_time = date("M d, Y H:i:s");
if (isset($_COOKIE['uuid'])) {
    $uuid_cookie = mysqli_real_escape_string($link, $_COOKIE['uuid']);
} else {
    $uuid_cookie = '';
}
$sql4 = "SELECT * FROM ods WHERE uuid='$uuid_cookie' AND status='verified'";
$result4 = mysqli_query($link, $sql4);
if ($result4 && mysqli_num_rows($result4) > 0) {
    $row4 = mysqli_fetch_assoc($result4);
    $user_id = mysqli_real_escape_string($link, $row4['user_id']);
} else {
    header("location:logout.php");
    exit;
}
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
mysqli_query($link,"DELETE FROM `orders` WHERE id='$id'");
header("location:all_order.php?success=34342");
exit;
?>