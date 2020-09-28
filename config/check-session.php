<?php
session_start();
require_once("../config/ini.php");
if (!isset($_SESSION['email']) || !isset($_SESSION['password']) || empty($_SESSION['email']) || empty($_SESSION['password'])) {
    session_destroy();
    echo "<meta http-equiv=\"refresh\" content=\"0;url= ../index.php\" />";
    die();
} else {
    $email = $_SESSION['email'];
    $password = $_SESSION['password'];

    $sql = "SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$password'";
    $result = $conn->query($sql);
    if (!$result->num_rows) {
        session_destroy();
        echo "<meta http-equiv=\"refresh\" content=\"0;url= ../index.php\" />";
        die();
    } else {
        $GLOBALS['user_details'] = $result->fetch_assoc();
    }
}
?>