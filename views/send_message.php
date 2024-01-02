<?php
include_once 'db_connection.php';

// Correct the way of getting sender_id
$senderId = $_GET['sender_id'];
$receiverId = $_GET['receiver_id'];
$message = $_GET['message'];

// Insert the message into the database using prepared statement
$query = "INSERT INTO messages (sender_id, receiver_id, message) VALUES (?, ?, ?)";
$stmt = mysqli_prepare($conn, $query);

// Check for errors in the prepared statement
if (!$stmt) {
    die('Error in statement preparation: ' . mysqli_error($conn));
}

// Bind parameters and check for errors
mysqli_stmt_bind_param($stmt, "iis", $senderId, $receiverId, $message);
if (mysqli_stmt_error($stmt)) {
    die('Error in binding parameters: ' . mysqli_stmt_error($stmt));
}

// Execute the prepared statement and check for errors
mysqli_stmt_execute($stmt);
if (mysqli_stmt_error($stmt)) {
    die('Error in statement execution: ' . mysqli_stmt_error($stmt));
}

// Close the statement and connection
mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
