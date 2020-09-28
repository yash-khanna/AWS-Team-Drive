<?php
require_once("../config/check-session.php");
require_once("s3-object.php");
if (!empty($_FILES)) {

	// For this, I would generate a unqiue random string for the key name. But you can do whatever.
	$keyName = basename($_FILES["file"]['name']);
	$pathInS3 = 'https://s3.ap-south-1.amazonaws.com/' . $bucketName . '/' . $keyName;
	// Add it to S3
	try {
		// Uploaded:
		$file = $_FILES["file"]['tmp_name'];
		$s3->putObject(
			array(
				'Bucket' => MY_AWS_S3_BUCKET_NAME, //Name of the destination bucket
				'Key' =>  $keyName, //name of the file you want to upload
				'SourceFile' => $file,
				'StorageClass' => 'STANDARD',
				'ACL' => 'public-read',
				'ContentType' => mime_content_type($file)
			)
		);
	} catch (S3Exception $e) {
		die('Error:' . $e->getMessage());
	} catch (Exception $e) {
		die('Error:' . $e->getMessage());
	}
	echo 'Done';
	// Now that you have it working, I recommend adding some checks on the files.
	// Example: Max size, allowed file types, etc.
}
