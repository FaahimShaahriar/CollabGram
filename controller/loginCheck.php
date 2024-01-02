
<?php
include_once("../models/userModel.php");

$id = "";
$password = "";

if (isset($_POST["submit"])) {
    $id = $_POST["id"];
    $password = $_POST["password"];

    $errors = [];

    if (empty($id) || empty($password)) {
        $errors[] = "Please enter both User Id and Password";
    }
    if (strlen($password) < 6) {
        $errors[] = "Password should be at least 6 characters long";
    }


    if (empty($errors)) {
        if (login($id, $password)) {
            // Set cookies if login is successful
            setcookie("user_id", $id, time() + 3600, "/");
            setcookie("user_type", "regular", time() + 3600, "/");            
            echo "Login successful!\n";
        } else {
            $errors[] = "Invalid credentials. Please try again.";
        }
    }

    // Display validation errors
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo $error . "\n";
        }
    }
}
?>
