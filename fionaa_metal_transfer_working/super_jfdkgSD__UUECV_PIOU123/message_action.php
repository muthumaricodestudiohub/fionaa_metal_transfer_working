<?php
session_start();
include("include/connection.php");

if (!isset($_COOKIE['auth_token'])) {
    header("location:index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $receiver_dept_id = intval($_POST['receiver_dept_id']);
    $msg              = trim($_POST['note']);

    if ($receiver_dept_id && !empty($msg)) {
        try {
            // Receiver ka naam fetch
            $stmtDept = $link->prepare("SELECT name FROM departments WHERE id = ?");
            $stmtDept->bind_param("i", $receiver_dept_id);
            $stmtDept->execute();
            $receiver_name = $stmtDept->get_result()->fetch_assoc()['name'] ?? 'Unknown';

            // Insert query (sender fix 'department', receiver department)
            $stmt = $link->prepare("INSERT INTO message 
                (sender_type, receiver_type, receiver_id, msg) 
                VALUES ('Admin', 'department', ?, ?)");
            $stmt->bind_param("is", $receiver_dept_id, $msg);

            if ($stmt->execute()) {
                $_SESSION['success'] = "✅ Message sent successfully to 
                    <strong style='color:#198754'>" . htmlspecialchars($receiver_name) . "</strong>.";
            } else {
                $_SESSION['error'] = "❌ Failed to send message.";
            }
        } catch (Exception $e) {
            $_SESSION['error'] = "⚠️ Error: " . $e->getMessage();
        }
    } else {
        $_SESSION['error'] = "⚠️ Please select receiver and enter a message.";
    }

    header("Location: message.php?id=" . $receiver_dept_id);
    exit();
}
?>
