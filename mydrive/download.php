<?php

use function GuzzleHttp\json_encode;

require_once("s3-object.php");
if (isset($_GET['ob']) && !empty($_GET['ob'])) {
    $objectName = base64_decode($_GET['ob']);
    $object = $s3->getObject(array(
        'Bucket' => MY_AWS_S3_BUCKET_NAME, //Name of the source bucket
        'Key'    => $objectName //the name of the file you want to download
    ));

    header('Content-Description: File Transfer');
    //this assumes content type is set when uploading the file.
    header('Content-Type: ' . $object['@metadata']['headers']['content-type']);
    header('Content-Disposition: attachment; filename=' . basename($objectName));
    header('Content-Length: ' . $object['@metadata']['headers']['content-length']);
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');

    //send file to browser for download. 

    echo ($object["Body"]);
    exit();
} else {
    header('Location: home.php');
}
?>