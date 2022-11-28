<?php
session_start();
require "config.php";
require "models/db.php";
require "models/product.php";
$product = new Product;
$getAllProducts = $product->getAllProducts();
if(isset($_SESSION['user'])){
    if(isset($_GET['id'])){
            if (isset($_SESSION['cart'])) :
                $getAllProducts = $product->getAllProducts();
                foreach ($getAllProducts as $value) :
                if ($value['id'] == $_GET['id']) : 
                    $total = $_SESSION['cart'][$value['id']] * $value['price'];
                endif;
            endforeach;
            if($total  >= 100000)
            {
                header('location:./checkout.php?id='.$_GET['id']);
            }
            else
            {
                echo "<script> alert ('Giá trị đơn hàng phải từ 100.000VNĐ'); </script>";
            }
        endif;
    }
}else{
    header('location:./login/index.php');
}