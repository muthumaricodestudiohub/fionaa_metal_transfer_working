<?php
session_start();
include("include/connection.php");
$current_time = date("M d, Y H:i:s");

// ✅ Check UUID cookie
if (isset($_COOKIE['uuid'])) {
    $uuid_cookie = mysqli_real_escape_string($link, $_COOKIE['uuid']);
} else {
    $uuid_cookie = '';
}

// ✅ Validate user session
$sql4 = "SELECT * FROM ods WHERE uuid='$uuid_cookie' AND status='verified'";
$result4 = mysqli_query($link, $sql4);

if ($result4 && mysqli_num_rows($result4) > 0) {
    $row4 = mysqli_fetch_assoc($result4);
    $user_id = mysqli_real_escape_string($link, $row4['user_id']);
} else {
    header("location:logout.php");
    exit;
}

// ✅ Get department of logged-in user
$sql47 = "SELECT * FROM users WHERE userid='$user_id'";
$result47 = mysqli_query($link, $sql47);
if ($result47 && $result47->num_rows > 0) {
    $row47 = $result47->fetch_assoc();
    $department_id = mysqli_real_escape_string($link, $row47['department_id']);
}

include("include/header.php");
?>
<style>
.highlighted {
    background-color: #fff3cd;
    transition: background-color 2s ease;
}
</style>

<div class="page-wrapper">
    <div class="page-content">
        <div class="col-xl-12 mx-auto">
            <h6 class="mb-0 text-uppercase">Transfer Metal</h6>
            <hr/>
            <div class="card border-top border-0 border-4 border-primary">
                <div class="card-body">

                    <?php if (isset($_SESSION['success'])): ?>
                        <div class="alert alert-success"><?= $_SESSION['success']; unset($_SESSION['success']); ?></div>
                    <?php endif; ?>

                    <?php if (isset($_SESSION['error'])): ?>
                        <div class="alert alert-danger"><?= $_SESSION['error']; unset($_SESSION['error']); ?></div>
                    <?php endif; ?>

                    <!-- ✅ Transfer Form -->
                    <form method="post" id="transferForm" action="add_transfer_metal_action.php">
                        <?php 
                        $departments = mysqli_query($link, "SELECT id, name FROM departments WHERE name != 'Loss' ORDER BY name ASC"); 
                        ?>

                        <div class="mb-3">
                            <label><strong>Select Department:</strong></label>
                            <select name="to_dept" class="form-control" required>
                                <option value="">-- Select Department --</option>
                                <?php if ($departments): ?>
                                    <?php while ($dept = mysqli_fetch_assoc($departments)): ?>
                                        <option value="<?= htmlspecialchars($dept['id']) ?>">
                                            <?= htmlspecialchars($dept['name']) ?>
                                        </option>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label><strong>Notes:</strong></label>
                            <textarea name="notes" class="form-control" placeholder="Enter transfer notes"></textarea>
                        </div>

                        <hr/>
                        <h6>📜 Select Metal to Transfer</h6>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" id="checkAll"></th>
                                    <th>Sr.no</th>
                                    <th>Weight</th>
                                    <th>Touch</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
  $hist_sql = "SELECT * FROM metal_tracking  WHERE from_dept='$department_id' AND to_dept='$department_id' ";

                            $hist_res = mysqli_query($link, $hist_sql);
                                $serial = 1;

                            if ($hist_res && mysqli_num_rows($hist_res) > 0) {
                                while ($row = mysqli_fetch_assoc($hist_res)) {
                                    
                                    $mt_id = $row['id'];
                                    // $sql47 = "SELECT * FROM metal_tracking where metal_tracking_id='$mt_id' AND status='1' OR status='0'";
                                  $sql47 = "SELECT * FROM metal_tracking WHERE metal_tracking_id='$mt_id' AND (status='1' OR status='0')";
  
                                    $result47 = mysqli_query($link, $sql47);
                                    if ($result47 && mysqli_num_rows($result47) > 0) {

                                    $row47 = mysqli_fetch_assoc($result47);
                                    }else {
                                        echo "<tr>
                                                <td><input type='checkbox' name='ids[]' value='{$row['id']}'></td>
                                                <td>{$serial}</td>
                                                <td>{$row['weight']}</td>
                                                <td>{$row['touch']}</td>";
                                    
                                        if ($row['status'] != 3) {
                                            echo "<td><a href='edit_metal.php?id={$row['id']}'>Edit</a></td>";
                                        } else {
                                            echo "<td>-</td>"; 
                                        }
                                    
                                        echo "</tr>";
                                        $serial++;
                                    }
                                     
                                }
                                
                                
                                
                            } else {
                                echo "<tr><td colspan='6'>No history found.</td></tr>";
                            }
                            ?>
                            </tbody>
                        </table>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-success">Transfer Metal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// ✅ Check/Uncheck All
document.getElementById("checkAll").addEventListener("change", function() {
    let checkboxes = document.querySelectorAll("input[name='ids[]']");
    checkboxes.forEach(cb => cb.checked = this.checked);
});
</script>

<?php include 'include/footer.php'; ?>
