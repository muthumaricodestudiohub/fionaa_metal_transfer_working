<?php
session_start();
include("include/connection.php");
$current_time = date("M d, Y H:i:s");

// Check UUID cookie
if (isset($_COOKIE['uuid'])) {
    $uuid_cookie = mysqli_real_escape_string($link, $_COOKIE['uuid']);
} else {
    $uuid_cookie = '';
}

// Validate user session
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
} 

// Get metal id from URL
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
if ($id <= 0) {
    die("Invalid metal ID.");
}

// Fetch metal details
$metal_query = mysqli_query($link, "SELECT * FROM metal_tracking WHERE id='$id' LIMIT 1");
if (!$metal_query || mysqli_num_rows($metal_query) === 0) {
    die("Metal not found.");
}
$metal = mysqli_fetch_assoc($metal_query);
$weight = $metal['weight'];
// Handle update
if (isset($_POST['update_metal'])) {
     $gold_weight = mysqli_real_escape_string($link, $_POST['gold_weight']);
    $gold_touch  = mysqli_real_escape_string($link, $_POST['gold_touch']);
    $notes       = mysqli_real_escape_string($link, $_POST['notes']);
     $sql_from = "SELECT use_gold FROM departments WHERE id='$department_id'";
        $res_from = mysqli_query($link, $sql_from);
        if ($res_from && $res_from->num_rows > 0) {
            $row_from = $res_from->fetch_assoc();
            if($row_from['use_gold'] >= $weight){
                $from_use_gold = $row_from['use_gold'] - $weight;
                $from_use_gold1 = $from_use_gold + $gold_weight;
                mysqli_query($link, "UPDATE departments SET use_gold='$from_use_gold1' WHERE id='$department_id'");
                 $update_query = "UPDATE metal_tracking 
                     SET weight='$gold_weight', touch='$gold_touch', notes='$notes' 
                     WHERE id='$id'";

                if (mysqli_query($link, $update_query)) {
                    $success = "Metal updated successfully.";
                    // refresh data
                    $metal_query = mysqli_query($link, "SELECT * FROM metal_tracking WHERE id='$id' LIMIT 1");
                    $metal = mysqli_fetch_assoc($metal_query);
                } else {
                     $_SESSION['error'] = "Error updating: " . mysqli_error($link);
                }
            }else{
                 $_SESSION['success'] = "There is no Enough gold in total gold to edit metal";
            }
        }
   

   
    header("Location: add_tranfer_metal.php");
    exit;
}
?>

<?php include('include/header.php'); ?>

<div class="page-wrapper">
    <div class="page-content">
        <div class="row">
            <main>
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Edit Metal</h1>
                </div>

                <?php if (isset($error)): ?>
                    <div class="alert alert-danger"><?php echo $error; ?></div>
                <?php endif; ?>

                <?php if (isset($success)): ?>
                    <div class="alert alert-success"><?php echo $success; ?></div>
                <?php endif; ?>

                <div class="card">
                    <div class="card-body">
                        <form method="POST">
                            <div class="mb-3">
                                <label for="gold_weight" class="form-label">Gold Weight (grams)</label>
                                <input type="number" step="0.01" class="form-control" id="gold_weight" name="gold_weight" 
                                       value="<?= htmlspecialchars($metal['weight']) ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="gold_touch" class="form-label">Gold Touch (%)</label>
                                <input type="number" step="0.01" class="form-control" id="gold_touch" name="gold_touch" 
                                       value="<?= htmlspecialchars($metal['touch']) ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="notes" class="form-label">Notes</label>
                                <textarea name="notes" class="form-control"><?= htmlspecialchars($metal['notes']) ?></textarea>
                            </div>
                            <button type="submit" name="update_metal" class="btn btn-primary">Update Metal</button>
                            <a href="all_metal.php" class="btn btn-secondary">Back</a>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>
</div>

<?php include('include/footer.php'); ?>
