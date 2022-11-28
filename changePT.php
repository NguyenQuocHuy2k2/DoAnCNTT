<?php
require "config.php";
require "models/db.php";
require "models/product.php";
require "models/manufacture.php";
require "models/protype.php";
require "models/user.php";

$product = new Product;
$manufacture = new Manufacture;
$protype = new Protype;
$user = new User;
if (isset($_POST['submit'])) {
    if ($_FILES["image"]["tmp_name"] != null) {
        $image = $_FILES['image']['name'];
        $user_id = $_POST['user_id'];


        $target_dir = "./img/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);


        $imageFileType =   pathinfo($target_file, PATHINFO_EXTENSION);

        if ($imageFileType == 'jpg') {

            $user->changePhoto($image, $user_id);
            move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
            header('location:profile.php?status=s');
        } else {

            header('location:profile.php?status=f');
        }
    }else{
        header('location:profile.php');
    }
}
