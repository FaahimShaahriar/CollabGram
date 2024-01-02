<?php
include_once("../controller/view_userCheck.php");
include_once("../controller/userData.php");
require_once('../models/userModel.php');
$Eventpro = getEvent();
?>

<html>

<head>
    <title>On Going Campaign</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap')"rel="stylesheet">
    <link rel="stylesheet" href="style2.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

</head>

<body>
    <div class="container">
        <!-- header starts -->
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
        <!-- header ends -->

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
                    <li> <a href="account_setting.php">Account Settings</a></li>					  										  					
                    <li> <a href="../controller/logout.php">Logout</a></li>
                </ul>
                </ul>
                </div>
                </div>
                </td>
                        <td>
                        <main>
                        <div class="campaign-container">
                            <?php for ($i = 0; $i < count($Eventpro); $i++) { ?>
                                <form action="../controller/campaign.php" method="POST">
                                    <input type="hidden" name="apply" value="apply">
                                    <input type="hidden" name="event_id" value="<?= $Eventpro[$i]['event_id'] ?>">
                                    <?php echo $Eventpro[$i]['event_id']; ?>
                                    <div class="campaign-card" data-event-id="<?= $Eventpro[$i]['event_id'] ?>">
                                        <h3><?= $Eventpro[$i]['Event_Name'] ?></h3>
                                        <p><strong>Location:</strong> <?= $Eventpro[$i]['Event_location'] ?></p>
                                        <p><strong>Description:</strong> <?= $Eventpro[$i]['Event_Desc'] ?></p>
                                        <p><strong>Start Date:</strong> <?= $Eventpro[$i]['Event_sd'] ?></p>
                                        <p><strong>End Date:</strong> <?= $Eventpro[$i]['Event_end'] ?></p>
                                        <div class="button-container">
                                            <button class="apply-button">Apply</button>
                                        </div>
                                    </div>
                                </form>
                            <?php } ?>
                        </div>
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
</div>
<script>
document.addEventListener('DOMContentLoaded', function () {
    // Assuming there is an element with id "applyButton" representing the Apply button
    var applyButton = document.getElementById('applyButton');

    // Add a click event listener to the Apply button
    applyButton.addEventListener('click', function () {
        // Assuming there is an element with id "eventID" representing the Event ID
        var event_id = document.getElementById('event_id').value;

        // Check if the event ID is not empty
        if (event_id.trim() !== '') {
            // Perform the AJAX request
            var xhr = new XMLHttpRequest();
            xhr.open('POST', '../controller/campaign.php?action=apply', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4) {
                    if (xhr.status === 200) {
                        // Parse the JSON response
                        var response = JSON.parse(xhr.responseText);

                        // Check if the response indicates success
                        if (response.success) {
                            console.log('Collaboration applied successfully');
                            // You can perform additional actions here if needed
                        } else {
                            console.error('Error applying collaboration:', response.error);
                        }
                    } else {
                        console.error('Error applying collaboration. HTTP status:', xhr.status);
                    }
                }
            };

            // Send the request with the event ID as POST data
            xhr.send('event_id=' + encodeURIComponent(event_id));
        } else {
            console.error('Event ID is empty');
        }
    });
});

</script>

</body>

</html>