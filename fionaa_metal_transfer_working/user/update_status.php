<?php

session_start();
include("include/connection.php");

$dept_id = $_GET['dept_id'];
mysqli_query($link, "UPDATE message 
                     SET status=1 
                     WHERE receiver_type='department' 
                       AND receiver_id='$dept_id' 
                       AND status=0");

echo "done";
?>
