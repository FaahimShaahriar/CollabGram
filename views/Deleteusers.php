<?php
$U_del = $_POST['Udel'];
   
if($U_del==true)
{
    ?>
<!DOCTYPE html>
<html>
<title>Delete Users</title>
<body>

<form  method="GET" action="../controller/DeleteusersCheck.php"onsubmit="return validateForm2()">
  <fieldset>
  <legend><h3><b>User Management</b></h3></legend>
  
           <h4> Userid: <input type="INT" name="Userid" value="" > <br>
           <input type="submit" name="submit" value="submit"><h4>
  </fieldset>

</form>
</body>
</html>
<?php   
}