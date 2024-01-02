<?php
session_start();
require('../models/userModel.php');

include_once("../controller/userData.php");

// Check if the user is logged in
if (!isset($_SESSION['user']['id'])) {
    // Redirect to login page or handle the situation where the user is not logged in
    header("Location: login.php");
    exit();
}

// Include your database connection code
include_once("../models/userModel.php");

// Function to fetch received notifications for a specific user
function getReceivedNotifications($user_id) {
    $conn = getConnection();

    $select_query = "SELECT * FROM notifications WHERE user_id='$user_id' ORDER BY id DESC";
    $result = mysqli_query($conn, $select_query);

    $receivedNotifications = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $receivedNotifications[] = $row;
    }

    // Close the database connection
    mysqli_close($conn);

    return $receivedNotifications;
}

// Get the user ID from the session
$user_id = $_SESSION['user']['id'];

// Fetch received notifications for the logged-in user
$receivedNotifications = getReceivedNotifications($user_id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Notification</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <div class="container">
        <!-- header starts  -->
        <header>
            <div class="header-content">
                <div class="logo-div">
                    <img class="nav-image" src="../Assests/logo.jpg">
                </div>
                <div class="heading-style">
                    <p>CollabGram</p>
                </div>
                <div class="nav-container">
                    <nav>
                        <ul>
                            <li><a href="home.php">Home</a></li>
                            <li><a href="LegalAgreement.php">Login</a></li>
                            <li><a href="registration.php">Registration</a></li>
                            <li><a href="faq.php">Faq</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </header>

        <center>
        
        <table height=635 width=1080>
            
        <tr height=70>
                <td colspan="4"> 
                    <table width = "400">
                   
                    <tr>
                        <td style="visibility:hidden;">
                            hdhdhd
                        </td>
                        
                        <td align="center">
                            <div class="card">
                        <h2>Logged in as || <?php echo $user['name'] ?></h2>
                            </div>  
                        </td> 
                        
                          
                    </tr>  
                   
                    </table>
                </td>
            </tr>
            
            <tr>
                <td rowspan="3" width="20"> 
                 
                <div class='hudai' style="min-height:600px;flex:5;color:blue;"> 
                <ul>
                <ul>                   										                  
                    <li> <a href="collaborations.php">Collaborations</a></li> 
					<li> <a href="searchUser.php">Search</a></li> 
                    <li> <a href="receive_notification.php">Notification</a></li>
                    <li> <a href="ongoing_campaign.php">Ongoing Campaign</a></li>
                    <li> <a href="feedback_form.php">Feedback</a></li>
                    <li> <a href="reviews.php">Reviews</a></li>
                    <li> <a href="message.php">Message</a></li>
                    <li> <a href="membership.php">Membership</a></li>
                    <li> <a href="help_support.php">Help & Support</a></li>
                    <li> <a href="account_setting.php">Account Settings</a></li>					  										  					
                    <li> <a href="../controller/logout.php">Logout</a></li>
                </ul>
                </ul>
                </div>
                </div>
                </td>
                        <td>
                        <main>
                            <fieldset>
                                <table height="30" width="500">
                                <h2>Received Notifications</h2>
            <?php
            if (empty($receivedNotifications)) {
                echo "<p>No notifications found.</p>";
            } else {
            ?>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Message</th>
                    </tr>
                    <?php
                    foreach ($receivedNotifications as $notification) {
                        echo "<tr>";
                        echo "<td>{$notification['id']}</td>";
                        echo "<td>{$notification['message']}</td>";
                        echo "</tr>";
                    }
                    ?>
                </table>
            <?php
            }
            ?>
                            </fieldset>
                            </main>
                        </td>
                    </tr>
                </table>
            
            <footer>
                <div class="row">
                    <div class="col-lg-12">
                        <p>Copyright © by Shahriar Hannan 2023</p>
                    </div>
                </div>
            </footer>
        </center>
</body>
</html>
