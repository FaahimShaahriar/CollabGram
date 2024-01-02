<?php
// submit_support.php
// Handle database connection
require_once('../models/db.php');
session_start();
// Start or resume the session
require('../models/userModel.php');

if (isset($_POST['submit'])) {
    // Check if the user is logged in
    if (isset($_SESSION['user']['id'])) {
        $userId = $_SESSION['user']['id'];
        $issue = $_POST['issue'];

        // Save support request to the database
        saveSupportRequest($userId, $issue);

        // Redirect to a thank you page or the homepage
        header("Location: thank_you_support.php");
        exit();
    } else {
        // Redirect to the login page if the user is not logged in
        header("Location: login.php");
        exit();
    }
}

function saveSupportRequest($userId, $issue) {
    // Implement database insertion logic here
    $con = getConnection();

    // Escape variables to prevent SQL injection
    $userId = mysqli_real_escape_string($con, $userId);
    $issue = mysqli_real_escape_string($con, $issue);

    // SQL query to insert support request into the database
    $sql = "INSERT INTO support_requests (user_id, issue) VALUES ('$userId', '$issue')";

    // Execute the query
    mysqli_query($con, $sql);
}
?>
