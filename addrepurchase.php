<?php

require "config.php";
require "models/db.php";
require "models/order.php";
require "models/user.php";
require "models/product.php";

$order = new Order;
$user = new User;
$product = new Product;

if (isset($_POST['submit'])) {
    $getOrderByOrderID = $order->getOrderByOrderID($_GET['order_id']);
    foreach ($getOrderByOrderID as $value) {
        $user_id = $value['user_id'];
        $pro_id = $value['pro_id'];
        $pro_name = $value['pro_name'];
        $quantity = $value['quantity'];
        $total = $value['total'];
    }

    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $note=$_POST['note'];



    $order->addOrder($user_id, $pro_id, $pro_name, $quantity, $address, $phone,  $total, $note);

    header('location:./orders.php?status=s');
}
