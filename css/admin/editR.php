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
if (isset($_POST['submit'])) {
    $role_id = $_POST['role_id'];
    $role_name = $_POST['role_name'];
  
    $updateRoleByID =  $role->updateRoleByID($role_name, $role_id);
  
    header('location:roles.php?status=ec');
}
