<?php
include_once("../models/userModel.php");
$user = $_SESSION['user'];
$con=getConnection();

function storeOTP($userId, $package, $otp) {
    global $con;  // Assuming $con is your database connection

    // Escape variables to prevent SQL injection
    $userId = mysqli_real_escape_string($con, $userId);
    $package = mysqli_real_escape_string($con, $package);
    $otp = mysqli_real_escape_string($con, $otp);

    // SQL query to insert OTP into the membership table
    $sql = "INSERT INTO membership (user_id, package, otp) VALUES ('$userId', '$package', '$otp')";

    // Execute the query
    $result = mysqli_query($con, $sql);

    return $result;
}
function storeEnteredOTP($userId, $package, $enteredOTP) {
    global $con;  // Assuming $con is your database connection

    // Escape variables to prevent SQL injection
    $userId = mysqli_real_escape_string($con, $userId);
    $package = mysqli_real_escape_string($con, $package);
    $enteredOTP = mysqli_real_escape_string($con, $enteredOTP);

    // SQL query to update entered_otp in the membership table
    $sql = "UPDATE membership SET entered_otp = '$enteredOTP' WHERE user_id = '$userId' AND package = '$package'";

    // Execute the query
    $result = mysqli_query($con, $sql);

    return $result;
}


// Function to verify OTP from the database
function verifyOTP($userId, $package, $enteredOTP) {
    global $con;

    // Escape variables to prevent SQL injection
    $userId = mysqli_real_escape_string($con, $userId);
    $package = mysqli_real_escape_string($con, $package);
    $enteredOTP = mysqli_real_escape_string($con, $enteredOTP);

    // SQL query to check if the entered OTP is valid
    $sql = "SELECT * FROM membership WHERE user_id = '$userId' AND package = '$package' AND otp = '$enteredOTP'";

    // Execute the query
    $result = mysqli_query($con, $sql);

    // Check if a row is returned (OTP is valid)
    return (mysqli_num_rows($result) > 0);
}

// Function to update user's membership status
function updateMembershipStatus($userId, $package) {
    global $con;

    // Escape variables to prevent SQL injection
    $userId = mysqli_real_escape_string($con, $userId);
    $package = mysqli_real_escape_string($con, $package);

    // SQL query to update the membership status to 'Active'
    $sql = "UPDATE membership SET status = 'Active' WHERE user_id = '$userId' AND package = '$package'";

    // Execute the query
    $result = mysqli_query($con, $sql);

    return $result;
}

?>