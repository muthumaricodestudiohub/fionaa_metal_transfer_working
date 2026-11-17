<?php
include("../include/connection.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = mysqli_real_escape_string($link, $_POST['name']);
    $percentage = mysqli_real_escape_string($link, $_POST['percentage']);

    $sql = "INSERT INTO alloy (`name`, `percentage`) VALUES ('$name', '$percentage')";
    if (mysqli_query($link, $sql)) {
        header("Location: ../add_alloy.php?success=134");
    } else {
        echo "Error: " . mysqli_error($link);
    }
}
?>
