<?php

include_once("../models/userModel.php");

$id = "";
$password = "";
$confirmPassword = "";
$name = "";
$email = "";
$gender = "";
$dob = "";
$type = "";


if (isset($_POST["submit"])) {
    
    
    $id = $_POST["id"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $gender = $_POST["gender"];
    $dob = $_POST["dob"];

  
    if (isset($_POST["type"])) {
        $type = $_POST["type"];
    } else {
        echo "Please select a user type first\n\n";
        exit; 
    }

    
    if (empty($id) || empty($password) || empty($confirmPassword) || empty($name) || empty($email) || empty($gender) || empty($dob)) {
        echo "Enter all required fields\n";
    } 
    elseif ($password != $confirmPassword) {
        echo "Password not matched";
    } 
    elseif (strlen($password) < 6) {
        echo "Password must be at least 6 characters\n";
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email address\n";
    } 
    elseif (!preg_match("/^[a-zA-Z ]*$/", $name)) {
        echo "Only letters and white spaces allowed in the name\n";
    } 
    elseif (!in_array($gender, ["Male", "Female", "Other"])) {
        echo "Invalid gender selection\n";
    } 
    elseif (!validateDate($dob)) {
        echo "Invalid date of birth format\n"; 
    }
    else{
               
        $registrationSuccess = register($id, $name, $password, $email, $gender, $dob, $type);

        if ($registrationSuccess) {
            setcookie("user_id", $id, time() + 3600, "/");
            setcookie("user_type", $type, time() + 3600, "/");
            setcookie("user_name", $name, time() + 3600, "/");
            setcookie("user_email", $email, time() + 3600, "/");
    
            echo "Registration successful! Cookies set.\n";
        } else {
            echo "Registration failed. Please try again later.\n";
        }
    }
}

function validateDate($date, $format = 'Y-m-d') {
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) === $date;
}

?>
