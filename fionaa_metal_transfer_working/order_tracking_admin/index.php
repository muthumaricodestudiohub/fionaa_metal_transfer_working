<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("include/connection.php");
session_start();
if (isset($_POST["login"])) {
  $username = $_POST['uname'];
  $password = $_POST['password'];
  $sql = "SELECT * FROM admin WHERE admin_id='$username' AND admin_password='$password' LIMIT 1";
  $result = mysqli_query($link, $sql);
  $usr = mysqli_fetch_array($result);
  $mobile = $usr['admin_mobile'];
  if ($usr) {
    if (!empty($_POST["customCheck"])) {
      setcookie("uname", $username, time() + (10 * 365 * 24 * 60 * 60));
      setcookie("password", $password,  time() + (10 * 365 * 24 * 60 * 60));
      
    } else {
      if (isset($_COOKIE['uname'])) {
        setcookie("uname", "");
      }
      if (isset($_COOKIE["password"])) {
        setcookie("password", "");
      }
    }

    $newuniqueid = uniqid();
    $ipaddress = $_SERVER['REMOTE_ADDR'];

    $sqlwrefdsd = "UPDATE admin_login_log SET stitus='failed' WHERE username='$username'";

    if ($link->query($sqlwrefdsd) === TRUE) {
      //echo "Record updated successfully";
    }

    $sqldsds = "INSERT INTO admin_login_log (username, ip_address, auth_token, stitus, panel)
    VALUES ('$username','$ipaddress','$newuniqueid', 'success', 'Bored Monkey')";

    if ($link->query($sqldsds) === TRUE) {

      $cookie_name = "auth_token";
      $cookie_value = $newuniqueid;
      setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day

      //echo "New record created successfully";
    }

    $_COOKIE['auth_token'] = $usr['admin_id'];

    header("Location:dashboard.php?success=1");
  } else {
    header("Location:index.php?error=1");
  }
//   } else {
//     header("Location:index.php?error=546");
//   }
    
         
    //  }else{
    //      header("Location:index.php");
    //     exit;
    // }
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

<body class="bm">
     <script type="text/javascript">
      window.onload = function() {
          <?php

									if ($_GET['error'] == 1 && $_GET['error'] != '') {
									?>
										Lobibox.notify('error', {
											pauseDelayOnHover: true,
											continueDelayOnInactiveTab: false,
											position: 'top right',
											icon: 'bx bx-x-circle',
											msg: 'Invalid User ID or Password.'
										});



									<?php
									}
									?>
									  <?php

									if ($_GET['error'] == 546 && $_GET['error'] != '') {
									?>
										Lobibox.notify('error', {
											pauseDelayOnHover: true,
											continueDelayOnInactiveTab: false,
											position: 'top right',
											icon: 'bx bx-x-circle',
											msg: 'Security Verification Failed.'
										});



									<?php
									}
									?>
      }
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
                    <img src="codestudiohub-logo.png" class="logo" alt="goldmetaltransfer" style="width:184px;height:auto;">
				</div>
                    </div>
                  <div class="form-body">
                    <form class="row g-3" action="" method="POST">
                      <div class="col-12">
                        <label for="inputEmailAddress" class="form-label">Email Address</label>
                        <input type="email" class="form-control" name="uname" placeholder="Email Address" value="<?php if (isset($_COOKIE['uname'])) {
                            echo $_COOKIE['uname'];
                            } ?>">
                      </div>
                      <div class="col-12">
                        <label for="inputChoosePassword" class="form-label">Enter Password</label>
                        <div class="input-group" id="show_hide_password">
                          <input type="password" class="form-control border-end-0" name="password" value="<?php if (isset($_COOKIE['password'])) {
                                                                                                        echo $_COOKIE['password'];
                                                                                                      } ?>" placeholder="Enter Password"> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
                        </div>
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
  <script src="assets/js/app.js"></script>
</body>

</html>