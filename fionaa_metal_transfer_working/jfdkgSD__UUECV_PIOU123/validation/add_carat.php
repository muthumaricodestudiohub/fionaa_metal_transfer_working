<?php
session_start();
include("../include/connection.php");

$u_uname = '';
if (isset($_COOKIE['auth_token'])) {
    $u_uname = $_COOKIE['auth_token'];
} else {
    header("location:index.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $link->real_escape_string($_POST['name']);
    $percentage = $link->real_escape_string($_POST['percentage']);

    // Check if carat name already exists
    $check = $link->query("SELECT id FROM carat WHERE name = '$name'");
    if ($check && $check->num_rows > 0) {
        $_SESSION['error'] = "Carat name already exists!";
        header("location:../add_carat.php");
        exit();
    }

    $sql = "INSERT INTO carat (name, percentage) 
            VALUES ('$name', '$percentage')";

    if ($link->query($sql) === TRUE) {
        $_SESSION['success'] = "Carat added successfully!";
        header("location:../add_carat.php");
        exit();
    } else {
        $_SESSION['error'] = "Error: " . $link->error;
        header("location:../add_carat.php");
        exit();
    }
}
?>
