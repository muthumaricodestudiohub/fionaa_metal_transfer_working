<?php
error_reporting(0);
ini_set('display_errors', 0);
ob_start();
date_default_timezone_set('Asia/Kolkata');
session_start();
include("include/connection.php");
$username = mysqli_real_escape_string($link, $_POST['uname']);
$password = mysqli_real_escape_string($link, $_POST['password']);

if (isset($_POST["login"])) {
    
          $ip = $_SERVER['REMOTE_ADDR'];

          $date = date('Y-m-d H:i:s');
	if (!isset($_COOKIE["validation"])) {

		$sql = "SELECT * FROM users WHERE userid='$username' AND password='$password' LIMIT 1";
		
		$result = mysqli_query($link, $sql);
		if ($result->num_rows > 0) {
		$usr = $result->fetch_assoc();
				$mobile = $usr['mobile'];
					$uuid = uniqid();
					$otp = random_int(100000, 999999);
    				setcookie("uuid", $uuid, time() + (10 * 365 * 24 * 60 * 60));
					mysqli_query($link, "INSERT INTO ods (mobile_no, ots, user_id, uuid, status,otp) VALUES ('0', '$otp', '$username', '$uuid', 'verified','$otp')");
                    header('Location:dashboard.php?success=10786');
                    exit;
				
		//	}
		} else {
			header("Location:login.php?error=13");
		}
	} else {
		header("Location:login.php?error=33");
	}

}
else{
    if(isset($_GET['sec'])){
    $sec = $_GET['sec'];
    
    $sql1 = "SELECT * FROM admin_login_log WHERE auth_token = '$sec'  ORDER BY id LIMIT 1";
   

		$result1 = mysqli_query($link, $sql1);
		if ($result1->num_rows > 0) {
		    $username = mysqli_real_escape_string($link, $_GET['uname']);
            $password = mysqli_real_escape_string($link, $_GET['password']);
            	$sql = "SELECT * FROM users WHERE userid='$username' AND password='$password' LIMIT 1";
		$result = mysqli_query($link, $sql);
		if ($result->num_rows > 0) {
		  	while ($usr = $result->fetch_assoc()) {
			  	$mobile = $usr['mobile'];
				
					$uuid = uniqid();
					setcookie("uuid", $uuid, time() + (10 * 365 * 24 * 60 * 60));
					$my_otp1 = rand(111111, 999999);
					mysqli_query($link, "INSERT INTO ods (mobile_no, ots, user_id, uuid, status) VALUES ('$mobile', '$my_otp1', '$username', '$uuid', 'verified')");
				// 	header("Location:dashboard.php?success=1");
				// 	exit;
				    echo "<script>window.location.href='dashboard.php?success=1';</script>";
    exit;
				
			}
		} else {
		  //  header("Location:login.php?error=13");
		  //  exit;
		   echo "<script>window.location.href='login.php?error=13';</script>";
    exit;
		}
		}else{
		  // 	header("Location:login.php");
		  // 	exit;
		   echo "<script>window.location.href='login.php??error=88888';</script>";
    exit;
		}
}
    
}

function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
} 
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--favicon-->
    <link rel="icon" href="codestudiohub-logo.png" type="image/png" />
  <!--plugins-->
  <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
  <link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
  <link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
  <!-- loader-->
  <link href="assets/css/pace.min.css" rel="stylesheet" />
  <script src="assets/js/pace.min.js"></script>
  <!-- Bootstrap CSS -->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/css/bootstrap-extended.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
  <link href="assets/css/app.css" rel="stylesheet">
  <link href="assets/css/icons.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/plugins/notifications/css/lobibox.min.css" />
  <title>goldmetaltransfer</title>
  <style type="text/css">
    .bm{
      background-color: #533e2e;
    }
  </style>
   <script type="text/javascript">
    toastr.options = {

      "closeButton": false,

      "debug": false,

      "newestOnTop": false,

      "progressBar": false,

      "positionClass": "toast-top-right",

      "preventDuplicates": false,

      "onclick": null,

      "showDuration": "300",

      "hideDuration": "1000",

      "timeOut": "5000",

      "extendedTimeOut": "1000",

      "showEasing": "swing",

      "hideEasing": "linear",

      "showMethod": "fadeIn",

      "hideMethod": "fadeOut"

    }
  </script>
</head>

<body class="bm" style="background-color:#533e2e">
	<script type="text/javascript">
					window.onload = function() {
						<?php
						if ($_GET['error'] == 99998557 && $_GET['error'] != '') {
						?>
						Swal.fire({text:"Invalid Sponsor id.",icon:"warning"})
						<?php
						}
						?>
						<?php
						if ($_GET['error'] == 999987 && $_GET['error'] != '') {
						?>
						Swal.fire({text:"Sponsor id not activated.",icon:"warning"})
						<?php
						}
						?>
							<?php
						if ($_GET['error'] == 13 && $_GET['error'] != '') {
						?>
						Swal.fire({text:"Invalid User ID or Password.",icon:"warning"})
						<?php
						}
						?>
					
						
						
						<?php
						
						
						if ($_GET['error'] == 3366 && $_GET['error'] != '') {
						?>
						Swal.fire({text:"Invalid OTP.",icon:"warning"})
						<?php
						}
						?>
						<?php
						
						
						if ($_GET['error'] == 1088 && $_GET['error'] != '') {
						?>
						
						Swal.fire({text:"Invalid OTP.",icon:"warning"}) 
						<?php
						}
						?>
						<?php
						if ($_GET['error'] != '' && $_GET['error'] == 33) {
						?>
						Swal.fire({text:"Your ID Blocked Contact To Admin",icon:"warning"})
						<?php
						}
						?>
						<?php
						if ($_GET['success'] != '' && $_GET['success'] == 10) {
						?>
						Swal.fire({text:"Password Change Successfully",icon:"success"})
						<?php
						}
						?>
							<?php
						if ($_GET['success'] != '' && $_GET['success'] == 888) {
						?>
						Swal.fire({text:"Password send your register mail id",icon:"success"})
						<?php
						}
						?>
					};
				</script>
  <div class="wrapper">
    <div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
      <div class="container-fluid">
        <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
          <div class="col mx-auto">
            <div class="card">
              <div class="card-body">
                <div class="border p-4 rounded">
                  <div class="text-center">
                    <!--<img src="1.jpeg" width="180" alt="" />-->
                    <img src="codestudiohub-logo.png" class="logo" alt="goldmetaltransfer" style="width:184px;height:auto;">
                    </div>
                  <div class="form-body">
                    <form class="row g-3" action="" method="POST">
                      
                      
                      <div class="col-12">
                        <label for="inputEmailAddress" class="form-label">User Id</label>
                        <label for="username" style="color:white"><b>Username</b></label>
                                            <input type="text" class="form-control" id="username" name="uname"r value="<?php if (isset($_COOKIE['uname'])) {
                                            echo $_COOKIE['uname'];				} ?>" placeholder="User Id" required>
                      </div>
                      <div class="col-12">
                         <label for="userpassword" class="form-label">Password</label>
                                            <div style="position:relative;">
                                            <input type="password" class="form-control" id="userpassword" name="password" placeholder="Enter Password" required="">
                                            <span class="password-toggle-icon" style="
    position: absolute;
    /* left: 0; */
    right: 0;
    margin-right: 20px;
    top: 0;
    margin-top: 10px;
    /* margin-bottom: -30px; */
"><i class="fas fa-eye"></i></span>
                      </div>
                      <div class="input-group mb-3">
            <input type="hidden" name="token-response" id="token-response">
          </div>
                      <!--<div class="col-md-6">-->
                      <!--  <div class="form-check form-switch">-->
                      <!--    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>-->
                      <!--    <label class="form-check-label" for="flexSwitchCheckChecked">Remember Me</label>-->
                      <!--  </div>-->
                      <!--</div>-->
                      <div class="col-12">
                        <div class="d-grid">
                          <button type="submit" class="btn" style="background-color:#25594c;color:white" name="login" value="Sign In"><i class="bx bxs-lock-open"></i>Sign in</button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <!--plugins-->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
  <script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
  <script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
  <script src="assets/plugins/notifications/js/lobibox.min.js"></script>
				<script src="assets/plugins/notifications/js/notifications.min.js"></script>
				<script src="assets/plugins/notifications/js/notification-custom-script.js"></script>
  <!--Password show & hide js -->
  <script>
    $(document).ready(function () {
      $("#show_hide_password a").on('click', function (event) {
        event.preventDefault();
        if ($('#show_hide_password input').attr("type") == "text") {
          $('#show_hide_password input').attr('type', 'password');
          $('#show_hide_password i').addClass("bx-hide");
          $('#show_hide_password i').removeClass("bx-show");
        } else if ($('#show_hide_password input').attr("type") == "password") {
          $('#show_hide_password input').attr('type', 'text');
          $('#show_hide_password i').removeClass("bx-hide");
          $('#show_hide_password i').addClass("bx-show");
        }
      });
    });
  </script>
   <script>
 
const passwordField = document.getElementById("userpassword");
const togglePassword = document.querySelector(".password-toggle-icon i");
togglePassword.addEventListener("click", function () {
  if (passwordField.type === "password") {
    passwordField.type = "text";
    togglePassword.classList.remove("fa-eye");
    togglePassword.classList.add("fa-eye-slash");
  } else {
    passwordField.type = "password";
    togglePassword.classList.remove("fa-eye-slash");
    togglePassword.classList.add("fa-eye");
  }
});
  
  </script>
  <script src="assets/js/app.js"></script>
</body>

</html>