<?php
include_once("../controller/view_userCheck.php");
include_once("../controller/userData.php");
include_once("../models/db.php");

// Establish a database connection
$conn = getConnection();

// Check if the connection is successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT * FROM reg_info WHERE type = 'Brand'";
$result = mysqli_query($conn, $query);

// Check if the query was successful
if (!$result) {
    die("Error in SQL query: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Top Influencers</title>
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
                            <div class="brand-container">
                                <?php while ($brandUser = mysqli_fetch_assoc($result)) { ?>
                                    <div class="influencer-card">
                                        <img src="../Assests/profilepicture.png" alt="Profile Picture">
                                        <h3>ID: <?php echo $brandUser['id'] ?></h3>
                                        <p><strong>Name:</strong> <?php echo $brandUser['name'] ?></p>
                                        <p><strong>Gender:</strong> <?php echo $brandUser['gender'] ?></p>
                                        <p><strong>Email:</strong> <?php echo $brandUser['email'] ?></p>
                                        <p><strong>DOB:</strong> <?php echo $brandUser['dob'] ?></p>
                                    </div>
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
    </body>
</html>
