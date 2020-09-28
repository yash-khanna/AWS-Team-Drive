<?php
require_once("../config/check-session.php");
require_once("components/ui-components.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  HeadTags();
  ?>
  <link rel="stylesheet" href="assets/css/dropzone.css">
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php
    DisplayNavBar();
    ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <?php
      DisplaySidebar();
      ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="d-xl-flex justify-content-between align-items-start">
            <h2 class="text-muted font-weight-bold mb-2"> Upload Files to TeamDrive </h2>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="d-sm-flex justify-content-between align-items-center transaparent-tab-border">
              </div>
              <div class="tab-content tab-transparent-content">
                <div class="tab-pane fade show active" id="business-1" role="tabpanel" aria-labelledby="business-tab">
                  <div class="row">
                    <div class="col-12 grid-margin">
                      <div class="card">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-sm-12">
                              <div class="d-flex justify-content-between align-items-center mb-4">
                                <h4 class="card-title mb-0">Drop your files in the space below</h4>
                              </div>
                            </div>
                            <div class="col-sm-12">
                              <form action="upload-files.php" class="dropzone" id="my-awesome-dropzone"></form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <?php
        DisplayFooter();
        ?>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="assets/vendors/jquery-circle-progress/js/circle-progress.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="assets/js/off-canvas.js"></script>
  <script src="assets/js/hoverable-collapse.js"></script>
  <script src="assets/js/misc.js"></script>
  <script src="assets/js/settings.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page -->
  <script src="assets/js/dropzone.js"></script>
  <!-- End custom js for this page -->
</body>

</html>