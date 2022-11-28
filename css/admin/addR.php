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
    $getAllRole =  $role->getAllRole();
    $temp = 0;
    foreach ($getAllRole as $values) {
        if ($values['role_id'] == $role_id) {
            $temp += 1;
        }
    }
    if ($temp == 0) {
        
        $role->addRole($role_id, $role_name);
        header('location:roles.php?status=ac');
    } else {
       
        header('location:roles.php?status=af');
    }
}
