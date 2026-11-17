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
            <h6 class="mb-0 text-uppercase">All Metal</h6>
            <hr/>
                        <div class="card border-top border-0 border-4 border-primary">
                <div class="card-body">

            <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sr.no</th>
                                        <th>Weight</th>
                                         <th>Touch</th>
                                         <!-- <th>Pure weight</th>-->
                                        <th>Note</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        
                                        <th>Actions </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sr = 1;
                                    $sql478 = "SELECT * FROM metal_tracking WHERE to_dept='$department_id' AND from_dept='$department_id' ORDER BY id DESC";
                                    $result478 = mysqli_query($link, $sql478);
                                    if ($result478 && $result478->num_rows > 0) {
                                         while($row478 = $result478->fetch_assoc()){
                                             $weight = $row478['weight'];
                                             $touch = $row478['touch'];
                                            //   $pure = ($weight * $touch) / 100;
                                        
                                        ?>
                                            <tr>
                                                <td><?php echo $sr ?></td>
                                                <td><?php echo $row478['weight'] ?></td>
                                               <td><?php echo $row478['touch'] ?></td>
                                                <td><?php echo $row478['notes'] ?></td>
                                                <td>
    <label class='badge bg-success'>Success</label>
    <?php
    // if ($row478['status'] == 0) {
    //     echo "<label class='badge bg-warning text-dark'>Pending</label>";
    // } elseif ($row478['status'] == 1) {
    //     echo "<label class='badge bg-success'>Success</label>";
    // }
    // elseif ($row478['status'] == 2) {
    //     echo "<label class='badge bg-danger'>Failed</label>";
    // }elseif ($row478['status'] == 3) {
    //     echo "<label class='badge bg-danger'>Waiting From Accept</label>";
    // }  
    // else {
    //     echo "<label class='badge bg-secondary'>Unknown</label>";
    // }
    ?>
</td>

                                                <td><?php echo $row478['date'] ?></td>
                                                <td>-</td>
                                             
                                            </tr>
                                      
                                        <?php
                                        $sr++;
                                         }
                                         
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
            
        </div>
    </div>  
            
        </div>
    </div>
</div>

<?php include 'include/footer.php'; ?>
