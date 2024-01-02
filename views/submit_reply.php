<?php
// Include necessary files and start the session
require_once('../models/db.php');
require_once('../models/userModel.php');
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user']['id'])) {
    // Redirect to the login page if the user is not logged in
    header("Location: login.php");
    exit();
}

// Get user ID and reply details from the form
$userId = $_POST['user_id'];
$supportRequestId = $_POST['support_request_id'];
$reply = $_POST['reply'];

// Submit the reply to the database
submitReply($userId, $supportRequestId, $reply);

// Redirect back to the view support requests page
header("Location: view_support_requests.php");
exit();
?>
