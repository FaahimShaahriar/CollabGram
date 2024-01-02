<?php
session_start();
include_once("../controller/view_userCheck.php");
include_once("../controller/userData.php");
include_once("../models/userModel.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the user is logged in
    if (!isset($_SESSION['user'])) {
        echo "User not logged in.";
        exit; // Stop script execution
    }

    // Get user ID from session
    $userId = $_SESSION['user']['id'];

    // Get form data
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];

    // Include necessary files and perform input validation

    // Assuming you have a function to handle database connections
    include_once("../models/userModel.php");

    // Update user profile in the database using prepared statements
    $conn = getConnection();

    // Construct the prepared statement
    $updateQuery = $conn->prepare("UPDATE reg_info SET name=?, gender=?, email=?, dob=? WHERE id=?");

    // Bind parameters
    $updateQuery->bind_param("ssssi", $name, $gender, $email, $dob, $userId);

    // Execute the query
    if ($updateQuery->execute()) {
        echo "Profile updated successfully.";
    } else {
        echo "Error updating profile: " . $updateQuery->error;
    }

    // Close the statement and connection
    $updateQuery->close();
    $conn->close();
}
?>

<!-- Rest of your HTML code without the outer form tag -->
