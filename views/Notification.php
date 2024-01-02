<?php
session_start();
include_once("../models/userModel.php");
include_once("../controller/userData.php");
// Check if the user is logged in
if (!isset($_SESSION['user']['id'])) {
    // Redirect to login page or handle the situation where the user is not logged in
    header("Location: login.php");
    exit();
}

// Include your database connection code


// Fetch the list of users from reg_info
$conn = getConnection();
$select_users_query = "SELECT id, name FROM reg_info";
$result_users = mysqli_query($conn, $select_users_query);
$users = mysqli_fetch_all($result_users, MYSQLI_ASSOC);

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $recipient_user_id = $_POST['recipient_user_id'];
    $message = $_POST['message'];

    // Get the sender user ID from the session
    // Get the sender user ID from the session
$sender_user_id = $_SESSION['user']['id'];

// Debugging statement
echo "Sender User ID: $sender_user_id";

// Insert the notification into the database with correct sender_id
$insert_query = "INSERT INTO notifications (user_id, sender_id, message) VALUES ('$recipient_user_id', '$sender_user_id', '$message')";

    $result = mysqli_query($conn, $insert_query);

    if ($result) {
        $notificationSuccess = true;
    } else {
        echo "Error sending notification: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
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
                            <h2>Send Notification</h2>
            <?php
            // Display a success message if the notification was sent successfully
            if (isset($notificationSuccess) && $notificationSuccess) {
                echo '<p class="success-message">Notification sent successfully!</p>';
            }
            ?>
            <form method="post" action="">
                <label for="recipient_user_id">Select Recipient User:</label>
                <select name="recipient_user_id" id="recipient_user_id" required>
                    <?php
                    foreach ($users as $user) {
                        echo "<option value=\"{$user['id']}\">{$user['name']}</option>";
                    }
                    ?>
                </select>
                <br>
                <label for="message">Message:</label>
                <textarea name="message" id="message" rows="4" required></textarea>
                <br>
                <input type="submit" value="Send Notification">
            </form>
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

