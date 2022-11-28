<?php
session_start();
require "../config.php";
require "../models/db.php";
require "../models/user.php";
$user = new User;

if (isset($_POST['submit'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $passwordAgain = $_POST['passwordAgain'];
    $phone = $_POST['phone'];
    $getAllUsername =   $user->getAllUsername();
    $temp = 0;

    if ($password != $passwordAgain) {
        header('location:notification3.php');
    }

    foreach ($getAllUsername as $value) {
        if ($value['username'] == $username) {

            header('location:notification1.php');

            $temp += 1;
        }
    }
    if ($temp == 0) {
        if ($user->register($first_name, $last_name, $username, $password, $phone, $passwordAgain)) {

            header('location:notification2.php');
        }
    }
    /*  $message = "Đăng kí thành công";
        echo "<script type='text/javascript'>alert('$message');</script>"; */
    //   header('location:index.php');
}
