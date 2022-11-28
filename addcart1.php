<?php
session_start();
if (isset($_POST['submit'])) {
    if (isset($_GET['id'])) {
        if (isset($_GET['type_id'])) {
            $qty = $_POST['quantity'];
            $id = $_GET['id'];
            $type_id = $_GET['type_id'];
            if (isset($_SESSION['cart'][$id])) {
                $_SESSION['cart'][$id]+= $qty;
            } else {
                $_SESSION['cart'][$id] = 1;
            }
        }
    }
}
header('location:./cart.php?type_id=' . $type_id);
