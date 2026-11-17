<?php
include("include/connection.php");

$dept_id = $_GET['dept_id'] ?? 0;

$q = $link->query("SELECT m.*, d.name as dept_name 
                   FROM message m 
                   LEFT JOIN departments d ON m.receiver_id = d.id
                   WHERE m.receiver_id='$dept_id'
                   ORDER BY m.created_at ASC");

if ($q->num_rows > 0) {
    while ($row = $q->fetch_assoc()) {
        $isRead = ($row['status'] == 1) ? "✔ Read" : "• Unread";
$time = date("d M Y h:i A", strtotime($row['created_at'])) ;
        // sender_type check karke alignment set karo
        if ($row['sender_type'] === 'admin') {
            $class = "sent";   // right side
              echo "<div class='message $class'>"
                . htmlspecialchars($row['msg']) .
              
                "<div class='time'>$time</div>
                 <div class='read-status' >$isRead</div>
              </div>";
        } else {
            $class = "received"; // left side
              echo "<div class='message $class'>"
                . htmlspecialchars($row['msg']) .
              
                "<div class='time'>$time</div>
               
              </div>";
        }

      
    }
} else {
    echo "No messages found for this department.";
}
?>
