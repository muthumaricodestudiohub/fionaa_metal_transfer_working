<?php
session_start();
include("include/connection.php");
$current_time = date("Y-m-d H:i:s");

// ✅ Get user department from UUID
if (isset($_COOKIE['uuid'])) {
    $uuid_cookie = mysqli_real_escape_string($link, $_COOKIE['uuid']);
} else {
    header("location:logout.php");
    exit;
}

$sql4 = "SELECT * FROM ods WHERE uuid='$uuid_cookie' AND status='verified'";
$result4 = mysqli_query($link, $sql4);
if ($result4 && mysqli_num_rows($result4) > 0) {
    $row4 = mysqli_fetch_assoc($result4);
    $user_id = mysqli_real_escape_string($link, $row4['user_id']);
} else {
    header("location:logout.php");
    exit;
}

$sql47 = "SELECT * FROM users WHERE userid='$user_id'";
$result47 = mysqli_query($link, $sql47);
if ($result47 && $result47->num_rows > 0) {
    $row47 = $result47->fetch_assoc();
    $department_id = mysqli_real_escape_string($link, $row47['department_id']);
} else {
    header("location:logout.php");
    exit;
}

// ✅ Collect form data
$to_dept     = mysqli_real_escape_string($link, $_POST['to_dept']);
$notes       = mysqli_real_escape_string($link, $_POST['notes']);
$gold_touch  = mysqli_real_escape_string($link, $_POST['gold_touch']);
$totalWeight = isset($_POST['total_weight_input']) ? floatval($_POST['total_weight_input']) : 0;

// ✅ Check if total weight is available in department's use_gold
$resDept = mysqli_query($link, "SELECT use_gold FROM departments WHERE id='$department_id' LIMIT 1");
if ($resDept && mysqli_num_rows($resDept) > 0) {
    $deptData = mysqli_fetch_assoc($resDept);
    $availableGold = floatval($deptData['use_gold']);
    if ($totalWeight > $availableGold) {
        $_SESSION['error'] = "Total weight cannot exceed available gold ($availableGold).";
        header("location:central_trasfer_metal.php");
        exit;
    }
}

// Row data
$weights    = $_POST['weight'] ?? [];
$touches    = $_POST['touch'] ?? [];
$alloys     = $_POST['alloy'] ?? [];
$row_totals = $_POST['row_total'] ?? [];
$notesRow   = $_POST['note'] ?? [];


// Alloy data
$alloy_names   = $_POST['alloy_name'] ?? [];
$alloy_percs   = $_POST['alloy_percentage'] ?? [];
$alloy_weights = $_POST['alloy_weight'] ?? [];

mysqli_begin_transaction($link);

try {
    $w1=0;
    $aw=0;
     foreach ($weights as $i => $w) {
        $w1 += floatval($w);
     }
     
      foreach ($alloy_names as $i => $aname) {
        $aw   += floatval($alloy_weights[$i]);
      }
      
      $rt = $w1 + $aw;
    
    
      // Insert into metal_tracking
        $sqlInsert = "INSERT INTO metal_tracking 
                        (weight, to_dept, notes, from_dept, status, touch) 
                      VALUES 
                        ('$rt', '$to_dept', '$notes', '$department_id', '0', '$gold_touch')";
        mysqli_query($link, $sqlInsert);
        $tracking_id = mysqli_insert_id($link); // ✅ get auto-increment id
    
    // ✅ Insert metal entries
    foreach ($weights as $i => $w) {
        $w = floatval($w);
        $t = floatval($touches[$i]);
        $a = floatval($alloys[$i]);
        $row_note = mysqli_real_escape_string($link, $notesRow[$i]);

      

        // Insert into metal_entry master table
        $sqlEntry = "INSERT INTO metal_entry 
                        (user_id, entry_id, from_dept, to_dept, notes, gold_touch, total_weight) 
                     VALUES 
                        ('$user_id', '$tracking_id', '$department_id', '$to_dept', '$row_note', '$t', '$w')";
        mysqli_query($link, $sqlEntry);
    }

    // ✅ Insert alloy history + update alloy table
    foreach ($alloy_names as $i => $aname) {
        $perc = floatval($alloy_percs[$i]);
        $aw   = floatval($alloy_weights[$i]);

        // if($aw <= 0) continue; // skip if no alloy weight

        // get alloy id from name
        $res = mysqli_query($link, "SELECT id,total_weight FROM alloy WHERE name='" . mysqli_real_escape_string($link, $aname) . "' LIMIT 1");
        if ($res && mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_assoc($res);
            $alloy_id = $row['id'];
            $current_tw = floatval($row['total_weight']);
    // echo "Department: $department_id, AlloyID: $alloy_id, Weight: $aw, TrackingID: $tracking_id <br>";

            // Insert history
            $sqlHist = "INSERT INTO alloy_history (dept_id, alloy_id, weight, status, entry_id) 
                        VALUES ('$department_id', '$alloy_id', '$aw', '1', '$tracking_id')";
            mysqli_query($link, $sqlHist);

            // $new_tw = $current_tw - $aw;
            // mysqli_query($link, "UPDATE alloy SET total_weight='$new_tw' WHERE id='$alloy_id'");
        }
    }


    if ($totalWeight > 0) {
        // $sqlDept = "UPDATE departments 
        //             SET use_gold = use_gold - $totalWeight 
        //             WHERE id='$department_id'";
        // mysqli_query($link, $sqlDept);
    }

    mysqli_commit($link);
    $_SESSION['success'] = "Metal entry added successfully!";
    header("location:central_trasfer_metal.php");
    exit;

} catch (Exception $e) {
    mysqli_rollback($link);
    $_SESSION['error'] = "Error saving data: " . $e->getMessage();
    header("location:central_trasfer_metal.php");
    exit;
}
?>
