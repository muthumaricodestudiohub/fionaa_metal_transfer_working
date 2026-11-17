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

// Get department id of user
$sql47 = "SELECT * FROM users WHERE userid='$user_id'";
$result47 = mysqli_query($link, $sql47);
if ($result47 && $result47->num_rows > 0) {
     $row47 = $result47->fetch_assoc();
     $department_id = mysqli_real_escape_string($link, $row47['department_id']);
} 

// Handle new alloy add
if (isset($_POST['add_alloy'])) {
    $alloy_id = mysqli_real_escape_string($link, $_POST['alloy_id']);
    $weight   = mysqli_real_escape_string($link, $_POST['total_weight']);

    // Insert into alloy_history
    $insert = "INSERT INTO alloy_history (dept_id, alloy_id, weight,accept_status) 
               VALUES ('$department_id', '$alloy_id', '$weight',1)";
    mysqli_query($link, $insert);

    // Fetch existing total_weight
    $sql_alloy = "SELECT total_weight FROM alloy WHERE id='$alloy_id'";
    $res_alloy = mysqli_query($link, $sql_alloy);
    if ($res_alloy && mysqli_num_rows($res_alloy) > 0) {
        $row_alloy = mysqli_fetch_assoc($res_alloy);
        $new_total = $row_alloy['total_weight'] + $weight;

        // Update total_weight in alloy table
        mysqli_query($link, "UPDATE alloy SET total_weight='$new_total' WHERE id='$alloy_id'");
    }

    $success = "Alloy weight added successfully.";
}
?>

<?php include('include/header.php'); ?>

<div class="page-wrapper">
    <div class="page-content">
        <div class="row">
            <main class="col-12 col-md-8 mx-auto">
                <h2>Add Alloy</h2>

                <?php if (isset($success)): ?>
                    <div class="alert alert-success"><?php echo $success; ?></div>
                <?php endif; ?>

                <div class="card">
                    <div class="card-body">
                        <form method="POST">
                            <div class="mb-3">
                                <label><strong>Select Alloy:</strong></label>
                                <select name="alloy_id" class="form-control" required>
    <option value="">-- Select Alloy --</option>
    <?php
    $res = mysqli_query($link, "SELECT id, name, total_weight FROM alloy ORDER BY name ASC");
    if ($res && mysqli_num_rows($res) > 0) {
        while ($row = mysqli_fetch_assoc($res)) {
            echo "<option value='".$row['id']."' data-weight='".$row['total_weight']."'>".$row['name']."</option>";
        }
    } else {
        echo "<option value=''>No data found</option>";
    }
    ?>
</select>

                                
                            </div>

                            <div class="mb-3">
                                <label><strong>Current Total Weight (grams):</strong></label>
                                <input type="text" id="currentWeight" class="form-control" readonly value="0">
                            </div>

                            <div class="mb-3">
                                <label><strong>Total Weight to Add (grams):</strong></label>
                                <input type="number" step="0.01" class="form-control" name="total_weight" required>
                            </div>

                            <button type="submit" name="add_alloy" class="btn btn-primary">Add Alloy</button>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    const alloySelect = document.querySelector("select[name='alloy_id']");
    const currentWeight = document.getElementById("currentWeight");

    alloySelect.addEventListener("change", function() {
        const selectedOption = alloySelect.options[alloySelect.selectedIndex];
        const weight = selectedOption.getAttribute("data-weight") || 0;
        currentWeight.value = parseFloat(weight).toFixed(2);
    });
});
</script>

<?php include('include/footer.php'); ?>
