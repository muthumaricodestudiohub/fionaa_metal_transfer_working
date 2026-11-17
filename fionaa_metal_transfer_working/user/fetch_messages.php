<?php
include("include/connection.php");
$dept_id = intval($_GET['dept_id']);

$sql = "SELECT * FROM message WHERE  receiver_id='$dept_id' ORDER BY created_at ASC";
$result = mysqli_query($link, $sql);

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Time format
        $time = date("d-m-Y h:i A", strtotime($row['created_at']));
$isRead = ($row['status'] == 1) ? "✔ Read" : "• Unread";
        // Message alignment
        if ($row['sender_type'] === 'department') {
            $align_class = "sent";   // right side
              echo "<div class='message $align_class'>"
                . htmlspecialchars($row['msg']) .
              
                "<div class='time'>$time</div>
                 <div class='read-status' style='color:#fff !important;'>$isRead</div>
              </div>";
        } else {
            $align_class = "received"; // left side
              echo "<div class='message $align_class'>"
                . htmlspecialchars($row['msg']) .
               
                "<div class='time'>$time</div>
                
              </div>";
        }

      

      
    }
} else {
    echo "<p class='text-center text-muted'>No messages yet</p>";
}
?>
