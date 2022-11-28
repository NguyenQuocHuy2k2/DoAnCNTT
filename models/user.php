<?php
class User extends Db
{
    public function checkLogin($username, $password)
    {
        $sql = self::$connection->prepare("SELECT * FROM `users` WHERE `username` = ? AND `password` = ?");
        $password = md5($password);
        $sql->bind_param("ss", $username, $password);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->num_rows;
        if ($items == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function getRoleId($username)
    {
        $sql = self::$connection->prepare("SELECT `role_id` FROM `users` WHERE `username` =?");
        $sql->bind_param("s", $username);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

    public function register($first_name, $last_name, $username, $password, $phone, $passwordAgain)
    {
        if ($password == $passwordAgain) {
            $sql = self::$connection->prepare("INSERT INTO `users`(`First_name`,`Last_name`,`username`, `password`,`phone`,`image`, `role_id`) VALUES (?,?,?,?,?,'avatar7.png',2)");
            $password = md5($password);
            $sql->bind_param("ssssi", $first_name, $last_name, $username, $password, $phone);
            $sql->execute();
            return true;
        }
    }

    public function getAllUsername()
    {
        $sql = self::$connection->prepare("SELECT `username` FROM `users`");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function changePassword($password, $username)
    {
        $sql = self::$connection->prepare("UPDATE `users` SET `password`=? WHERE `username`=?");
        $password = md5($password);
        $sql->bind_param("ss", $password, $username);
        return  $sql->execute(); //return an object

    }

    public function getLastname($username)
    {
        $sql = self::$connection->prepare("SELECT `Last_name` FROM `users` WHERE `username`=?");
        $sql->bind_param("s", $username);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

    public function getInfoByUsername($username)
    {
        $sql = self::$connection->prepare("SELECT * FROM `users`,`roles` WHERE `username`=? AND `users`.`role_id`=`roles`.`role_id`");
        $sql->bind_param("s", $username);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function updateUser($first_name, $last_name, $phone, $user_id)
    {
        $sql = self::$connection->prepare("UPDATE `users` SET `First_name`=?,`Last_name`=?,`phone`=? WHERE `user_id`=? ");
        $sql->bind_param("ssii", $first_name, $last_name, $phone, $user_id);
        return    $sql->execute(); //return an object

    }
    public function changePhoto($image, $user_id)
    {
        $sql = self::$connection->prepare("UPDATE `users` SET `image` = ? WHERE `user_id` = ?");
        $sql->bind_param("si", $image, $user_id);
        return $sql->execute(); //return an object
    }
    public function getUserById($user_id)
    {
        $sql = self::$connection->prepare("SELECT * FROM users WHERE user_id = " . $user_id);
        $sql->execute(); //return an object
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item; //return an array
    }
}
