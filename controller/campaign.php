<?php
// campaign.php

// Include necessary files and start the session
session_start();

// Assuming you have a function like createCollaboration in your userModel.php
require('../models/userModel.php');

if (isset($_POST['apply']) && $_POST['apply'] === 'apply' && isset($_POST['event_id'])) {
    // Get user ID from session
    $userid = $_SESSION['user']['id'];

    // Get event ID from the form submission
    $event_id = $_POST['event_id'];

    // Set the collaboration status to an initial value (e.g., 'pending')
    $status = 'pending';
   // echo $userid2;
    // Perform the database query to insert collaboration data
    createCollaboration($userid, $event_id, $status);

    // Send a response back to the client (optional)
    echo json_encode(['success' => true]);
    exit();
}

// Handle other actions or return an error response if needed
echo json_encode(['error' => 'Invalid action or missing parameters']);
exit();
