<?php
date_default_timezone_set("Asia/Kolkata");
$conn = new mysqli('localhost', 'root', '', 'teamdrive');
if($conn->connect_error) {
    die("Connection with the database could not be established!");
}
