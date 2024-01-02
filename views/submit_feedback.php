<?php
// Handle database connection// ...
require_once('../models/db.php');
if (isset($_POST['submit'])) {
    $userName = $_POST['user_name'];
    $feedback = $_POST['feedback'];

    // Save feedback to the database
    saveFeedback($userName, $feedback);

    // Redirect to a thank you page or the homepage
    header("Location: thank_you.php");
    exit();
}

function saveFeedback($userName, $feedback) {
    // Implement database insertion logic here
    $con= getConnection();

    // Escape variables to prevent SQL injection
    $userName = mysqli_real_escape_string($con, $userName);
    $feedback = mysqli_real_escape_string($con, $feedback);

    // SQL query to insert feedback into the database
    $sql = "INSERT INTO feedback_entries (user_name, feedback) VALUES ('$userName', '$feedback')";

    // Execute the query
    mysqli_query($con, $sql);
}
?>
