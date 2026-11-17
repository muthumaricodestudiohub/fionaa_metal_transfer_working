<?php include 'include/connection.php'; 



$q = mysqli_query($link, "SELECT COUNT(*) AS total 
                          FROM message 
                          WHERE receiver_type='admin' 
                       
                          AND status=0");

$row = mysqli_fetch_assoc($q);
echo $row['total']; // सिर्फ number return होगा
?>
