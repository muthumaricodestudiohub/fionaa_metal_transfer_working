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
            <h6 class="mb-0 text-uppercase">Transfer Metal History
             <?php if($department_id=='37'){ ?>
                                   <!--<br> <small> (Note: Fine section is only shown in Recovery department)</small>-->
                                         <?php } ?></h6>
            <hr/>
                        <div class="card border-top border-0 border-4 border-primary">
                <div class="card-body">

            <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>SR No.</th>
                                        <th>Weight</th>
                                        <th>Touch</th>
                                         <th>Pieces</th>
                                       
                                          <?php if($department_id=='56'){ ?>
                                     <th>Stone Weight</th>
                                      <?php } ?>
                                         <th>From Department</th>
                                         <th>To Department</th>
                                        <th>Note</th>
                                        <th>Status</th>
                                        <th>Transfered At</th>
                                        <th>Received At</th>
                                        <th>Actions </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sr = 1;
                                    // $sql478 = "SELECT * FROM metal_tracking WHERE from_dept='$department_id' AND to_dept!='$department_id'";
                                    $sql478 = "SELECT mt.*, 
                  df.name AS from_department_name, 
                  dt.name AS to_department_name
           FROM metal_tracking mt
           LEFT JOIN departments df ON mt.from_dept = df.id
           LEFT JOIN departments dt ON mt.to_dept = dt.id
           WHERE mt.from_dept='$department_id' AND mt.to_dept!='$department_id' ORDER BY mt.id DESC";

                                    $result478 = mysqli_query($link, $sql478);
                                    if ($result478 && $result478->num_rows > 0) {
                                         while($row478 = $result478->fetch_assoc()){
                                               $weight = $row478['weight'];
                                             $touch = $row478['touch'];
                                            //  $new_weight = ($weight * $touch) / 100;
                                        
                                        ?>
                                            <tr>
                                                <td><?php echo $sr ?></td>
                                                <td><?php echo $row478['weight'] ?></td>
                                                <td>
    <?php
    $gold_touch = $row478['touch'];
    $carat_name = "N/A";

    if (!empty($gold_touch)) {
        $gold_touch = mysqli_real_escape_string($link, $gold_touch);

$sqlCarat = "
SELECT name 
FROM carat 
WHERE CAST(percentage AS DECIMAL(10,2)) = CAST('$gold_touch' AS DECIMAL(10,2)) 
LIMIT 1
";
        // $sqlCarat = "SELECT name FROM carat WHERE percentage = '".mysqli_real_escape_string($link, $gold_touch)."' LIMIT 1";
        $resCarat = mysqli_query($link, $sqlCarat);
        if ($resCarat && mysqli_num_rows($resCarat) > 0) {
            $rowCarat = mysqli_fetch_assoc($resCarat);
            $carat_name = $rowCarat['name'];
        }
    }

    echo $carat_name;
    ?>
</td>
<td><?php echo $row478['pieces'] ?></td>
 
  <?php if($department_id=='56'){ ?>
                                              <td><?php echo htmlspecialchars($row478['stone_weight']); ?></td>
                                              <?php } ?>

                                                
                                                
                                                <td><?php echo $row478['from_department_name']  ?></td>
                                            <td><?php echo $row478['to_department_name']  ?></td>
                                                
                                                
                                               
                                                    <?php if($department_id=='37'){ ?>
                                                  <!--<td>-->
                                                      <?php
                                                    //   echo $new_weight; 
                                                      ?>
                                                      <!--</td>-->
                                                   <?php } ?>
                                              <td><?php echo $row478['notes'] ?></td>
                                                <td>
    <?php
    if ($row478['status'] == 0) {
        // echo "<label class='badge bg-warning text-dark'>Pending</label>";
        ?>
        <form method="post" action="incoming_metal_transfers_two.php" onsubmit="disableSubmit(this)">
                                                     <input type="hidden" name="deptid" value="<?php echo $department_id; ?>">
                                                    <input type="hidden" name="ot_id" value="<?php echo $row478['id']; ?>">
                                                    <input type="hidden" name="from_dept" value="<?php echo $row478['from_dept']; ?>">
                                                    <input type="hidden" name="weight" value="<?php echo $row478['weight']; ?>">
                                                     <input type="hidden" name="touch" value="<?php echo $row478['touch']; ?>">
                                                    <select name="status" class="form-select form-select-sm" onchange="this.form.submit()">
                                                        <option value="0" <?php if ($row478['status'] == '0') echo 'selected'; ?>>Pending</option>
                                                        <option value="2" <?php if ($row478['status'] == '2') echo 'selected disabled'; ?>>Reject</option>

                                                    </select>
                                                </form>
        <?php
    } elseif ($row478['status'] == 1) {
        echo "<label class='badge bg-success'>Success</label>";
    } elseif ($row478['status'] == 2) {
        echo "<label class='badge bg-danger'>Failed</label>";
    }elseif ($row478['status'] == 3) {
        echo "<label class='badge bg-danger'>Waiting From Accept</label>";
    }  
    else {
        echo "<label class='badge bg-secondary'>Unknown</label>";
    }
    ?>
</td>

                                                <td><?php echo $row478['date'] ?></td>
                                                <td><?php echo $row478['success_at'] ?></td>
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
