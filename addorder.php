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
    $getInfoByUsername = $user->getInfoByUsername($_SESSION['user']);
    foreach ($getInfoByUsername as $value) {
        $user_id = $value['user_id'];
    }
    $getProductById = $product->getProductById($_GET['id']);
    foreach ($getProductById as $value) {
        $pro_name = $value['name'];
        $price = $value['price'];
    }
    $quantity = $_SESSION['cart'][$_GET['id']];
    $pro_id = $_GET['id'];
    $cost = $price * $quantity;
    if($cost >= 300000){
        $shipCost = 0;
    }else{
        $shipCost = 5000;
    }
    $total = $cost + $shipCost;
    $address = $_POST['address'];
    $note = $_POST['note'];
    $phone = $_POST['phone'];

    $order->addOrder($user_id, $pro_id, $pro_name, $quantity, $address, $phone,  $total, $note);

    unset($_SESSION['cart'][$_GET['id']]);
    header('location:./orders.php?status=s');
}
