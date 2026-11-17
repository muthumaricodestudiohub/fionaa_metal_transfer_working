<?php
 include 'include/connection.php'; 

$result = mysqli_query($link, "SELECT receiver_id, COUNT(*) as total 
                               FROM message 
                               WHERE receiver_type='admin' AND status=0 
                               GROUP BY receiver_id");

$counts = [];
while ($row = mysqli_fetch_assoc($result)) {
    $counts[$row['receiver_id']] = (int)$row['total'];
}

echo json_encode($counts);
?>