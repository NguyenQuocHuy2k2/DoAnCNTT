<?php
require "config.php";
require "models/db.php";
require "models/product.php"; 
require "models/manufacture.php"; 
require "models/protype.php";
require "models/sale.php";
require "models/order.php";

$product = new Product;
$manufacture = new Manufacture;
$protype = new Protype;
$sale = new Sale;
$order = new Order;
if(isset($_POST['submit'])){
    $user_id = $_POST['user_id'];
    $pro_id = $_POST['pro_id'];
    $pro_name = $_POST['pro_name'];
    $quantity = $_POST['quantity'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $status = $_POST['status'];
    $total = $_POST['total'];
    $note = $_POST['note'];
    $order->addOrder($user_id, $pro_id, $pro_name, $quantity, $address, $phone, $status, $total, $note);
    header('location:orders.php?status=ac');
}