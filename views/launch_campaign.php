<?php
// requested_campaign.php

// Include necessary files and start the session

// Assuming you have a function like getCollaborationRequests in your userModel.php
require('../models/userModel.php');
include_once("../controller/view_userCheck.php");
include_once("../controller/userData.php");

// Get user ID from session
$userid = $_SESSION['user']['id'];

// Assuming you have a function like getCollaborationRequests in your userModel.php
$collaborationRequests = getCollaborationRequests($userid);

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
                        <td rowspan="3" width="250">
                            <nav>
                                <ul>
                                    <li> <a href="bprofile.php">Profile</a></li>
                                    <li> <a href="launch_campaign.php">Launch Campaign</a></li>
                                    <li> <a href="collaborations.php">Collaborations</a></li>
                                    <li> <a href="search.php">Search</a></li>
                                    <li> <a href="ongoing_campaign.php">Ongoing Campaign</a></li>
                                    <li> <a href="account_setting.php">Account Settings</a></li>
                                    <li> <a href="../controller/logout.php">Logout</a></li>
                                </ul>
                            </nav>
                        </td>
                        <td>
                        <main>
                            <fieldset>
                                <table height="30" width="500">
                                    <h2>
                                        <form align="center">
                                            Campaign Name:<input type="text" name="name" id="name" />
                                            <br />
                                            Campaign Sponsers: <input type="text" name="phone" id="phone" />
                                            <br />
                                            Campaign Desc:<input type="text" name="evntdesc" id="evntdesc"> <br>
                                            Campaign Start Date: <input type="date" name="esd" id="esd"> <br>
                                            Campaign End Date: <input type="date" name="eed" id="eed"> <br>
                                            Campaign location: <input type="text" name="el" id="el"> <br>

                                            <input type="button" name="submit" id="submit" value="submit" onclick="validate()" /><br />

                                            <p id="error" style="color: red"></p>
                                        </form>
                                    </h2>
                                </table>
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