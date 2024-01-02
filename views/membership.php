<?php
// collaborations.php
require('../models/userModel.php');
include_once("../controller/view_userCheck.php");
include_once("../controller/userData.php"); // Your database and Stripe configuration
$con=getConnection();
// Handle Buy button click
if (isset($_POST['buy'])) {
    // Generate random 6-digit OTP
    $userId = $_SESSION['user']['id'];
    $package = $_POST['buy']; 
$otp = mt_rand(100000, 999999);

echo "User ID: $userId, Package: $package, OTP: $otp";

    $insertQuery = "INSERT INTO membership (user_id, package, otp) VALUES ('$userId', '$package', '$otp')";
    $result = mysqli_query($con, $insertQuery);
    if (!$result) {
        die('Error: ' . mysqli_error($con));
    }
    // Execute the query (use MySQLi or PDO with prepared statements)

    // Redirect to OTP page
    header("Location: otp_page.php?otp=$otp");
    exit();
}
?>


<html>

<head>
    <title>change password</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap')"rel="stylesheet">
    <link rel="stylesheet" href="style3.css">
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
                            <h2>Membership Packages</h2>
    <form method="post">
    <label>3 Months </label>
    <h1>500 BDT </h1>
    <button type="submit" name="buy" value="3_months">Buy</button>

    <label>6 Months</label>
    <h1>800 BDT </h1>
    <button type="submit" name="buy" value="6_months">Buy</button>

    <label>12 Months</label>
    <h1>1200 BDT </h1>
    <button type="submit" name="buy" value="12_months">Buy</button>
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

        <script src="../Assests/event.js"></script>
</body>


</html>