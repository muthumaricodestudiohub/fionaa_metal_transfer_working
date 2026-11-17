<?php
session_start();
include("include/connection.php");

if (isset($_COOKIE['uuid'])) {
    $u_uname = mysqli_real_escape_string($link, $_COOKIE['uuid']);
} else {
    $_SESSION['error'] = "Session expired. Please log in again.";
    header("location:logout.php");
    exit;
}

// Verify user
$sql4 = "SELECT * FROM ods WHERE uuid='$u_uname' AND status='verified'";
$result4 = mysqli_query($link, $sql4);
if ($result4 && $result4->num_rows > 0) {
    while ($row4 = $result4->fetch_assoc()) {
        $user_id = mysqli_real_escape_string($link, $row4['user_id']);
    }
} else {
    header("location:logout.php");
    exit;
}
$sql47 = "SELECT * FROM users WHERE userid='$user_id'";
$result47 = mysqli_query($link, $sql47);
if ($result47 && $result47->num_rows > 0) {
     $row47 = $result47->fetch_assoc();
        $department_id = mysqli_real_escape_string($link, $row47['department_id']);
} 
if (!empty($_POST['to_dept'])) {
  
    $weight       = (float)$_POST['weight'];       // total weight
    $gold_touch   = (float)$_POST['gold_touch'];   // touch %
    $to_dept      = mysqli_real_escape_string($link, $_POST['to_dept']);
    $notes        = mysqli_real_escape_string($link, $_POST['notes']);
    $pieces       = (int)$_POST['pieces'];
    $stone_weight = (float)$_POST['stone_weight'];


    // $net_weight = $weight + $stone_weight;

    // if ($net_weight <= 0) {
    //     $_SESSION['error'] = "Net gold weight must be greater than 0.";
    //     header("location:st_tranfer_metal.php");
    //     exit;
    // }
    
    




    $sql_to = "SELECT use_gold FROM departments WHERE id='$department_id'";
    $res_to = mysqli_query($link, $sql_to);
    if ($res_to && $res_to->num_rows > 0) {
        $row_to = $res_to->fetch_assoc();
        $to_use_gold = (float)$row_to['use_gold'];
        // $available_gold = $to_use_gold - $weight;

        if ($available_gold > $weight) {
            $_SESSION['error'] = "Entered weight is greater than total gold weight of your department";
            header("location:st_tranfer_metal.php");
            exit;
        }
        
        

        $sql_pending = "SELECT SUM(weight) AS pending_weight 
                        FROM metal_tracking 
                        WHERE from_dept='$department_id' AND status='0'";
        $res_pending = mysqli_query($link, $sql_pending);

         if ($res_pending && $res_pending->num_rows > 0) {
                        $row_pending = mysqli_fetch_assoc($res_pending);
                        $pending_weight = (float)$row_pending['pending_weight'];
                    
                    $available_gold = $to_use_gold - $pending_weight;
                    if($weight > $available_gold){
                        $_SESSION['error'] = "Entered weight is greater than total gold weight of your department, some metals are in pending list to accept by other department ";
                        header("location:st_tranfer_metal.php");
                        exit;
                    }
                    }


    }
    
     $res16 = mysqli_query($link, "SELECT * FROM alloy WHERE id='17'");
                    if ($res16 && mysqli_num_rows($res16) > 0) {
                        $row16 = mysqli_fetch_assoc($res16);
                        $alloy_id = $row16['id'];
                        $current_tw = floatval($row16['total_weight']);
                      if ($current_tw < $stone_weight) {
                            $_SESSION['error'] = "Does not have enough stone available, contact central department to add stones";
                            header("Location: st_tranfer_metal.php");
                            exit; // yaha stop hoga
                        }  
                    }

    if ($department_id == $to_dept) {
        $_SESSION['error'] = "Cannot transfer to the same department!";
        header("Location: all_order.php");
        exit;
    }

    $query = "INSERT INTO metal_tracking 
                 (to_dept, notes, from_dept, weight, touch, pieces, stone_weight) 
              VALUES 
                 ('$to_dept', '$notes', '$department_id', '$weight', '$gold_touch', '$pieces', '$stone_weight')";

    if (mysqli_query($link, $query)) {
        $_SESSION['success'] = "Metal transferred successfully.";
    } else {
        $_SESSION['error'] = "Database Error: " . mysqli_error($link);
    }

} else {
    $_SESSION['error'] = "Please select orders and a department.";
}

header("Location: st_tranfer_metal.php");
exit;
?>