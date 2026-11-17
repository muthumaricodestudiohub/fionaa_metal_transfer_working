<?php
session_start();
include("include/connection.php");

// ✅ User validation
if (isset($_COOKIE['uuid'])) {
    $u_uname = mysqli_real_escape_string($link, $_COOKIE['uuid']);
} else {
    $_SESSION['error'] = "Session expired. Please log in again.";
    header("location:logout.php");
    exit;
}
$sql4 = "SELECT * FROM ods WHERE uuid='$u_uname' AND status='verified'";
$result4 = mysqli_query($link, $sql4);
if ($result4 && $result4->num_rows > 0) {
    $row4 = mysqli_fetch_assoc($result4);
    $user_id = mysqli_real_escape_string($link, $row4['user_id']);
} else {
    header("location:logout.php");
    exit;
}
$sql47 = "SELECT * FROM users WHERE userid='$user_id'";
$result47 = mysqli_query($link, $sql47);
$row47 = mysqli_fetch_assoc($result47);
$department_id = mysqli_real_escape_string($link, $row47['department_id']);

// ✅ Form processing
if (!empty($_POST['to_dept']) && !empty($_POST['ids'])) {
    $to_dept = mysqli_real_escape_string($link, $_POST['to_dept']);
    $notes = mysqli_real_escape_string($link, $_POST['notes']);
    $ids = $_POST['ids'];

    if ($department_id == $to_dept) {
        $_SESSION['error'] = "Cannot transfer to the same department!";
        header("Location: tranfer_metal.php");
        exit;
    }

    $inserted = 0;
    foreach ($ids as $id) {
        $id = intval($id);

        // ✅ Get weight & touch from existing record
        $get_sql = "SELECT weight, touch FROM metal_tracking 
                    WHERE id='$id' AND from_dept='$department_id'";
        $get_res = mysqli_query($link, $get_sql);
        if ($get_res && mysqli_num_rows($get_res) > 0) {
            $rec = mysqli_fetch_assoc($get_res);
            $weight = $rec['weight'];
            $touch = $rec['touch'];



            // ✅ Insert new transfer
            $sql = "INSERT INTO metal_tracking (to_dept, notes, from_dept, weight, touch,metal_tracking_id) 
                    VALUES ('$to_dept', '$notes', '$department_id', '$weight', '$touch','$id')";
            if (mysqli_query($link, $sql)) {
                $inserted++;
            }
        }
    }

    if ($inserted > 0) {
        $_SESSION['success'] = "Metal transferred successfully ($inserted record(s)).";
    } else {
        $_SESSION['error'] = "No valid records transferred.";
    }
} else {
    $_SESSION['error'] = "Please select department and records.";
}
header("Location: tranfer_metal.php");
exit;
?>
