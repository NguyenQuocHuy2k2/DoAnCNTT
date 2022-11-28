<?php
require "config.php";
require "models/db.php";
require "models/product.php";
require "models/manufacture.php";
require "models/protype.php";
require "models/sale.php";
require "models/user.php";

$product = new Product;
$manufacture = new Manufacture;
$protype = new Protype;
$sale = new Sale;
$user = new User;
if (isset($_POST['submit'])) {
    if ($_FILES["image"]["tmp_name"] != null) {

        $first_name = $_POST['First_name'];
        $last_name = $_POST['Last_name'];
        $phone = $_POST['phone'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $role_id = $_POST['role_id'];
        $image = $_FILES['image']['name'];

        $getAllUser = $user->getAllUser();
        $temp = 0;
        foreach ($getAllUser as $value) {
            if ($username == $value['username']) {
                $temp += 1;
            }
        }
        if ($temp == 0) {
            $target_dir = "../img/";
            $target_file = $target_dir . basename($_FILES["image"]["name"]);
            $imageFileType =   pathinfo($target_file, PATHINFO_EXTENSION);

            if (is_numeric($phone) == false) {

                header('location:users.php?status=af');
                return;
            }

            if ($imageFileType == 'jpg') {
                $user->addUser($first_name, $last_name, $phone, $username, $password, $role_id, $image);
                move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
                header('location:users.php?status=as');
            } else {
                header('location:users.php?status=af');
            }
        } else {
            header('location:users.php?status=af');
        }
    } else {

        $first_name = $_POST['First_name'];
        $last_name = $_POST['Last_name'];
        $phone = $_POST['phone'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $role_id = $_POST['role_id'];

        $getAllUser = $user->getAllUser();
        $temp = 0;
        foreach ($getAllUser as $value) {
            if ($username == $value['username']) {
                $temp += 1;
            }
        }
        if ($temp == 0) {
            if (is_numeric($phone) == false) {

                header('location:users.php?status=af');
                return;
            }

            $user->addUserNoImage($first_name, $last_name, $phone, $username, $password, $role_id);

            header('location:users.php?status=as');
        } else {
            header('location:users.php?status=af');
        }
    }
}
