<?php
require_once('db.php');

function login($id, $password)
{
    $con = getConnection();
    $sql = "select * from reg_info where id='{$id}' and password='{$password}'";
    $result = mysqli_query($con, $sql);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        $users = [];
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($users, $row);
        }
        $user = $users[0];
        print_r($user[0]);

        session_start();
        $_SESSION['user'] = ['id' => $user['id'], 'name' => $user['name'], 'password' => $user['password'], 'gender' => $user['gender'], 'email' => $user['email'], 'dob' => $user['dob'], 'type' => $user['user_type']];

        $_SESSION['auth'] = "true";
        if ($user['type'] == 'Influencer') {
            header('location: ../views/iprofile.php');
        } else if ($user['type'] == 'Brand') {
            header('location: ../views/bprofile.php');
        } else {
            header('location: ../views/adminprofile.php');
        }
    } else {

        return false;
    }
}


function register($id, $name, $password, $email, $gender, $dob, $type)
{
    $con = getConnection();
    $sql = "select * from reg_info where id='{$id}'";
    $result = mysqli_query($con, $sql);
    $count = mysqli_num_rows($result);
    if ($count == 1) {
        print_r("User already exists");
    } else {
        $sql = "insert into reg_info (id,name,password,email,gender,dob,type) values ('{$id}','{$name}','{$password}','{$email}','{$gender}','{$dob}','{$type}')";
        $result = mysqli_query($con, $sql);


        if ($result) {
            header('location: ../views/login.php');
        } else {

            echo "Error!";
        }
    }
}




function getUser($id)
{
    session_start();
    if (isset($_SESSION['auth']) && $_SESSION['user']) {
        $id = $_SESSION['user']['id'];
    }
    $con = getConnection();
    $sql = "select * from reg_info where id='{$id}'";
    $result = mysqli_query($con, $sql);
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        $users = [];
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($users, $row);
        }
        $user = $users[0];
        print_r($user[0]);

        session_start();
        $_SESSION['user'] = ['id' => $user['id'], 'name' => $user['name'], 'password' => $user['password'], 'type' => $user['user_type']];

        $_SESSION['auth'] = "true";
        if ($user['type'] == 'admin') {
            header('location: ../views/user_home.php');
        } else {
            header('location: ../views/user_home.php');
        }
    } else {

        return false;
    }
}


function getAllUser()
{
    $con = getConnection();
    $sql = "select * from reg_info";
    $result = mysqli_query($con, $sql);
    $users = [];
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($users, $row);
    }

    return $users;
}
function UpdateProfile($updateprofile)
{
    $con = getConnection();
    $sql = "UPDATE reg_info
  SET  name= '{$updateprofile['name']}', 
      email= '{$updateprofile['email']}', 
      password= '{$updateprofile['password']}' 
  WHERE id = '{$updateprofile['id']}'";


    $result = mysqli_query($con, $sql);

    return $result;
}
function event($Event_Name, $Event_Sponsers, $Event_Desc, $Event_sd, $Event_end, $Event_location)
{

    $con = getConnection();


    $sql = "select * from event_info where Event_Name='{$Event_Name}'";
    $result = mysqli_query($con, $sql);
    $count = mysqli_num_rows($result);
    if ($count == 1) {
        print_r("User already exists");
    } else {
        $sql = "insert into event_info (Event_Name,Event_Sponsers,Event_Desc,Event_sd,Event_end,Event_location) values ('{$Event_Name}','{$Event_Sponsers}','{$Event_Desc}','{$Event_sd}','{$Event_end}','{$Event_location}')";
        $result = mysqli_query($con, $sql);


        if ($result) {
            header('location: ../views/ongoing_campaign.php');
        } else {

            echo "Error!";
        }
    }
}

function getEvent()
{
    $con = getConnection();
    $sql = "select * from event_info";
    $result = mysqli_query($con, $sql);
    $users = [];

    while ($row = mysqli_fetch_assoc($result)) {
        //$users = $row;
        array_push($users, $row);
    }
    return $users;
}
function evnt($user)
{

    $con = getConnection();

    $sql = "insert into event_info(Event_Name,Event_Sponsers,Event_Desc,Event_sd,Event_end,Event_location) values ('{$user->name}','{$user->phone}','{$user->evntdesc}','{$user->esd}','{$user->eed}','{$user->el}')";
    $result = mysqli_query($con, $sql);


    if ($result) {
        return ['success' => "true"];
    } else {

        return ['error' => "error"];
    }
}
function getviewbook()
{
    $con = getConnection();
    $sql = "select * from reg_info";
    $result = mysqli_query($con, $sql);
    $users = [];

    while ($row = mysqli_fetch_assoc($result)) {
        //$users = $row;
        array_push($users, $row);
    }
    return $users;
}
function Notify($user)
{

    $con = getConnection();

    $sql = "insert into notify(User_ID,Notification_Data) values ('{$user->name}','{$user->phone}')";
    $result = mysqli_query($con, $sql);


    if ($result) {
        return ['success' => "true"];
    } else {

        return ['error' => "error"];
    }
}
function getNotifications($user_id)
{
    // Connect to the database (replace with your connection code)
    $conn = getConnection();
    // Query to retrieve notifications for a specific user
    $query = "SELECT * FROM notify WHERE User_ID = $user_id ORDER BY time DESC";

    // Perform the query
    $result = mysqli_query($conn, $query);

    // Check if the query was successful
    if (!$result) {
        die("Error in SQL query: " . mysqli_error($conn));
    }

    // Fetch the results into an associative array
    $notifications = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // Close the database connection
    mysqli_close($conn);

    // Return the notifications array
    return $notifications;
}

function createCollaboration($userid, $event_id, $status)
{
    $con = getConnection();

    $query = "INSERT INTO collaboration (user_id, event_id, status) VALUES ('$userid', '$event_id', '$status')";
    $result = mysqli_query($con, $query);

    if (!$result) {
        error_log('Error executing collaboration query: ' . mysqli_error($con));
    }

    mysqli_close($con);
}
function getCollaborationRequests($userId) {
    // Assuming you have a database connection
    $con = getConnection();
    $sql = "select * from collaboration";
    $result = mysqli_query($con, $sql);
    $users = [];

    while ($row = mysqli_fetch_assoc($result)) {
        //$users = $row;
        array_push($users, $row);
    }
    return $users;
}
function updateCollaborationStatus($collaborationId, $newStatus) {
    // Assuming you have a database connection
    $con = getConnection();

    // Check the connection
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Update the collaboration status
    $sql = "UPDATE collaboration SET status = '$newStatus' WHERE collaboration_id = $collaborationId";
    $result = mysqli_query($con, $sql);

    // Check if the update was successful
    if ($result) {
        // Close the database connection
        mysqli_close($con);

        // Return true indicating success
        var_dump("Update successful!");
        return true;
    } else {
        // Log the error instead of echoing directly
        $error = "Error updating record: " . mysqli_error($con);
        var_dump($error);

        // Return false indicating failure
        return false;
    }
}

// userModel.php

function getCollaborationData() {
    // Assuming you have a database connection
    $con = getConnection();

    // Check the connection
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Fetch collaboration data with event and user information using joins
    $sql = "SELECT collaboration.*, event_info.Event_Name, event_info.*, reg_info.name as user_name
            FROM collaboration
            JOIN event_info ON collaboration.event_id = event_info.event_id
            JOIN reg_info ON collaboration.user_id = reg_info.id
            WHERE collaboration.status = 'collaborated'";

    $result = mysqli_query($con, $sql);

    $collaborationsData = [];

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $collaborationsData[] = $row;
        }
    }

    // Close the database connection
    mysqli_close($con);

    return $collaborationsData;
}
function getAllUserNames() {
    $conn = getConnection();

    $sql = "SELECT name FROM reg_info";
    $result = mysqli_query($conn, $sql);

    $userNames = [];

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $userNames[] = $row['name'];
        }
    }

    mysqli_close($conn);

    return $userNames;
}

function getUserDetails($userId) {
    global $con;  // Assuming $con is your database connection

    // Escape variables to prevent SQL injection
    $userId = mysqli_real_escape_string($con, $userId);

    // SQL query to get user details
    $sql = "SELECT * FROM reg_info WHERE id = '$userId'";

    // Execute the query
    $result = mysqli_query($con, $sql);

    // Check if a row is returned
    if ($row = mysqli_fetch_assoc($result)) {
        return $row;
    } else {
        return false;
    }
}

function getFeedbackEntries() {
    $con = getConnection();

    // Query to select all feedback entries from the database
    $sql = "SELECT user_name, feedback FROM feedback_entries";

    // Execute the query
    $result = mysqli_query($con, $sql);

    // Check if the query was successful
    if ($result) {
        // Fetch all rows as an associative array
        $entries = mysqli_fetch_all($result, MYSQLI_ASSOC);

        // Free the result set
        mysqli_free_result($result);

        // Close the database connection
        mysqli_close($con);

        return $entries;
    } else {
        // Handle the error, e.g., log it or return an empty array
        echo "Error: " . mysqli_error($con);
        return array();
    }
}
function getSupportRequests($userId) {
    $con = getConnection();
    $sql = "SELECT * FROM support_requests WHERE user_id = '$userId'";
    $result = mysqli_query($con, $sql);
    $supportRequests = [];

    while ($row = mysqli_fetch_assoc($result)) {
        array_push($supportRequests, $row);
    }

    return $supportRequests;
}

function submitReply($userId, $supportRequestId, $reply) {
    $con = getConnection();
    $userId = mysqli_real_escape_string($con, $userId);
    $supportRequestId = mysqli_real_escape_string($con, $supportRequestId);
    $reply = mysqli_real_escape_string($con, $reply);

    $sql = "UPDATE support_requests SET reply = '$reply' WHERE user_id = '$supportRequestId'";
    mysqli_query($con, $sql);
}

// Example function to retrieve posted statuses
function getPostedStatuses() {
    // Connect to the database
    $con = getConnection();

    // Check for a valid database connection
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // SQL query to retrieve posted statuses
    $sql = "SELECT statuses.*, reg_info.name FROM statuses JOIN reg_info ON statuses.user_id = reg_info.id ORDER BY statuses.created_at DESC";

    // Execute the query
    $result = mysqli_query($con, $sql);

    // Fetch all rows
    $statuses = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // Close the database connection
    mysqli_close($con);

    return $statuses;
}
function sendNotification($user_id, $message) {
    $conn = getConnection();

    $insert_query = "INSERT INTO notifications (user_id, message, timestamp) VALUES ('$user_id', '$message', NOW())";
    $result = mysqli_query($conn, $insert_query);

    return $result;
}

?>