<?php
include_once("../controller/registrationCheck.php");
?>

<html>
    <head>
        <title>Registration</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
        integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA=="
        crossorigin="anonymous" />
        <link href="https://fonts.googleapis.com/css2?family=Handlee&family=Montserrat&family=Roboto&display=swap"
        rel="stylesheet">
        <link rel="stylesheet" href="style2.css">
        
    <script>
        function validateForm() {
            var id = document.forms["registrationForm"]["id"].value.trim();
            var password = document.forms["registrationForm"]["password"].value.trim();
            var confirmPassword = document.forms["registrationForm"]["confirmPassword"].value.trim();
            var name = document.forms["registrationForm"]["name"].value.trim();
            var email = document.forms["registrationForm"]["email"].value.trim();
            var gender = document.forms["registrationForm"]["gender"].value;
            var dob = document.forms["registrationForm"]["dob"].value;
            var userType = document.forms["registrationForm"]["type"].value;

            if (id === "" || password === "" || confirmPassword === "" || name === "" || email === "" || gender === "" || dob === "" || userType === "") {
                alert("Please fill in all the fields");
                return false;
            }

            if (password !== confirmPassword) {
                alert("Password and Confirm Password do not match");
                return false;
            }
        
   
            if (password.length < 9 || !/\d/.test(password) || !/[a-zA-Z]/.test(password)) {
                alert("Password must be at least 6 characters long and contain letters and numbers");
                return false;
            }


            if (!/^\d{4}-\d{2}-\d{2}$/.test(dob)) {
                alert("Invalid date of birth format");
                return false;
            }
       
            return true;
        }
    </script>
    <script>
            function emailValidation() {
            let email = document.getElementById('email').value;
            // alert(email.indexOf('@'));
            if (email.indexOf('@') < 1 || email.lastIndexOf('.') < email.indexOf('@') + 2 || email.lastIndexOf('.') + 2 >= email.length) {
                document.getElementById('emailAlert').innerHTML = 'Email format invalid!';
            }else
            {
                document.getElementById('emailAlert').innerHTML = '';
            }
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
                <table height=635 width=1080>                        
                    <tr>
                        <td>
                            <form name="registrationForm" action="../controller/registrationCheck.php" method="POST" enctype="" onsubmit="return validateForm()">
                                    <fieldset>
                                        <legend>
                                            <h3>REGISTRATION</h3>
                                        </legend>
                                        <table>
                                            <tr>
                                                <td>Id</td>
                                                <td><input type="text" name="id" value="<?php echo $id ?>" /><br /></td>
                                            </tr>

                                            <tr>
                                                <td>Password</td>
                                                <td><input type="password" name="password" value="<?php echo $password ?>" /><br /></td>
                                            </tr>
                                            
                                            <tr>
                                                <td>Confirm Password</td>
                                                <td><input type="password" name="confirmPassword" value="<?php echo $confirmPassword ?>" /><br /></td>
                                            </tr>

                                            <tr>
                                                <td>Name</td>
                                                <td><input type="text" name="name" value="<?php echo $name ?>" /><br /></td>
                                            </tr>

                                            <tr>
                                                <td>Email</td>
                                                <td><input onkeyup="emailValidation()" id="email" type="email" name="email" value="<?php echo $email ?>" /><br /></td>
                                            </tr>
                                        </table>    
                                        <fieldset>
                                                <Legend>Gender</Legend>

                                                <input type="radio" name="gender" value="Male" /> Male
                                                <input type="radio" name="gender" value="Female" /> Female
                                                <input type="radio" name="gender" value="Other" /> Other <br>
                                        </fieldset><br>

                                        <fieldset>
                                        <Legend>Date of Birth</Legend>
                                                <input type="date" name="dob" value=""/> 
                                        </fieldset><br>
                                        
                                        <fieldset>
                                        <Legend>User Type</Legend>

                                        <select id="type" name="type" required>
                                    <option value="Influencer">INFLUENCER</option>
                                    <option value="Admin">ADMIN</option>
                                    <option value="Brand">BRAND</option>

                                    </select>

                                        </fieldset>

                                        <hr class="dotted-hr"> 
                                        <input type="submit" value="Sign Up" name="submit" />
                                    </fieldset>
                            </form>
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
