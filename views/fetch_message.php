<?php

include_once("../controller/view_userCheck.php");
include_once("../controller/userData.php");
include_once("../models/userModel.php");


$con = getConnection();

function getMessages($senderId, $receiverId) {
    global $con;
    $sql = "SELECT * FROM messages WHERE (sender_id = '$senderId' AND receiver_id = '$receiverId') OR (sender_id = '$receiverId' AND receiver_id = '$senderId')";
    $result = mysqli_query($con, $sql);
    return $result;
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    session_start();
    $senderId = isset($_POST['sender_id']) ? $_POST['sender_id'] : 0;
    $receiverId = isset($_POST['receiver_id']) ? $_POST['receiver_id'] : 0;

    $messages = getMessages($senderId, $receiverId);

    while ($row = mysqli_fetch_assoc($messages)) {
        echo '<p>' . $row['message'] . '</p>';
    }
} else {

    echo json_encode(array('status' => 'error', 'message' => 'Invalid request method.'));
}
?>
