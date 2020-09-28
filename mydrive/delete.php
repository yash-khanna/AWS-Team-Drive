<?php
require_once("../config/check-session.php");

use function GuzzleHttp\json_encode;

require_once("s3-object.php");
if (isset($_GET['ob']) && !empty($_GET['ob'])) {
    $objectName = base64_decode($_GET['ob']);
    $result = $s3->deleteObject([
        'Bucket' => MY_AWS_S3_BUCKET_NAME, /* Name of the source bucket from where you want to delete the file */
        'Key'    => $objectName //Name of the file you want to delete from the specified bucket
    ]);
}
header('Location: home.php');
?>