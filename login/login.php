<?php
session_start();
require "../config.php";
require "../models/db.php";
require "../models/user.php";
$user = new User;
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $getRoleId = $user->getRoleId($username);


    if ($user->checkLogin($username, $password)) {
        $_SESSION['user'] = $username;
        foreach ($getRoleId as $value) {          
            if ($value['role_id'] == 1) {
                $_SESSION['permision'] = 1;
                header('location:../admin');
            }
            if ($value['role_id'] == 2) {
                $_SESSION['permision'] = 2;
                header('location:../index.php');
            }
        }
    }
    else{
        header('location:index.php');
    }
}
