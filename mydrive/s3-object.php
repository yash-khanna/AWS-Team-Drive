<?php
require 'vendor/autoload.php';

use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;

// AWS Info
define('MY_AWS_S3_BUCKET_NAME', '', true);
define('MY_AWS_IAM_PUBLIC_KEY', '', true);
define('MY_AWS_IAM_SECRET_KEY', '', true);
// $bucketName = MY_AWS_S3_BUCKET_NAME;
// $IAM_KEY = MY_AWS_IAM_PUBLIC_KEY;
// $IAM_SECRET = MY_AWS_IAM_SECRET_KEY;

try {
    // You may need to change the region. It will say in the URL when the bucket is open
    // and on creation.
    $s3 = S3Client::factory(
        array(
            'credentials' => array(
                'key' => MY_AWS_IAM_PUBLIC_KEY,
                'secret' => MY_AWS_IAM_SECRET_KEY,
                'ACL'    => 'public-read'
            ),
            'version' => 'latest',
            'region'  => 'ap-south-1'
        )
    );
} catch (Exception $e) {
    // We use a die, so if this fails. It stops here. Typically this is a REST call so this would
    // return a json object.
    die("Error: " . $e->getMessage());
}
?>