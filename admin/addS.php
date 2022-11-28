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

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $Sell_number = $_POST['sell'];
    $Import_quantity = $_POST['import_quantity'];

    $sale->addSale($id, $Sell_number, $Import_quantity);
}
