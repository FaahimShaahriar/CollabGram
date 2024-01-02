<?php
  require_once('../models/function.php');
  require_once('../models/db.php');
  $viewuser = getviewuser();
  
?>
<!DOCTYPE html>
<html>
<head>
<script src="../Assests/user.js"></script>
    <title>User Database</title>
     <link rel="stylesheet" href="style15.css">

    <script>
        function validateForm2(){
            var User_ID = document.getElementsByName("Userid")[0].value;
            if (User_ID === "") {
                alert("You have to enter User ID");
                return false;
            }
            return true;
        }
        function validateForm() {
            var User_ID = document.getElementsByName("Userid")[0].value;
            var User_Name = document.getElementsByName("Username")[0].value;
            var User_Email = document.getElementsByName("Useremail")[0].value;
            var Mobile_Number = document.getElementsByName("Mobilenumber")[0].value;
            var Actions = document.getElementsByName("Actions")[0].value;
            
            

          

            // Validate User_Name
            if (User_Name === "") {
                alert("Please enter User Name");
                return false;
            }

            // Validate User_Email
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (User_Email === "" || !emailRegex.test(User_Email)) {
                alert("Please enter a valid email address");
                return false;
            }
           

            // Validate Mobile_Number
            if (Mobile_Number === "" || isNaN(Mobile_Number) || !Number.isInteger(parseFloat(Contact_Number))) {
                alert("Please enter a valid integer for Mobile Number");
                return false;
            }

            // Validate Actions
            if (Actions === "") {
                alert("Please Provide the Action");
                return false;
            }

            return true;
        }
    </script>
</head>
<body>


    
  <table   id="left" border="1"  cellspacing="1" cellpadding="5">
    <tr>
        
        <th colspan="5"><h2><b>User Details</b></h2></th>
  
        
    </tr>
  
     <tr>
        <td>User ID</td>
        <td>User Name</td>
        <td>User Email</td>
        <td>Mobile Number </td>
        <td>Actions</td>

       </tr>
             
    
               <?php for($i=0; $i<count($viewuser); $i++){
        ?>
                    
             <tr>
                    <td><?=$viewuser[$i]['User_ID']?></td>
                    <td><?=$viewuser[$i]['User_Name']?></td>
                    <td><?=$viewuser[$i]['User_Email']?></td>
                    <td><?=$viewuser[$i]['Mobile_Number']?></td>
                    <td><?=$viewuser[$i]['Actions']?></td>
                   
                    </tr> 
                    <?php } ?>
                    <tr>

                    <td colspan="5" align="center"><a href="user_management.php">Go Back</a></td>
                    </tr>
                        </table>
  <table id="right">  
                   <tr>
                       
                   <td >
                    <input type="button" name="add" id="adding" value="Add User" onclick="adduser()" />
                   

                    <p id="add"></p> 
                 
                    </td>
                    
               </tr>   
                                       
</table>
       
</body>
</html>