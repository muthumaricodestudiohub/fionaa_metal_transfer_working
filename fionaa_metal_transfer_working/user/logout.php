<?php
session_start();
session_destroy();
setcookie("uuid", "", time() + (1), "/"); // 86400 = 1 day
header("Location:login.php");
exit;
?>