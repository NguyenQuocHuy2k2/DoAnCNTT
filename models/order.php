<?php
class Order extends Db
{

    public function addOrder($user_id, $pro_id, $pro_name, $quantity, $address,$phone, $total, $note)
    {

        $sql = self::$connection->prepare("INSERT INTO `orders`(`user_id`, `pro_id`, `pro_name`, `quantity`, `address`,`phone`,  `total`, `note`) VALUES (?,?,?,?,?,?,?,?)");
        $sql->bind_param("iisissis", $user_id, $pro_id, $pro_name, $quantity, $address,$phone, $total, $note);
        $sql->execute();
    }

    public function getOrderByUserID($user_id)
    {
        $sql = self::$connection->prepare("SELECT * FROM `orders` WHERE `user_id`=? ORDER BY `order_id` DESC");
        $sql->bind_param("i", $user_id);
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item; //return an array
    }
    public function getOrderByOrderID($order_id)
    {
        $sql = self::$connection->prepare("SELECT * FROM `orders` WHERE `order_id`=?");
        $sql->bind_param("i", $order_id);
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item; //return an array
    }
    public function DeleteOrderByID($order_id)
    {
        $sql = self::$connection->prepare("DELETE FROM `orders` WHERE `order_id`=?");
        $sql->bind_param("i", $order_id);
        return $sql->execute();
    }

    public function ReceivedOrder($order_id){
        $sql = self::$connection->prepare("UPDATE `orders` SET `status`=1 WHERE `order_id`=?");
        $sql->bind_param("i", $order_id);
        return $sql->execute();
    }

   

}
