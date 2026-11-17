<?php

error_reporting(0);

ini_set('display_error', 0);



session_start();
include("connection.php");

$current_time = date("M d, Y H:i:s");

// Validate UUID cookie
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
        $user_name = mysqli_real_escape_string($link, $row47['name']);
} 
 $sql48 = "SELECT * FROM departments WHERE id='$department_id'";
$result48 = mysqli_query($link, $sql48);
if ($result48 && $result48->num_rows > 0) {
     $row48 = $result48->fetch_assoc();
        $role = mysqli_real_escape_string($link, $row48['role']);
        $department_name = mysqli_real_escape_string($link, $row48['name']);
} 
$roles_array = explode(',', $role); // Convert string to array
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="codestudiohub-logo.png" type="image/png" />
    <link rel="stylesheet" href="assets/plugins/notifications/css/lobibox.min.css" />
    <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
    <link href="assets/css/pace.min.css" rel="stylesheet" />
    <script src="assets/js/pace.min.js"></script>
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="assets/css/app.css" rel="stylesheet">
    <link href="assets/css/icons.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/dark-theme.css" />
    <link rel="stylesheet" href="assets/css/semi-dark.css" />
    <link rel="stylesheet" href="assets/css/header-colors.css" />


<!-- 
    <link href="assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
    <script src="assets/plugins/datatable/js/dataTables.buttons.min.js"></script>
    <script src="assets/plugins/datatable/js/buttons.html5.min.js"></script>
    <script src="assets/plugins/datatable/js/buttons.print.min.js"></script>
    <script src="assets/plugins/datatable/js/jszip.min.js"></script>
 -->
<link href="assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
<script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
<script src="assets/plugins/datatable/js/dataTables.buttons.min.js"></script>
<script src="assets/plugins/datatable/js/buttons.html5.min.js"></script>
<script src="assets/plugins/datatable/js/buttons.print.min.js"></script>
<script src="assets/plugins/datatable/js/jszip.min.js"></script>


    <title>goldmetaltransfer</title>
  </head>
  <style type="text/css">
    .sidebar-header {
      overflow: hidden;
    }
    .sidebar-header .logo {
      width: auto;
      max-width: 210px;
      height: 44px;
      object-fit: contain;
      display: block;
    }
  </style>

  <body>
    <div class="wrapper">
        <div class="sidebar-wrapper" data-simplebar="true">
        <div class="sidebar-header">
                <div>
                     <img src="codestudiohub-logo.png" class="logo" alt="goldmetaltransfer">
  <!--0->all order 3->edit order 4->delete order-->
  <!--1->add Order 2->transfer order 5->Accept orders -->
  <!--6->all Metal 7->edit Metal 8->delete Metal -->
  <!--9->add Metal 10->transfer Metal 11->Accept Metal-->
                </div>
             </div>
            <ul class="metismenu" id="menu">
            <li>
                <a href="dashboard.php">
                    <div class="parent-icon"><i class="bx bx-home-alt"></i></div>
                    <div class="menu-title">Dashboard</div>
                </a>
            </li>
   <li>
                    <a href="javascript:;" class="has-arrow">
                        <div class="parent-icon"><i class="bx bx-cog"></i>
                        </div>
                        <div class="menu-title">Order</div>
                    </a>
                    <ul>
                        <?php
                        if(in_array(1,$roles_array)){
                            ?>
                        <li> <a href="add_order.php"><i class="bx bx-right-arrow-alt"></i>Add Order</a>
                        </li>
                         <?php
                       }
                      if(in_array(0,$roles_array)){
                        ?>
                        <li> <a href="all_order.php"><i class="bx bx-right-arrow-alt"></i>All Order's</a>
                        </li>
                        <?php
                        }
                        ?>
                        <?php
                        if(in_array(5,$roles_array)){
                            ?>
                    <li> <a href="./receive_history.php"><i class="bx bx-right-arrow-alt"></i>Order Received History</a>
                        </li>
                        <?php
                        }
                        ?>
                        <?php
                        if(in_array(2,$roles_array)){
                            ?>
                        <li> <a href="./transfer_history.php"><i class="bx bx-right-arrow-alt"></i>Order Transfer History</a>
                        </li>
                        <?php
                        }
                        ?>
                    </ul>
                </li>
                	 <?php
  				 if($department_id == '37'){
  				 
                        // if(in_array(37,$roles_array)){
  					        ?>
  				 <li>
  					<a href="javascript:;" class="has-arrow">
  						<div class="parent-icon"><i class="bx bx-user"></i>
  						</div>
  						<div class="menu-title">Alloy</div>
  					</a>
  					<ul>
  					    
  					    <li> <a href="add_alloy.php"><i class="bx bx-right-arrow-alt"></i>Add Alloy</a>
  						</li>
  						
  					    <li> <a href="alloy_history.php"><i class="bx bx-right-arrow-alt"></i>Alloy History</a>
  						</li>
  					   	
  					
  					</ul>
  				</li>
  				<?php
                        }
                        ?>
                
                  <li>
  					<a href="javascript:;" class="has-arrow">
  						<div class="parent-icon"><i class="bx bx-user"></i>
  						</div>
  						<div class="menu-title">Metal</div>
  					</a>
  					<ul>
  					    <?php
                        if(in_array(9,$roles_array)){
  				
  					        ?>
  					   	<li> <a href="add_metal.php"><i class="bx bx-right-arrow-alt"></i>Add metal</a>
  						</li>
  					    <li> <a href="all_metal.php"><i class="bx bx-right-arrow-alt"></i>All Metal</a>
  						</li>
  						<?php
  					    }
  					    ?>
  					    
  					   
  					   <?php
  					  if(in_array(10,$roles_array)){
  					    ?>
  					    <?php
  				 if($department_id == '37'){
  					    ?>
  					    
  					    
  					    
  					    <li> <a href="central_trasfer_metal.php"><i class="bx bx-right-arrow-alt"></i>Transfer Metal</a>
  						</li>
  						<li> <a href="new_metal_transfer_history.php"><i class="bx bx-right-arrow-alt"></i>Transfer history</a>
  						</li>
  						
  					    <?php
  					    }
  				             elseif($department_id == '59'){
  				           ?>
  				           <li> <a href="s_tranfer_metal.php"><i class="bx bx-right-arrow-alt"></i>Transfer Metal</a>
  						</li>
  						<li> <a href="s_transfer_metal_history.php"><i class="bx bx-right-arrow-alt"></i>Transfer Metal History</a>
  						</li>
      				     <?php
      				        }
      				        elseif($department_id == '67'){
  				           ?>
  				           <li> <a href="st_tranfer_metal.php"><i class="bx bx-right-arrow-alt"></i>Transfer Metal</a>
  						</li>
  						<li> <a href="st_transfer_metal_history.php"><i class="bx bx-right-arrow-alt"></i>Transfer Metal History</a>
  						</li>
      				     <?php
      				        }
      				    
  					    
  					    
  					    
  					    
  					    
  					    else{
  					        ?>
  					        <?php
                        if(in_array(9,$roles_array)){
  				
  					        ?>
  					       
  					    <li> <a href="add_tranfer_metal.php"><i class="bx bx-right-arrow-alt"></i>Transfer Metal</a>
  						</li>
  						<li> <a href="transfer_metal_history.php"><i class="bx bx-right-arrow-alt"></i>Transfer Metal History</a>
  						</li>
  						<?php
                        }else{
                            ?>
                            
  					    <li> <a href="tranfer_metal.php"><i class="bx bx-right-arrow-alt"></i>Transfer Metal</a>
  						</li>
  						<li> <a href="transfer_metal_history.php"><i class="bx bx-right-arrow-alt"></i>Transfer Metal History</a>
  						</li>
                            
                            <?php
                        }
                        ?>
  					        <?php
  					    }
  					    ?>
  					    
  						
  					
  						
  						<?php
  					    }
  					    ?>
  					    <?php
  					    if(in_array(11,$roles_array)){
  					    ?>
  						<li> <a href="receive_metal_history.php"><i class="bx bx-right-arrow-alt"></i>Receive Metal History</a>
  						</li>
  						<?php
  					    }
  					    ?>
  					</ul>
  				</li>
                
                <li>
                    <a href="./logout.php" class="has-arrow">
                        <div class="parent-icon"><i class='fadeIn animated bx bx-log-out'></i>
                        </div>
                        <div class="menu-title">Logout</div>
                    </a>
                </li>
            </ul>
        </div>
        <header>
            <div class="topbar d-flex align-items-center">
                <nav class="navbar navbar-expand">
                    <div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
                    </div>
                    <div class="search-bar flex-grow-1">
                        <h4 class="logo-text mb-0"><?php echo $user_name ?>(<?php echo $department_name ?>)</h4>
                    </div>
                    <div class="top-menu ms-auto">
                        <ul class="navbar-nav align-items-center">
                            <li class="nav-item mobile-search-icon">

                            </li>
                            <li class="nav-item dropdown dropdown-large">
                                <div class="dropdown-menu dropdown-menu-end">
                                    <div class="row row-cols-3 g-3 p-3">
                                    </div>
                                </div>
                            </li>
                            <li class="nav-item dropdown dropdown-large">
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="javascript:;">
                                        <div class="msg-header">
                                            <p class="msg-header-title">Notifications</p>
                                            <p class="msg-header-clear ms-auto"></p>
                                        </div>
                                    </a>
                                    <div class="header-notifications-list">
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="notify bg-light-primary text-primary"><i class="bx bx-group"></i>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name"></h6>

                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </li>
                          



                            
                            <li class="nav-item dropdown dropdown-large">

                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="javascript:;">
                                        <div class="msg-header">
                                            <p class="msg-header-title">Messages</p>
                                            <p class="msg-header-clear ms-auto">Marks all as read</p>
                                        </div>
                                    </a>
                                    <div class="header-message-list">
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <img src="assets/images/avatars/avatar-1.png" class="msg-avatar" alt="user avatar">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Daisy Anderson <span class="msg-time float-end">5 sec
                                                            ago</span></h6>
                                                    <p class="msg-info">The standard chunk of lorem</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <img src="assets/images/avatars/avatar-2.png" class="msg-avatar" alt="user avatar">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Althea Cabardo <span class="msg-time float-end">14
                                                            sec ago</span></h6>
                                                    <p class="msg-info">Many desktop publishing packages</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <img src="assets/images/avatars/avatar-3.png" class="msg-avatar" alt="user avatar">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Oscar Garner <span class="msg-time float-end">8 min
                                                            ago</span></h6>
                                                    <p class="msg-info">Various versions have evolved over</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <img src="assets/images/avatars/avatar-4.png" class="msg-avatar" alt="user avatar">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Katherine Pechon <span class="msg-time float-end">15
                                                            min ago</span></h6>
                                                    <p class="msg-info">Making this the first true generator</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <img src="assets/images/avatars/avatar-5.png" class="msg-avatar" alt="user avatar">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Amelia Doe <span class="msg-time float-end">22 min
                                                            ago</span></h6>
                                                    <p class="msg-info">Duis aute irure dolor in reprehenderit</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <img src="assets/images/avatars/avatar-6.png" class="msg-avatar" alt="user avatar">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Cristina Jhons <span class="msg-time float-end">2 hrs
                                                            ago</span></h6>
                                                    <p class="msg-info">The passage is attributed to an unknown</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <img src="assets/images/avatars/avatar-7.png" class="msg-avatar" alt="user avatar">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">James Caviness <span class="msg-time float-end">4 hrs
                                                            ago</span></h6>
                                                    <p class="msg-info">The point of using Lorem</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <img src="assets/images/avatars/avatar-8.png" class="msg-avatar" alt="user avatar">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Peter Costanzo <span class="msg-time float-end">6 hrs
                                                            ago</span></h6>
                                                    <p class="msg-info">It was popularised in the 1960s</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <img src="assets/images/avatars/avatar-9.png" class="msg-avatar" alt="user avatar">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">David Buckley <span class="msg-time float-end">2 hrs
                                                            ago</span></h6>
                                                    <p class="msg-info">Various versions have evolved over</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <img src="assets/images/avatars/avatar-10.png" class="msg-avatar" alt="user avatar">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Thomas Wheeler <span class="msg-time float-end">2 days
                                                            ago</span></h6>
                                                    <p class="msg-info">If you are going to use a passage</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="javascript:;">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <img src="assets/images/avatars/avatar-11.png" class="msg-avatar" alt="user avatar">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Johnny Seitz <span class="msg-time float-end">5 days
                                                            ago</span></h6>
                                                    <p class="msg-info">All the Lorem Ipsum generators</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <a href="javascript:;">
                                        <div class="text-center msg-footer">View All Messages</div>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>