<?php
require "config.php";
require "models/db.php";
require "models/product.php"; 
require "models/manufacture.php"; 
require "models/protype.php";
require "models/sale.php";

$product = new Product;
$manufacture = new Manufacture;
$protype = new Protype;
$sale = new Sale;
if(isset($_POST['submit'])){
    $type_name = $_POST['type_name'];
    $protype->addProtype($type_name);
    header('location:protypes.php?status=ac');
}