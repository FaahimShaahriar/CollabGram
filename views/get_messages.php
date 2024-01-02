<?php
include_once '../models/userModel.php'; 
$senderId = $_GET['sender_id']; 
$receiverId = $_GET['receiver_id'];

$conn = getConnection();


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT * FROM messages WHERE (sender_id = ? AND receiver_id = ?) OR (sender_id = ? AND receiver_id = ?) ORDER BY timestamp";

$stmt = mysqli_prepare($conn, $query);
if (!$stmt) {
    die('Error in statement preparation: ' . mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "iiii", $senderId, $receiverId, $receiverId, $senderId);
if (mysqli_stmt_error($stmt)) {
    die('Error in binding parameters: ' . mysqli_stmt_error($stmt));
}

mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);

$messages = mysqli_fetch_all($result, MYSQLI_ASSOC);


foreach ($messages as $message) {
    echo '<p><strong>' . $message['sender_id'] . ':</strong> ' . $message['message'] . '</p>';
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
