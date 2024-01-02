<?php
$U_add = $_POST['Uadd'];
if($U_add==true)
{
    ?>
<!DOCTYPE html>
<html>
    <title>Add New Users</title>
<body>

<form  method="POST" action="../controller/AddusersCheck.php"onsubmit="return validateForm()">
  <fieldset>
  <legend><h3><b>User Management</b></h3></legend>
  
           <h4> Userid: <input type="INT" name="Userid" value="" > <br>
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