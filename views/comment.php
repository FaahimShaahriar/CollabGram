<?php

require('../models/userModel.php');
include_once("../controller/view_userCheck.php");
include_once("../controller/userData.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $statusId = $_POST['id'];
    $userId = $user['id']; 

   
    $commentText = trim($_POST['commentText']);
    if (empty($commentText)) {
        
        $response = ['error' => 'Comment text cannot be empty'];
    } else {

        $conn = getConnection();
        $insertQuery = "INSERT INTO comments (status_id, user_id, comment_text) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($insertQuery);
        $stmt->bind_param('iis', $statusId, $userId, $commentText);

        if ($stmt->execute()) {

            $response = ['success' => true];
        } else {
            $response = ['error' => 'Error inserting comment: ' . $stmt->error];
        }
        
        $stmt->close();
        $conn->close();
    }

        header('Content-Type: application/json');
        echo json_encode($response);
} else {
    http_response_code(405); 
    echo json_encode(['error' => 'Method not allowed']);
}
?>
