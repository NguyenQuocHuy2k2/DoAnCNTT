<?php
require "config.php";
require "models/db.php";
require "models/product.php"; 
require "models/manufacture.php"; 
require "models/protype.php";
require "models/sale.php";
require "models/user.php";
require "models/role.php";

$product = new Product;
$manufacture = new Manufacture;
$protype = new Protype;
$sale = new Sale;
$user = new User;
$role = new Role;
if(isset($_GET['role_id'])){
    $role->deleteRoleByID($_GET['role_id']);
   
}
