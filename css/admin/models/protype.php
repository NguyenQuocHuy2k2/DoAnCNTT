<?php
class Protype extends Db
{
    public function getAllProtypes()
    {
        $sql = self::$connection->prepare("SELECT * 
FROM `protypes`");
        $sql->execute(); //return an object
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item; //return an array
    }
    public function getAllProtypeDESC()
    {
        $sql = self::$connection->prepare("SELECT * FROM `protypes` ORDER BY `type_id` DESC");
        $sql->execute(); //return an object
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item; //return an array
    }
    public function getProtypeById($type_id)
    {
    $sql = self::$connection->prepare("SELECT * FROM protypes WHERE type_id = ".$type_id);
    $sql->execute();//return an object
    $item = array();
    $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
    return $item; //return an array
    }
    public function addProtype($type_name)
    {

        $sql = self::$connection->prepare("INSERT INTO `protypes`(`type_name`) VALUES(?)");
        $sql->bind_param("s", $type_name);       
        return $sql->execute(); //return an array
    }
    public function deleteProtype($type_id){
        $sql = self::$connection->prepare("SELECT * FROM `products` WHERE `type_id`=?");
        $sql->bind_param("i", $type_id);
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);

        if (count($item) == 0) {
            $sql = self::$connection->prepare("DELETE FROM `protypes` WHERE `type_id`=?");
            $sql->bind_param("i", $type_id);
            header('location:protypes.php?status=dc');
            return $sql->execute(); //return an object
           
        }
        else{
            header('location:protypes.php?status=df');
        }
    }
    public function updateProtype($type_name, $type_id){
        $sql = self::$connection->prepare("UPDATE `protypes` SET `type_name`=? WHERE `type_id`=?");
        $sql->bind_param("si", $type_name, $type_id);
        return $sql->execute(); //return an object
    }
}
