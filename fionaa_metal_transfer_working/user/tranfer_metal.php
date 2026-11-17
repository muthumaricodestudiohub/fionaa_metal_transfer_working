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

$c_query = "SELECT * FROM carat ORDER BY name ASC";
$carat = mysqli_query($link, $c_query);

include("include/header.php");
?>
<style>
/* fade-out row highlight */
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
                    
                    <?php if (isset($_GET['success'])): ?>
                        <div class="alert alert-success">Order Deleted Successfully</div>
                    <?php endif; ?>

                    <form method="post" id="transferForm" action="transfer_metal_action.php">
                        
                        <?php 
                        $departments = mysqli_query($link, "SELECT id, name FROM departments WHERE name != 'Loss' ORDER BY name ASC");

                        if(in_array(10,$roles_array)){ ?>
                        <div class="row">
                             <div class="mb-3 col-3">
                            <label><strong>Select Department:</strong></label>
                            <select name="to_dept" class="form-control" >
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
                             <div class=" mb-3 col-3">
                                    <label><strong>Gold Weight:</strong></label>
                                    
                                        <input type="number" name="weight" id="gwei" step="0.01" class="form-control" placeholder="Enter gold weight" >

                                </div>
                              <div class="mb-3 col-3">
                            <label><strong>Select Carat:</strong></label>
                            <select name="gold_touch" class="form-control" required>
                                <option value="">-- Select Carat --</option>
                                <?php if ($carat): ?>
                                    <?php while ($c = mysqli_fetch_assoc($carat)): ?>
                                        <option value="<?= htmlspecialchars($c['percentage']) ?>">
                                            <?= htmlspecialchars($c['name']) ?>
                                        </option>
                                    <?php endwhile; ?>
                                <?php endif; ?>
                            </select>
                        </div>
                        </div>
                       
<!-- Notes -->
                        <div class="mb-3">
                            <label><strong>Notes:</strong></label>

                            <textarea name="notes" class="form-control" placeholder="Enter transfer notes"></textarea>
                        </div>
                       
   
                            <!--    <div class="mb-3">-->
                            <!--    <label for="gold_touch" class="form-label">Gold Touch (%)</label>-->
                            <!--    <input type="number" step="0.01" class="form-control" id="gold_touch" name="gold_touch" placeholder="Enter Gold touch (99.5)" required>-->
                            <!--</div>-->

                        <div class="mb-3">
                            <button type="submit" class="btn btn-success">Transfer Metal</button>
                        </div>
<!--                        <button type="button" id="toggleScanner" class="btn btn-primary">-->
<!--    Start Scanner-->
<!--</button>-->
                        <?php } ?>
                        
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'include/footer.php'; ?>
