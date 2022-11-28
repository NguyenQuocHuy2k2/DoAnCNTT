<?php
class Order extends Db
{
    public function getAllOrdersDESC()
    {
        $sql = self::$connection->prepare("SELECT * FROM `orders` ORDER BY `order_id` DESC");
        $sql->execute(); //return an object
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item; //return an array
    }
    public function getAllOrders()
    {
        $sql = self::$connection->prepare("SELECT * FROM `orders` ");
        $sql->execute(); //return an object
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item; //return an array
    }
    public function getAllOrdersDelivered()
    {
        $sql = self::$connection->prepare("SELECT * FROM `orders` WHERE `status`=0");
        $sql->execute(); //return an object 
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item; //return an array
    }
    public function getAllOrdersHasDelivered()
    {
        $sql = self::$connection->prepare("SELECT * FROM `orders` WHERE `status`=1");
        $sql->execute(); //return an object 
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item; //return an array
    }


    public function addOrder($user_id, $pro_id, $pro_name, $quantity, $address, $phone, $status, $total, $note)
    {
        $sql = self::$connection->prepare("INSERT INTO `orders`(`user_id`, `pro_id`, `pro_name`, `quantity`, `address`, `phone`, `status`,`total`,`note`) VALUES(?,?,?,?,?,?,?,?,?)");
        $sql->bind_param("iisisiiis", $user_id, $pro_id, $pro_name, $quantity, $address, $phone, $status, $total, $note);
        return $sql->execute(); //return an object
    }
    public function getAllUserID()
    {
        $sql = self::$connection->prepare("SELECT `user_id` FROM `orders`");
        $sql->execute(); //return an object
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item; //return an array
    }
    public function getAllProID()
    {
        $sql = self::$connection->prepare("SELECT `pro_id` FROM `orders`");
        $sql->execute(); //return an object
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item; //return an array
    }
}
