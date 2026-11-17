<?php include 'include/connection.php'; 

$dept_id = $_GET['dept_id'];

$q = mysqli_query($link, "SELECT COUNT(*) AS total 
                          FROM message 
                          WHERE receiver_type='department' 
                          AND receiver_id='$dept_id' 
                          AND status=0");

$row = mysqli_fetch_assoc($q);
echo $row['total']; // सिर्फ number return होगा
?>
