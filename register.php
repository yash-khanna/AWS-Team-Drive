<?php
require_once("config/ini.php");
if (isset($_POST['submit']) && isset($_POST['full_name']) && isset($_POST['email']) && isset($_POST['password']) && !empty($_POST['full_name']) && !empty($_POST['email']) && !empty($_POST['password'])) {
  $full_name = $_POST['full_name'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  $sql = "INSERT IGNORE INTO `users`(`id`, `name`, `email`, `password`, `timestamp`) VALUES (NULL, '$full_name', '$email', '$password', '" . date("Y-m-d H:i:s", time()) . "')";
  $conn->query($sql);
  if ($conn->affected_rows <= 0) {
    echo "<script>alert(\"Error Registering!\");</script>";
  } else {
    header("Location: index.php");
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
  <title>Register | TeamDrive</title>
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
  <link rel="shortcut icon" href="mydrive/assets/images/favicon.png" />
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
              <h4>New here?</h4>
              <h6 class="font-weight-light">Join us today! It takes only few steps</h6>
              <form class="pt-3" method="post">
                <div class="form-group">
                  <label>Full Name</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-account-outline text-primary"></i>
                      </span>
                    </div>
                    <input name="full_name" type="text" class="form-control form-control-lg border-left-0" placeholder="Full Name" required>
                  </div>
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-email-outline text-primary"></i>
                      </span>
                    </div>
                    <input name="email" type="email" class="form-control form-control-lg border-left-0" placeholder="Email" required>
                  </div>
                </div>
                <!--<div class="form-group">
                    <label>Country</label>
                    <select class="form-control form-control-lg" id="exampleFormControlSelect2">
                      <option>Country</option>
                      <option>United States of America</option>
                      <option>United Kingdom</option>
                      <option>India</option>
                      <option>Germany</option>
                      <option>Argentina</option>
                    </select>
                  </div> -->
                <div class="form-group">
                  <label>Password</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-lock-outline text-primary"></i>
                      </span>
                    </div>
                    <input name="password" minlength="6" type="password" class="form-control form-control-lg border-left-0" id="exampleInputPassword" placeholder="Password" required>
                  </div>
                </div>
                <div class="mb-4">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input" required> I agree to all Terms & Conditions </label>
                  </div>
                </div>
                <div class="mt-3">
                  <button name="submit" type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN UP</button>
                </div>
                <div class="text-center mt-4 font-weight-light"> Already have an account? <a href="index.php" class="text-primary">Login</a>
                </div>
              </form>
            </div>
          </div>
          <div class="col-lg-6 register-half-bg d-flex flex-row">
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