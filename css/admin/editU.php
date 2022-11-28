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
        $user_id = $_POST['user_id'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $phone = $_POST['phone'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $role_id = $_POST['role_id'];
        $image = $_FILES['image']['name'];
        $getPasswordByID =  $user->getPasswordByID($user_id);

        $target_dir = "../img/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $imageFileType =   pathinfo($target_file, PATHINFO_EXTENSION);

        $getAllUser = $user->getAllUser();
        $getUserById = $user->getUserById($user_id);
        $temp = 0;
        foreach ($getAllUser as $value) {
            foreach ($getUserById as $value1) {
                if ($username == $value['username'] && $username != $value1['username']) {
                    $temp += 1;
                   
                }
            }
        }

        if ($temp == 0) {
            if (is_numeric($phone) == false) {

                header('location:users.php?status=ef');
                return;
            }

            if ($imageFileType == 'jpg') {
                foreach ($getPasswordByID as $values) {
                    if ($values['password'] == $password) {
                        $user->updateUserNoChangePassword($first_name, $last_name, $phone, $username,  $role_id, $image, $user_id);
                        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
                        header('location:users.php?status=ec');
                    } else {
                        $user->updateUser($first_name, $last_name, $phone, $username, $password, $role_id, $image, $user_id);
                        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
                        header('location:users.php?status=ec');
                    }
                }
            } else {
                header('location:users.php?status=ef');
            }
        } else {
            header('location:users.php?status=ef');
        }
    } else {
        $user_id = $_POST['user_id'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $phone = $_POST['phone'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $role_id = $_POST['role_id'];
        $getPasswordByID =  $user->getPasswordByID($user_id);

        $getAllUser = $user->getAllUser();
        $getUserById = $user->getUserById($user_id);
        $temp = 0;
        foreach ($getAllUser as $value) {
            foreach ($getUserById as $value1) {
                if ($username == $value['username'] && $username != $value1['username']) {
                    $temp += 1;
                   
                }
            }
        }

        if ($temp == 0) {
            if (is_numeric($phone) == false) {

                header('location:users.php?status=ef');
                return;
            }

            foreach ($getPasswordByID as $values) {
                if ($values['password'] == $password) {
                    $user->updateUserNoChangePasswordNoImage($first_name, $last_name, $phone, $username,  $role_id,  $user_id);

                    header('location:users.php?status=ec');
                } else {
                    $user->updateUserNoImage($first_name, $last_name, $phone, $username, $password, $role_id,  $user_id);
                    header('location:users.php?status=ec');
                }
            }
        } else {
            header('location:users.php?status=ef');
        }
    }
}
