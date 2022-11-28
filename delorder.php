<?php 
require "config.php";
require "models/db.php";
require "models/order.php";

$order = new Order;

if(isset($_GET['order_id'])){
    $order->DeleteOrderByID($_GET['order_id']);header('location:./orders.php?status=sd');
}
