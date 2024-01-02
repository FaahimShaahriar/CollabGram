<?php
include_once("../controller/loginCheck.php");

session_start();
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user input from the form
    $userid = $_POST["id"];
   
    // Store the user input in a session variable
    $_SESSION["id"] = $userid;
   
    // Redirect to a page to display the result
 
    exit;
}
?>



<html>

<head>
    <title>Login</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
        integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
        crossorigin="anonymous" />
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap')"rel="stylesheet">
    <link rel="stylesheet" href="style2.css">
    <style>
          /* style inputs and link buttons */
            input,
            .btn {
            width: 40%;
            padding: 12px;
            border: none;
            border-radius: 4px;
            margin: 5px 0;
            opacity: 0.85;
            display: inline-block;
            font-size: 12px;
            line-height: 12px;
            text-decoration: none; /* remove underline from anchors */
            }

            input:hover,
            .btn:hover {
            opacity: 1;
            }

            /* add appropriate colors to fb, twitter and google buttons */
            .fb {
            background-color: #3B5998;
            color: white;
            }

            .twitter {
            background-color: #55ACEE;
            color: white;
            }

            .google {
            background-color: #dd4b39;
            color: white;
            }


            /* style the submit button */
            input[type=submit] {
            background-color: #4caf50;
            color: white;
            font-size: 15px;
            line-height: 15px;
            cursor: pointer;
            }

            input[type=submit]:hover {
            background-color: #45a049;
            }
    </style>

    <script>
        function validateForm() {
            var userId = document.forms["loginForm"]["id"].value.trim();
            var password = document.forms["loginForm"]["password"].value.trim();

            if (userId === "") {
                alert("User Id must be filled out");
                return false;
            }

            if (password === "") {
                alert("Password must be filled out");
                return false;
            }


            return true;
        }
    </script>

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
        <main>
            <div class="card">
		    <table height=600 width=1080>			   					
				<tr>
                <td>
                   <div class="row" style="text-align: center;">
                    <form name="loginForm" action="../controller/loginCheck.php" method="POST" enctype="" onsubmit="return validateForm()">
                        <fieldset>
                            <legend>
                                    <h3>LOGIN</h3>
                                    </legend>
                            <table>
                                <tr>
                                    <td>User Id</td>
                                    <td><input type="text" name="id" value="<?php echo $id ?>" /><br></td>
                                </tr>
                                <tr>
                                    <td>Password</td>
                                    <td><input type="password" name="password" value="<?php echo $password ?>" /><br></td>
                                </tr>
                            </table>
                            <hr class="dotted-hr"> 
                            <input type="submit" value="Login" name="submit">
                        </fieldset>
                    </form> 
                    <div class="row">
                        <div class="colam">
                        <a href="#" class="fb btn">
                        <i class="fa fa-facebook fa-fw"></i> Login with Facebook
                        </a>
                        <a href="#" class="twitter btn">
                        <i class="fa fa-twitter fa-fw"></i> Login with Twitter
                        </a>
                        <a href="https://www.google.com" target="_blank" class="google btn"><i class="fa fa-google fa-fw">
                        </i> Login with Google+
                        </a>
                        </div>    
                     
                   </div>                                     
                </td>                
               </tr>
					
            </table>  

            </div>
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

