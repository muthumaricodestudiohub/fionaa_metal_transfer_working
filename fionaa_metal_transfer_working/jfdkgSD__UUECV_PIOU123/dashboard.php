<?php
session_start();
include("include/connection.php");

$u_uname = '';
    if (isset($_COOKIE['auth_token'])) {
        $u_uname = $_COOKIE['auth_token'];
    } else {
        header("location:index.php");
    }

// Get counts for dashboard
$total_users = $link->query("SELECT COUNT(*) as count FROM users")->fetch_assoc()['count'];
$total_departments = $link->query("SELECT COUNT(*) as count FROM departments")->fetch_assoc()['count'];

include 'include/header.php';
?>
<style>
    .col{
        margin-bottom:1% !important;
    }
</style>

<div class="page-wrapper">
    <div class="page-content">
        <!-- Dashboard Cards -->
        
          <?php if (isset($_GET['success'])){ ?>
                        <div class="alert alert-success"><?php echo $_GET['success']; ?></div>
                    <?php } ?>


<script>
function confirmClear() {
    if (confirm("Are you sure you want to clear the data?")) {
        window.location.href = "clear_data.php";
    }
    // agar 'No' click karega to kuch nahi hoga
}
</script>
      <!--   <div style="margin-bottom:2%">
        <button class="btn btn-primary"><a style="color:white" href="clear_data.php">Clear Data</a></button>
        </div>
       -->  
        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-5">
            <!-- Total Users Card -->
           
            
            <!-- Total Departments Card -->
           
            <!-- Total Departments Card -->
            <div class="col">
                <div class="card radius-10 bg-gradient-deepblue">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h5 class="mb-0 text-white"><?php
                            $sql47 = "SELECT count(id) AS total_order FROM orders";
                            $result47 = mysqli_query($link, $sql47);
                            if ($result47 && $result47->num_rows > 0) {
                                 $row47 = $result47->fetch_assoc();
                               echo     $total_order_in = mysqli_real_escape_string($link, $row47['total_order']);
                                }
                            
                            ?></h5>
                            <div class="ms-auto">
                                <i class='bx bx-buildings fs-3 text-white'></i>
                            </div>
                        </div>
                        <div class="progress my-2 bg-white-transparent" style="height:3px;">
                            <div class="progress-bar bg-white" role="progressbar" style="width: 100%"></div>
                        </div>
                        <div class="d-flex align-items-center text-white">
                            <p class="mb-0">Total Orders IN</p>
                            <a href="assign_role.php" class="ms-auto text-white"><i class='bx bx-right-arrow-alt'></i></a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col">
                <div class="card radius-10 bg-gradient-deepblue">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h5 class="mb-0 text-white"><?php
                            $sql472 = "SELECT count(id) AS total_order FROM orders WHERE current_dept='51'";
                            $result472 = mysqli_query($link, $sql472);
                            if ($result472 && $result472->num_rows > 0) {
                                 $row472 = $result472->fetch_assoc();
                               echo     $total_order_out = mysqli_real_escape_string($link, $row472['total_order']);
                                }
                            
                            ?></h5>
                            <div class="ms-auto">
                                <i class='bx bx-buildings fs-3 text-white'></i>
                            </div>
                        </div>
                        <div class="progress my-2 bg-white-transparent" style="height:3px;">
                            <div class="progress-bar bg-white" role="progressbar" style="width: 100%"></div>
                        </div>
                        <div class="d-flex align-items-center text-white">
                            <p class="mb-0">Total Orders Out</p>
                            <a href="assign_role.php" class="ms-auto text-white"><i class='bx bx-right-arrow-alt'></i></a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col">
                <div class="card radius-10 bg-gradient-deepblue">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h5 class="mb-0 text-white"><?php
                          
                               echo     $total_order = $total_order_in - $total_order_out;
                              
                            ?></h5>
                            <div class="ms-auto">
                                <i class='bx bx-buildings fs-3 text-white'></i>
                            </div>
                        </div>
                        <div class="progress my-2 bg-white-transparent" style="height:3px;">
                            <div class="progress-bar bg-white" role="progressbar" style="width: 100%"></div>
                        </div>
                        <div class="d-flex align-items-center text-white">
                            <p class="mb-0">Total Orders Balance</p>
                            <a href="assign_role.php" class="ms-auto text-white"><i class='bx bx-right-arrow-alt'></i></a>
                        </div>
                    </div>
                </div>
            </div>
            
            
            
             <div class="col">
                <div class="card radius-10 bg-gradient-deepblue">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h5 class="mb-0 text-white"><?php
                            $sql48 = "SELECT sum(description) AS total_pieses FROM orders";
                            $result48 = mysqli_query($link, $sql48);
                            $total_pieses_in = 0;
                            if ($result48 && $result48->num_rows > 0) {
                                 $row48 = $result48->fetch_assoc();
                               echo     $total_pieses_in = mysqli_real_escape_string($link, $row48['total_pieses']) ?? 0;
                                }else{
                                    echo 0.00;
                                }
                            
                            ?></h5>
                            <div class="ms-auto">
                                <i class='bx bx-buildings fs-3 text-white'></i>
                            </div>
                        </div>
                        <div class="progress my-2 bg-white-transparent" style="height:3px;">
                            <div class="progress-bar bg-white" role="progressbar" style="width: 100%"></div>
                        </div>
                        <div class="d-flex align-items-center text-white">
                            <p class="mb-0">Total Pieces In</p>
                            <a href="assign_role.php" class="ms-auto text-white"><i class='bx bx-right-arrow-alt'></i></a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col">
                <div class="card radius-10 bg-gradient-deepblue">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h5 class="mb-0 text-white"><?php
                            $sql482 = "SELECT sum(description) AS total_pieses FROM orders WHERE current_dept='51'";
                            $result482 = mysqli_query($link, $sql482);
                            $total_pieses_out = 0;
                            if ($result482 && $result482->num_rows > 0) {
                                 $row482 = $result482->fetch_assoc();
                                  echo  $total_pieses_out = mysqli_real_escape_string($link, $row482['total_pieses']) ?? 0 ;
                             
                                }else{
                                    echo $total_pieses_out;
                                }
                            
                            ?></h5>
                            <div class="ms-auto">
                                <i class='bx bx-buildings fs-3 text-white'></i>
                            </div>
                        </div>
                        <div class="progress my-2 bg-white-transparent" style="height:3px;">
                            <div class="progress-bar bg-white" role="progressbar" style="width: 100%"></div>
                        </div>
                        <div class="d-flex align-items-center text-white">
                            <p class="mb-0">Total Pieces Out</p>
                            <a href="assign_role.php" class="ms-auto text-white"><i class='bx bx-right-arrow-alt'></i></a>
                        </div>
                    </div>
                </div>
            </div>
            
            
            
            <div class="col">
                <div class="card radius-10 bg-gradient-deepblue">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h5 class="mb-0 text-white"><?php
                                   $total_pieses =0;
                                   if($total_pieses_in> 0 && $total_pieses_out >0){
                               echo     $total_pieses = $total_pieses_in - $total_pieses_out;
                                   }else{
                                        echo     $total_pieses;
                                   }
                               
                            ?></h5>
                            <div class="ms-auto">
                                <i class='bx bx-buildings fs-3 text-white'></i>
                            </div>
                        </div>
                        <div class="progress my-2 bg-white-transparent" style="height:3px;">
                            <div class="progress-bar bg-white" role="progressbar" style="width: 100%"></div>
                        </div>
                        <div class="d-flex align-items-center text-white">
                            <p class="mb-0">Total Pieces Balance</p>
                            <a href="assign_role.php" class="ms-auto text-white"><i class='bx bx-right-arrow-alt'></i></a>
                        </div>
                    </div>
                </div>
            </div>
            
            
            
            <!-- Total Departments Card -->
            <div class="col">
                <div class="card radius-10 bg-gradient-deepblue">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h5 class="mb-0 text-white"><?php
                            $sql4 = "SELECT sum(use_gold) AS total_weight FROM departments";
                            $result4 = mysqli_query($link, $sql4);
                            if ($result4 && $result4->num_rows > 0) {
                                 $row4 = $result4->fetch_assoc();
$total_weight = mysqli_real_escape_string($link, $row4['total_weight']);
echo number_format((float)$total_weight, 2);

                                }
                            
                            ?></h5>
                            <div class="ms-auto">
                                <i class='bx bx-buildings fs-3 text-white'></i>
                            </div>
                        </div>
                        <div class="progress my-2 bg-white-transparent" style="height:3px;">
                            <div class="progress-bar bg-white" role="progressbar" style="width: 100%"></div>
                        </div>
                        <div class="d-flex align-items-center text-white">
                            <p class="mb-0">Total Gross Weight</p>
                            <a href="assign_role.php" class="ms-auto text-white"><i class='bx bx-right-arrow-alt'></i></a>
                        </div>
                    </div>
                </div>
            </div>
            
             <!-- Total Departments Card -->
           
            
             <!-- Total Departments Card -->
           
            
<div class="col">
    <div class="card radius-10 bg-gradient-deepblue">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <h5 class="mb-0 text-white">
                    <?php
                    $factory_in = 0;
                    $sql481 = "SELECT SUM(weight * touch / 100) AS factory_in FROM metal_tracking WHERE to_dept = from_dept";
                    $result481 = mysqli_query($link, $sql481);
                    if ($result481 && mysqli_num_rows($result481) > 0) {
                        $row481 = mysqli_fetch_assoc($result481);
                        $factory_in = $row481['factory_in'] ?? 0;
                    }
                    echo number_format($factory_in,2);
                    ?>
                </h5>
                <div class="ms-auto">
                    <i class='bx bx-buildings fs-3 text-white'></i>
                </div>
            </div>
            <div class="progress my-2 bg-white-transparent" style="height:3px;">
                <div class="progress-bar bg-white" role="progressbar" style="width: 100%"></div>
            </div>
            <div class="d-flex align-items-center text-white">
                <p class="mb-0">Factory In (Fine)</p>
                <a href="#" class="ms-auto text-white"><i class='bx bx-right-arrow-alt'></i></a>
            </div>
        </div>
    </div>
</div>

<div class="col">
    <div class="card radius-10 bg-gradient-deepblue">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <h5 class="mb-0 text-white">
                    <?php
                    $factory_out = 0;
                    $sql4821 = "SELECT SUM(weight * gold_touch / 100) AS factory_out FROM order_tracking WHERE to_dept = '51' AND status='1'";
                    $result4821 = mysqli_query($link, $sql4821);
                    if ($result4821 && mysqli_num_rows($result4821) > 0) {
                        $row4821 = mysqli_fetch_assoc($result4821);
                        $factory_out = $row4821['factory_out'] ?? 0;
                    }
                    echo number_format($factory_out,2);
                    ?>
                </h5>
                <div class="ms-auto">
                    <i class='bx bx-buildings fs-3 text-white'></i>
                </div>
            </div>
            <div class="progress my-2 bg-white-transparent" style="height:3px;">
                <div class="progress-bar bg-white" role="progressbar" style="width: 100%"></div>
            </div>
            <div class="d-flex align-items-center text-white">
                <p class="mb-0">Factory Out (Fine)</p>
                <a href="#" class="ms-auto text-white"><i class='bx bx-right-arrow-alt'></i></a>
            </div>
        </div>
    </div>
</div>

<div class="col">
    <div class="card radius-10 bg-gradient-deepblue">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <h5 class="mb-0 text-white">
                    <?php
                    $factory_balance = $factory_in - $factory_out ;
                    echo number_format($factory_balance,2);
                    ?>
                </h5>
                <div class="ms-auto">
                    <i class='bx bx-buildings fs-3 text-white'></i>
                </div>
            </div>
            <div class="progress my-2 bg-white-transparent" style="height:3px;">
                <div class="progress-bar bg-white" role="progressbar" style="width: 100%"></div>
            </div>
            <div class="d-flex align-items-center text-white">
                <p class="mb-0">Factory Balance (Fine)</p>
                <a href="#" class="ms-auto text-white"><i class='bx bx-right-arrow-alt'></i></a>
            </div>
        </div>
    </div>
</div>

<div class="col">
    <div class="card radius-10 bg-gradient-deepblue">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <h5 class="mb-0 text-white">
                  <?php
                    // Stone In
                   $total_stone_receive = mysqli_fetch_assoc(mysqli_query($link,
            "SELECT SUM(stone_weight) as total FROM metal_tracking WHERE to_dept=56  AND status='1'"
        ))['total'] ?? 0;
        
         $total_stone_receive_orders = mysqli_fetch_assoc(mysqli_query($link,
            "SELECT SUM(t_stone_weight) as total FROM order_tracking WHERE status='1'"
        ))['total'] ?? 0;
                    $rft = $total_stone_receive + $total_stone_receive_orders;
                    echo number_format($rft, 2);
                    ?>
                </h5>
                <div class="ms-auto">
                    <i class='bx bx-buildings fs-3 text-white'></i>
                </div>
            </div>
            <div class="progress my-2 bg-white-transparent" style="height:3px;">
                <div class="progress-bar bg-white" role="progressbar" style="width: 100%"></div>
            </div>
            <div class="d-flex align-items-center text-white">
                <p class="mb-0">Stone In</p>
                <a href="#" class="ms-auto text-white"><i class='bx bx-right-arrow-alt'></i></a>
            </div>
        </div>
    </div>
</div>

<div class="col">
    <div class="card radius-10 bg-gradient-deepblue">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <h5 class="mb-0 text-white">
                   <?php
                    // Stone Out
                    $sql41 = "SELECT use_gold FROM departments WHERE id='69'";
                    $result41 = mysqli_query($link, $sql41);
                    $stone_out = 0;
                    if ($result41 && mysqli_num_rows($result41) > 0) {
                        $row41 = mysqli_fetch_assoc($result41);
                        $stone_out = (float)$row41['use_gold'];
                    }
                    echo number_format($stone_out, 2);
                    ?>
                </h5>
                <div class="ms-auto">
                    <i class='bx bx-buildings fs-3 text-white'></i>
                </div>
            </div>
            <div class="progress my-2 bg-white-transparent" style="height:3px;">
                <div class="progress-bar bg-white" role="progressbar" style="width: 100%"></div>
            </div>
            <div class="d-flex align-items-center text-white">
                <p class="mb-0">Stone Out</p>
                <a href="#" class="ms-auto text-white"><i class='bx bx-right-arrow-alt'></i></a>
            </div>
        </div>
    </div>
</div>

<div class="col">
    <div class="card radius-10 bg-gradient-deepblue">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <h5 class="mb-0 text-white">
                    <?php
                    // Stone Balance
                    $stone_balance = $rft - $stone_out;
                    echo number_format($stone_balance, 2);
                    ?>
                </h5>
                <div class="ms-auto">
                    <i class='bx bx-buildings fs-3 text-white'></i>
                </div>
            </div>
            <div class="progress my-2 bg-white-transparent" style="height:3px;">
                <div class="progress-bar bg-white" role="progressbar" style="width: 100%"></div>
            </div>
            <div class="d-flex align-items-center text-white">
                <p class="mb-0">Stone balance</p>
                <a href="#" class="ms-auto text-white"><i class='bx bx-right-arrow-alt'></i></a>
            </div>
        </div>
    </div>
</div>

 <div class="col">
                <div class="card radius-10 bg-gradient-deepblue">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h5 class="mb-0 text-white"><?php
                            $sql4 = "SELECT sum(loss) AS total_weight FROM departments";
                            $result4 = mysqli_query($link, $sql4);
                            if ($result4 && $result4->num_rows > 0) {
                                 $row4 = $result4->fetch_assoc();
                                    $total_weight = mysqli_real_escape_string($link, $row4['total_weight']);
                               echo number_format($total_weight,2);
                                }
                            
                            ?></h5>
                            <div class="ms-auto">
                                <i class='bx bx-buildings fs-3 text-white'></i>
                            </div>
                        </div>
                        <div class="progress my-2 bg-white-transparent" style="height:3px;">
                            <div class="progress-bar bg-white" role="progressbar" style="width: 100%"></div>
                        </div>
                        <div class="d-flex align-items-center text-white">
                            <p class="mb-0">Total Loss</p>
                            <a href="assign_role.php" class="ms-auto text-white"><i class='bx bx-right-arrow-alt'></i></a>
                        </div>
                    </div>
                </div>
            </div>
            
             <div class="col">
                <div class="card radius-10 bg-gradient-deepblue">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h5 class="mb-0 text-white"><?= $total_users ?></h5>
                            <div class="ms-auto">
                                <i class='bx bx-group fs-3 text-white'></i>
                            </div>
                        </div>
                        <div class="progress my-2 bg-white-transparent" style="height:3px;">
                            <div class="progress-bar bg-white" role="progressbar" style="width: 100%"></div>
                        </div>
                        <div class="d-flex align-items-center text-white">
                            <p class="mb-0">Total Users</p>
                            <a href="all_users.php" class="ms-auto text-white"><i class='bx bx-right-arrow-alt'></i></a>
                        </div>
                    </div>
                </div>
            </div>
            
             <div class="col">
                <div class="card radius-10 bg-gradient-deepblue">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <h5 class="mb-0 text-white"><?= $total_departments ?></h5>
                            <div class="ms-auto">
                                <i class='bx bx-buildings fs-3 text-white'></i>
                            </div>
                        </div>
                        <div class="progress my-2 bg-white-transparent" style="height:3px;">
                            <div class="progress-bar bg-white" role="progressbar" style="width: 100%"></div>
                        </div>
                        <div class="d-flex align-items-center text-white">
                            <p class="mb-0">Total Departments</p>
                            <a href="assign_role.php" class="ms-auto text-white"><i class='bx bx-right-arrow-alt'></i></a>
                        </div>
                    </div>
                </div>
            </div>



                   
                        <!-- Dynamic Department Weight Cards -->
            <?php
$dept_weights = $link->query("
    SELECT id, name, IFNULL(use_gold, 0) AS total_weight, IFNULL(loss, 0) AS total_loss
    FROM departments
");


while($dept = $dept_weights->fetch_assoc()){ 
$dept_id = $dept['id'];

?>
    <div class="col">
        <a href="message.php?id=<?= $dept_id ?>" style="text-decoration:none;">


        <div class="card radius-10 bg-gradient-orange">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <h5 class="mb-0 text-white"><?= htmlspecialchars($dept['name']) ?></h5>
                     
                    <div class="ms-auto">
                        <i class='bx bx-weight fs-3 text-white'></i>
                    </div>
                </div>
                <div class="progress my-2 bg-white-transparent" style="height:3px;">
                    <div class="progress-bar bg-white" role="progressbar" style="width: 100%"></div>
                </div>
                 <div class="d-flex  text-white" style="flex-direction: column;">
                    <p class="mb-0">Total Gold: <?= number_format($dept['total_weight'], 2) ?> g</p>
                    <p class="mb-0" style="display:none;">Total Loss: 
                    <?= number_format($dept['total_loss'], 2) ?> 
                    g</p>
                    
                    <?php
                    $sql48 = "SELECT sum(description) AS total_pieses FROM orders where current_dept='$dept_id'";
                    $result48 = mysqli_query($link, $sql48);
                        if ($result48 && $result48->num_rows > 0) {
                            $row48 = $result48->fetch_assoc();
                                $total_pieces = $row48['total_pieses'] ?? 0; 

                            ?>
<p class="mb-0" style="display:none;">Total Pieces: <?= (int)$total_pieces ?></p>
                            <?php

                        }else{
                        }

                    $sql489 = "SELECT count(id) AS total_order FROM orders where current_dept='$dept_id'";
                    $result489 = mysqli_query($link, $sql489);
                        if ($result489 && $result489->num_rows > 0) {
                            $row489 = $result489->fetch_assoc();
                                $total_order = $row489['total_order'] ?? 0; 

                            ?>

<p class="mb-0">Total Order: <?= (int)$total_order ?></p>
<?php
}
                    ?>
                    
                    
                </div>
            </div>
        </div>
</a>

    </div>
<?php } ?>

        </div>
        
    </div>
</div>
<?php include 'include/footer.php'; ?>