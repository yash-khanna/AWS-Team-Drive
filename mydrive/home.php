<?php

use function GuzzleHttp\Psr7\mimetype_from_extension;
use function GuzzleHttp\Psr7\mimetype_from_filename;

require_once("../config/check-session.php");
require_once("components/ui-components.php");
require_once("s3-object.php");

$objects = $s3->getIterator('ListObjects', array(
  "Bucket" => MY_AWS_S3_BUCKET_NAME
));

function formatSizeUnits($bytes)
{
  if ($bytes >= 1073741824) {
    $bytes = number_format($bytes / 1073741824, 2) . ' GB';
  } elseif ($bytes >= 1048576) {
    $bytes = number_format($bytes / 1048576, 2) . ' MB';
  } elseif ($bytes >= 1024) {
    $bytes = number_format($bytes / 1024, 2) . ' KB';
  } elseif ($bytes > 1) {
    $bytes = $bytes . ' bytes';
  } elseif ($bytes == 1) {
    $bytes = $bytes . ' byte';
  } else {
    $bytes = '0 bytes';
  }

  return $bytes;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  HeadTags();
  ?>
  <link rel="stylesheet" href="assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
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
            <h2 class="text-muted font-weight-bold mb-2"> Shared Files </h2>
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
                            <div class="col-12">
                              <div class="table table-responsive">
                                <table id="order-listing" class="table">
                                  <thead>
                                    <tr>
                                      <th>Files</th>
                                      <th>File Type</th>
                                      <th>File Size</th>
                                      <th>Actions</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                    foreach ($objects as $object) {
                                    ?>
                                      <tr>
                                        <td><?php echo $object['Key'] ?></td>
                                        <td><?php echo mimetype_from_filename($object['Key'])  ?></td>
                                        <td><?php echo formatSizeUnits($object['Size']);   ?></td>
                                        <td>
                                          <a target="_blank" href="<?php echo $s3->getObjectUrl($bucketName, $object['Key']); ?>" class="btn btn-outline-primary">View</a>
                                          <a target="_blank" href="download.php?ob=<?php echo base64_encode($object['Key']); ?>" class="btn btn-outline-primary">Download</a>
                                          <a href="delete.php?ob=<?php echo base64_encode($object['Key']); ?>" class="btn btn-outline-primary">Delete</a>
                                        </td>
                                      </tr>
                                    <?php
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
  <script src="assets/vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="assets/js/off-canvas.js"></script>
  <script src="assets/js/hoverable-collapse.js"></script>
  <script src="assets/js/misc.js"></script>
  <script src="assets/js/settings.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page -->
  <script src="assets/js/data-table.js"></script>
  <!-- End custom js for this page -->
</body>

</html>