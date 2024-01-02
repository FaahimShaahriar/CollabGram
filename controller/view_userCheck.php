<?php
session_start();
if (!isset($_SESSION['auth'])) {
    header('location: login.php');
} else if ($_SESSION['user']['type'] == "Influencer" && $_SESSION['user']['type'] == "Admin" && $_SESSION['user']['type'] == "Brand") {
    header('location: user_home.php');
}
?>