<?php
include("include/connection.php");

if(isset($_POST['entry_id'])) {
    $entry_id = mysqli_real_escape_string($link, $_POST['entry_id']);

    $sql = "SELECT notes, gold_touch, total_weight, status, created_at FROM metal_entry WHERE entry_id='$entry_id'";
    $result = mysqli_query($link, $sql);

    $data = [];
    if($result && mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
    }

    echo json_encode($data);
}
?>
