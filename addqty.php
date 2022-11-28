<?php 
session_start();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $type_id = $_GET['type_id'];
    $_SESSION['cart'][$id]++;
    header('location:./cart.php?type_id=' . $type_id);
}