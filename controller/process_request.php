<?php
// process_request.php
// Include necessary files and start the session
session_start();

// Assuming you have a function like updateCollaborationStatus in your userModel.php
require('../models/userModel.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['accept']) && $_POST['accept'] === 'accept' && isset($_POST['collaboration_id'])) {
        // Get collaboration ID from the form submission
        $collaboration_id = $_POST['collaboration_id'];

        // Assuming 'collaborated' is the new status for accepted collaborations
        $updateResult = updateCollaborationStatus($collaboration_id, 'collaborated');

        if ($updateResult) {
            // Redirect back to the requested_campaign.php page (or any other page)
            header('Location: ../views/requested_campaign.php');
            exit();
        } else {
            // Log an error
            error_log("Failed to update collaboration status. Collaboration ID: $collaboration_id");
        }
    } elseif (isset($_POST['reject']) && $_POST['reject'] === 'reject' && isset($_POST['collaboration_id'])) {
        // Get collaboration ID from the form submission
        $collaboration_id = $_POST['collaboration_id'];

        // Assuming 'rejected' is the status for rejected collaborations
        $updateResult = updateCollaborationStatus($collaboration_id, 'rejected');

        if ($updateResult) {
            // Redirect back to the requested_campaign.php page (or any other page)
            header('Location: ../views/requested_campaign.php');
            exit();
        } else {
            // Log an error
            error_log("Failed to update collaboration status. Collaboration ID: $collaboration_id");
        }
    }
}

// Handle other actions or return an error response if needed
echo json_encode(['error' => 'Invalid action or missing parameters']);
exit();
?>
