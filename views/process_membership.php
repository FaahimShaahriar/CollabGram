<?php
session_start();
include_once("../controller/userData.php");
include_once("../models/userModel.php");

// Add error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST['user_id']) && isset($_POST['package']) && isset($_POST['otp'])) {
    $userId = $_POST['user_id'];
    $package = $_POST['package'];
    $otp = $_POST['otp'];

    // Store OTP in the database
    $result = storeOTP($userId, $package, $otp);

    // Check for errors in storeOTP
    if (!$result) {
        echo 'failure';
        exit(); // Stop script execution
    }

    // Redirect to otp_page.php
    header("Location: otp_page.php");
    exit();
}
