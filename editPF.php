<?php
session_start();
require "config.php";
require "models/db.php";
require "models/order.php";
require "models/user.php";
require "models/product.php";

$order = new Order;
$user = new User;
$product = new Product;

if (isset($_POST['submit'])) {
    $user_id =  $_GET['user_id'];
    $first_name = $_POST['First_name'];
    $last_name = $_POST['Last_name'];
    $phone = $_POST['phone'];
    if (is_numeric($phone) == true) {
        $user->updateUser($first_name, $last_name, $phone, $user_id);
        header('location:./profile.php?status=s');
    } else {
        header('location:./profile.php?status=f');
    }
}
