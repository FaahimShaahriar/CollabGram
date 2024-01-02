<?php
session_start();
require('../models/userModel.php');
include_once("../controller/view_userCheck.php");
include_once("../controller/userData.php"); 

if (isset($_SESSION['user']['id'])) {
    $userId = $_SESSION['user']['id'];
    $statusText = $_POST['status_text'];

    // Check if an image is uploaded
    $imagePath = '';
    if ($_FILES['image']['error'] == 0) {
        $imagePath = uploadImage();
    }

    // Save status to the database
    saveStatusToDatabase($userId, $statusText, $imagePath);

    // Redirect to the post_status.php or another page
    header("Location: explore.php");
    exit();
} else {
    // Redirect to the login page if the user is not logged in
    header("Location: login.php");
    exit();
}

function uploadImage() {
    // Define the target directory for uploads
    $targetDir = "upload/";
    $targetFile = $targetDir . basename($_FILES["image_path"]["name"]);

    // Check if the file already exists
    if (file_exists($targetFile)) {
        // You can handle this case as needed
        return '';
    }

    // Check file size (adjust as needed)
    if ($_FILES["image"]["size"] > 5242880) {  // 5 MB limit
        // You can handle this case as needed
        return '';
    }

    // Move the uploaded file to the target directory
    if (move_uploaded_file($_FILES["image_path"]["tmp_name"], $targetFile)) {
        return $targetFile;
    } else {
        echo "Error moving file: " . $_FILES["image_path"]["error"];
        return '';
    }
}


// post.php
function saveStatusToDatabase($userId, $statusText, $imagePath) {
    // Implement database insertion logic
    // Connect to your database (use your own database connection code)
    $con = getConnection();

    // Check for a valid database connection
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Escape variables to prevent SQL injection
    $userId = mysqli_real_escape_string($con, $userId);
    $statusText = mysqli_real_escape_string($con, $statusText);
    $imagePath = mysqli_real_escape_string($con, $imagePath);

    // SQL query to insert status into the database
    $sql = "INSERT INTO statuses (user_id, status_text, image_path) VALUES ('$userId', '$statusText', '$imagePath')";

    // Execute the query
    mysqli_query($con, $sql);

    // Check for errors during insertion
    if (mysqli_error($con)) {
        echo "Error: " . mysqli_error($con);
    }

    // Close the database connection
    mysqli_close($con);
}

?>
