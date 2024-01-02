<?php
include_once("../controller/view_userCheck.php");
include_once("../controller/userData.php");
include_once("../controller/eventCheck.php")
?>

<html>
<head>  
    <title>change password</title>
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
                <td rowspan="3" width="250">  
                <nav> 
                <ul>										                  
                <li> <a href="adminprofile.php">Profile</a></li>
                    <li> <a href="topbrands.php">Top Brands</a></li>
                    <li> <a href="collaborations.php">Collaborations</a></li> 
					<li> <a href="searchUser.php">Search</a></li> 
                    <li> <a href="ongoing_campaign.php">Ongoing Campaign</a></li>
                    <li> <a href="user_management.php">User Management</a></li>					  					
                    <li> <a href="../controller/logout.php">Logout</a></li>
                </ul>
                </nav>
                </td>
                <td> 
                    <div class="add-book">
                <form action="" method="POST" enctype="">
                <main>                   
				<fieldset>
                     <legend class="book-tag">Event Management</legend> 
                     <table  class="table-book"height="120"> 
                        <tr>
                            <td class="td-book">Event Name</td>
                            <td class="td-book"><input type="text" name="Event_Name" value="" > <br></td>
                        </tr>
                        <tr>
                            <td class="td-book">Event Sponsers</td>
                            <td class="td-book"><input type="text" name="Event_Sponsers" value="" ><br></td>
                        </tr>
                        <tr>
                            <td class="td-book">Event Desc</td>
                            <td class="td-book"><input type="text" name="Event_Desc" value="" > <br></td>
                        </tr>
                        <tr>
                            <td class="td-book">Event Start Date</td>
                            <td class="td-book"><input type="date" name="Event_sd" value="" > <br></td>
                        </tr>
                        <tr>
                            <td class="td-book">Event End Date</td>
                            <td class="td-book"><input type="date" name="Event_end" value="" > <br></td>
                        </tr>
                        <tr>
                            <td class="td-book">Event location</td>
                            <td class="td-book"><input type="text" name="Event_location" value="" > <br></td>
                        </tr>                             
                     </table><hr>
                        <input type="submit" name="submit" value="submit">                   
                </fieldset>
                <main>
                </from>
</div>
                </td>

            </tr>
        </table>
         </main>

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