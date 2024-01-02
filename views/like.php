<?php
// like.php
require('../models/userModel.php');
include_once("../controller/view_userCheck.php");
include_once("../controller/userData.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if 'id' key exists
    if (isset($_POST['id'])) {
        $statusId = $_POST['id'];
        $conn = getConnection();

        // Update the likes_count in the database
        $updateQuery = "UPDATE statuses SET likes_count = likes_count + 1 WHERE id = $status_id";
        $stmt = $conn->prepare($updateQuery);
        $stmt->bind_param('i', $statusId);

        if ($stmt->execute()) {
            // Update successful
            $response = ['success' => true];
        } else {
            // Update failed
            $response = ['error' => 'Error updating likes_count: ' . $stmt->error];
        }

        $stmt->close();
        $conn->close();

        // Send JSON response
        header('Content-Type: application/json');
        echo json_encode($response);
    } else {
        // 'id' key is not set
        http_response_code(400); // Bad Request
        echo json_encode(['error' => 'id is not set']);
    }
} else {
    http_response_code(405); // Method Not Allowed
    echo json_encode(['error' => 'Method not allowed']);
}

?>
