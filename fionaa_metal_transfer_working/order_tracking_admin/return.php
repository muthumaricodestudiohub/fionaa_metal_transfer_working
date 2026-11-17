<?php
session_start();
include("include/connection.php");

if (!isset($_COOKIE['auth_token'])) {
    header("location:index.php");
    exit();
}

$dep_id = $_GET['dep_id'];

// Fetch all orders to be returned from current_dept = 30 to the selected previous_dept
$sql = "SELECT * FROM orders WHERE current_dept = '30' AND previous_dept = '$dep_id'";
$result = mysqli_query($link, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $orders_by_touch = [];

    // --- Group orders by gold_touch ---
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        $gold_touch = $row['gold_touch'];
        $previous_dept = $row['previous_dept'];

        // Move order back to previous dept
        mysqli_query($link, "UPDATE orders SET current_dept='$previous_dept', previous_dept='0' WHERE id='$id'");

        // Group orders by gold touch
        $orders_by_touch[$gold_touch][] = $id;
    }

    // --- Adjust gold balances ---
    $sql_from = "SELECT * FROM departments WHERE id='$previous_dept'";
    $res_from = mysqli_query($link, $sql_from);

    if ($res_from && mysqli_num_rows($res_from) > 0) {
        $row_from = mysqli_fetch_assoc($res_from);
        $previous_gold = $row_from['previous_gold'];

        // Add previous_gold to use_gold of from_dept
        $from_use_gold = $row_from['use_gold'] + $previous_gold;
        mysqli_query($link, "UPDATE departments SET use_gold='$from_use_gold', previous_gold='0' WHERE id='$previous_dept'");

        // Subtract previous_gold from department 30 (return dept)
        $sql_to = "SELECT * FROM departments WHERE id='30'";
        $res_to = mysqli_query($link, $sql_to);

        if ($res_to && mysqli_num_rows($res_to) > 0) {
            $row_to = mysqli_fetch_assoc($res_to);
            if ($row_to['use_gold'] >= $previous_gold) {
                $to_use_gold = $row_to['use_gold'] - $previous_gold;
                mysqli_query($link, "UPDATE departments SET use_gold='$to_use_gold' WHERE id='30'");
            }
        }
    }

    // --- Insert tracking per gold_touch group ---
    $date = date("Y-m-d H:i:s");
    foreach ($orders_by_touch as $touch => $ids) {
        $order_ids = implode(",", $ids);

        mysqli_query($link, "INSERT INTO order_tracking 
            (order_id, to_dept, transferred_by, notes, from_dept, status, success_at, weight, date, gold_touch)
            VALUES ('$order_ids', '$previous_dept', 'Admin', 'Return', '30', '1', '$date', '$previous_gold', '$date', '$touch')");
    }

    $_SESSION['success'] = "Orders returned successfully (grouped by gold touch).";
    header("Location: lossreport.php");
    exit;
} else {
    $_SESSION['error'] = "No orders in return department for selected department.";
    header("Location: lossreport.php");
    exit;
}
?>
