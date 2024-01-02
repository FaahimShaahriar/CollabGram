<?php
$U_upp = $_POST['Uupp'];
   
if($U_upp==true)
{
    ?>
<!DOCTYPE html>
<html>
<title>Update User</title>
<body>

<form  method="POST" action="../controller/UpdateusersCheck.php"onsubmit="return validateForm()">
  <fieldset>
  <legend><h3><b>User Management</b></h3></legend>
  
        <h4>Userid: <input type="INT" name="Userid" value="" > <br>
            Username: <input type="text" name="Username" value="" > <br>
            Useremail: <input type="text" name="Useremail" value="" > <br>
            Mobilenumber: <input type="INT" name="Mobilenumber" value="" > <br>
            Actions: <input type="text" name="Actions" value="" > <br>
           <input type="submit" name="submit" value="submit"><h4>
  </fieldset>
</form>


</body>
</html>
<?php

}