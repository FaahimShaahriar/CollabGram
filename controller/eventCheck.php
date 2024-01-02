<?php
include_once("../models/userModel.php");

$Event_Name = "";
$Event_Sponsers = "";
$Event_Desc = "";
$Event_sd = "";
$Event_end="";
$Event_location="";

if (isset($_POST["submit"])) {
    
    $Event_Name = $_POST["Event_Name"];
    $Event_Sponsers = $_POST["Event_Sponsers"];
    $Event_Desc = $_POST["Event_Desc"];
    $Event_sd = $_POST["Event_sd"];
    $Event_end=$_POST["Event_end"];   
    $Event_location=$_POST["Event_location"];


    if (!$_POST['Event_Name'] || !$_POST['Event_Sponsers'] || !$_POST['Event_Desc'] ||  !$_POST['Event_sd']  ||  !$_POST['Event_end'] ||  !$_POST['Event_location']) {
        echo "Enter all required fields\n";
    } 
    else{
        event($Event_Name, $Event_Sponsers, $Event_Desc,$Event_sd,$Event_end,$Event_location);
    }
}