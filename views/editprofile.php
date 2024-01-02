<?php

session_start();


if (!isset($_SESSION['user']['id'])) {

    header("Location: login.php");
    exit();
}

require('../models/userModel.php');
include_once("../controller/userData.php");
$updateSuccess = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $name = $_POST['name'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];

    $conn = getConnection();
    $user_id = $_SESSION['user']['id'];
    $update_query = "UPDATE reg_info SET name='$name', password='$password', email='$email', dob='$dob' WHERE id='$user_id'";

    $result = mysqli_query($conn, $update_query);

    if ($result) {
        echo "User information updated successfully!";
    } else {
        echo "Error updating user information: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>


<html>
<head>  
    <title>edit profile</title>
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
        integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
        crossorigin="anonymous" />
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
                    <div class="add-book">                    
				    
                         <main>
                            <fieldset>

                            <legend> PROFILE </legend>
                                        <table height="30" width="500">
                                        <h2>Edit Profile</h2>
                                        <form method="post" action="">
        <!-- Add your form fields here -->
        <!-- Example: -->
        Name: <input type="text" name="name" required><br>
        Password: <input type="password" name="password" required><br>
        Email: <input type="email" name="email" required><br>
        Date of Birth: <input type="date" name="dob" required><br>

        <input type="submit" value="Update">
    </form>
                            </table><hr>                   
                       
                         </fieldset>
                         </main>
                         </form>
                         </div>                               
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
        // JavaScript function to show pop-up message
        function showPopupMessage(message) {
            alert(message);
        }

        // Check if the update was successful and show pop-up message
        <?php
        if ($updateSuccess) {
            echo "showPopupMessage('User information updated successfully!');";
        }
        ?>
    </script>
    </body>
</html>
