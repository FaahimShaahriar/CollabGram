<?php

require('../models/userModel.php');
include_once("../controller/view_userCheck.php");
include_once("../controller/userData.php");
$con = getConnection();

// Function to send a message
function sendMessage($senderId, $receiverId, $message) {
    global $con;
    $sql = "INSERT INTO messages (sender_id, receiver_id, message) VALUES ('$senderId', '$receiverId', '$message')";
    mysqli_query($con, $sql);
}

// Function to get messages for a user
function getMessages($receiverId) {
    global $con;
    $sql = "SELECT * FROM messages WHERE receiver_id = '$receiverId'";
    $result = mysqli_query($con, $sql);
    return $result;
}

// Handle sending a message
if (isset($_POST['send_message'])) {
    $senderId = $_SESSION['user']['id'];
    $receiverId = $_POST['receiver_id'];
    $message = $_POST['message'];

    sendMessage($senderId, $receiverId, $message);
}

// Fetch user information from the reg_info table
$allUserNames = getAllUserNames();

// Fetch messages for the current user
$receiverId = isset($_SESSION['user']['id']) ? $_SESSION['user']['id'] : 0;
$messages = getMessages($receiverId);
?>


<html>

<head>
    <title>change password</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap')"rel="stylesheet">
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
        <!-- header ends  -->

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
                    <li> <a href="iprofile.php">Profile</a></li>
                    <li> <a href="collaborations.php">Collaborations</a></li> 
					<li> <a href="searchUser.php">Search</a></li> 
                    <li> <a href="receive_notification.php">Notification</a></li>
                    <li> <a href="ongoing_campaign.php">Ongoing Campaign</a></li>
                    <li> <a href="feedback_form.php">Feedback</a></li>
                    <li> <a href="reviews.php">Reviews</a></li>
                    <li> <a href="message.php">Message</a></li>
                    <li> <a href="membership.php">Membership</a></li>
                    <li> <a href="help_support.php">Help & Support</a></li>
                    <li> <a href="view_support_requests.php">View Support Requests</a></li>
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
                            <h1>Chat Users</h1>

<?php
// Display users and chat buttons
foreach ($allUserNames as $userName) {
    echo '<div>';
    echo '<p>' . $userName . '</p>';
    echo '<button onclick="openChat(\'' . $userName . '\')">Chat</button>';
    echo '</div>';
}
?>

<!-- Your chat interface or tab implementation -->
<div id="chatContainer">
    <!-- Your chat content goes here -->
    <h2>Chat with <span id="selectedUser"></span></h2>
    <div id="chatContent">
        <?php
        // Display messages
        while ($row = mysqli_fetch_assoc($messages)) {
            echo '<p>' . $row['message'] . '</p>';
        }
        ?>
    </div>
    <form method="post">
        <input type="hidden" id="receiver_id" name="receiver_id">
        <textarea name="message" placeholder="Type your message"></textarea>
        <button type="submit" name="send_message">Send</button>
    </form>
</div>
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

        <script>
        // JavaScript function to open chat tab
        function openChat(userId) {
            // You can implement your logic to open a chat tab
            // For example, show the chat container and load the chat content for the selected user
            document.getElementById('chatContainer').style.display = 'block';
            document.getElementById('selectedUser').innerText = userId;
            document.getElementById('receiver_id').value = userId; // Set receiver ID based on user ID
        }

        // Function to check for new messages
        function checkForNewMessages() {
            // Get the selected user ID from the hidden input field
            var receiverId = $('#receiver_id').val();
            var senderId = <?php echo $_SESSION['user']['id']; ?>;

            // Perform an AJAX request to fetch new messages
            $.ajax({
                type: 'POST',
                url: 'fetch_messages.php', // Create a new PHP file to handle this request
                data: { sender_id: senderId, receiver_id: receiverId },
                success: function (response) {
                    // Update the chat content with the new messages
                    $('#chatContent').html(response);
                }
            });
        }

        // Set up an interval to periodically check for new messages
        setInterval(checkForNewMessages, 2000);
    </script>
</body>


</html>