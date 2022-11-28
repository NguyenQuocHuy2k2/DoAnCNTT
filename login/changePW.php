<link rel="stylesheet" type="text/css" href="styles.css">
<?php
require "../config.php";
require "../models/db.php";
require "../models/user.php";

$user = new User;
if (isset($_POST['submit'])) {
    $username = $_GET['username'];
    $password = $_POST['password'];
    $passwordAgain = $_POST['passwordAgain'];
    
    if ($password == $passwordAgain) {
        $user->changePassword($password, $username);
        header('location:notificationPWT.php');
    } else {
        header('location:notificationPWF.php?username=' . $username);
    }
}
