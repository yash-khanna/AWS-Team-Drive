<?php
session_start();
require_once("config/ini.php");
if (isset($_POST['submit']) && isset($_POST['email']) && isset($_POST['password'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$password'";
  $result = $conn->query($sql);
  if (!$result->num_rows) {
    echo "<script>alert(\"Wrong Credentials!\");</script>";
  } else {
    $_SESSION['email'] = $email;
    $_SESSION['password'] = $password;
    header("Location: mydrive/home.php");
    die();
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login | TeamDrive</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="mydrive/assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="mydrive/assets/vendors/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="mydrive/assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <!-- endinject -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="mydrive/assets/css/style.css">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="mydrive/assets/images/favicon.ico" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
        <div class="row flex-grow">
          <div class="col-lg-6 d-flex align-items-center justify-content-center">
            <div class="auth-form-transparent text-left p-3">
              <div class="brand-logo text-center">
                <img src="mydrive/assets/images/logo.png" alt="logo">
              </div>

              <form class="pt-3" method="post">
                <div class="form-group">
                  <label for="exampleInputEmail">Email</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-account-outline text-primary"></i>
                      </span>
                    </div>
                    <input name="email" type="email" class="form-control form-control-lg border-left-0" id="" placeholder="Email" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword">Password</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-lock-outline text-primary"></i>
                      </span>
                    </div>
                    <input name="password" type="password" class="form-control form-control-lg border-left-0" id="exampleInputPassword" placeholder="Password" required>
                  </div>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input"> Keep me signed in </label>
                  </div>
                  <a href="#" class="auth-link">Forgot password?</a>
                </div>
                <div class="my-3">
                  <button name="submit" type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">LOGIN</button>
                </div>
                <div class="text-center mt-4 font-weight-light"> Don't have an account? <a href="register.php" class="text-primary">Create</a>
                </div>
              </form>
            </div>
          </div>
          <div class="col-lg-6 login-half-bg d-flex flex-row">
            <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright &copy; <?php echo date("Y"); ?> All rights reserved.</p>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="mydrive/assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="mydrive/assets/js/off-canvas.js"></script>
  <script src="mydrive/assets/js/hoverable-collapse.js"></script>
  <script src="mydrive/assets/js/misc.js"></script>
  <script src="mydrive/assets/js/settings.js"></script>
  <script src="mydrive/assets/js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>