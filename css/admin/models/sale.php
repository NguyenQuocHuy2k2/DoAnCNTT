<?php
class Sale extends Db
{
    public function getAllSalesDESC()
    {
        $sql = self::$connection->prepare("SELECT * FROM `sales` ORDER BY `id` DESC");
        $sql->execute(); //return an object
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item; //return an array
    }
    public function getAllSales()
    {
        $sql = self::$connection->prepare("SELECT * FROM `sales`");
        $sql->execute(); //return an object
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item; //return an array
    }
    public function addSale($id, $Sell_number, $Import_quantity)
    {
        if ($Import_quantity >= $Sell_number) {
            $sql = self::$connection->prepare("INSERT INTO `sales`(`id`,`Sell_number`,`Import_quantity`) VALUES(?,?,?)");
            $sql->bind_param("iii", $id, $Sell_number, $Import_quantity);
            header('location:sales.php?status=ac');
            return $sql->execute(); //return an array
        } else {
            header('location:sales.php?status=af');
        }
    }
    public function deleteSale($id)
    {
        $sql = self::$connection->prepare("DELETE FROM `sales` WHERE `id`= ?");
        $sql->bind_param("i", $id);
        header('location:sales.php?status=dc');
        return $sql->execute(); //return an object
    }
    public function updateSale($Sell_number, $Import_quantity, $id)
    {
        if ($Import_quantity >= $Sell_number) {
            $sql = self::$connection->prepare("UPDATE `sales` SET `Sell_number`= ?,`Import_quantity` = ?,`Import_date` = NOW() WHERE `id`=?");
            $sql->bind_param("iii", $Sell_number, $Import_quantity, $id);
            return $sql->execute(); //return an object
            header('location:sales.php?status=es');
        } else {
            header('location:sales.php?status=ef');
        }
    }
    public function getSaleById($id)
    {
        $sql = self::$connection->prepare("SELECT * FROM sales WHERE id = " . $id);
        $sql->execute(); //return an object
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item; //return an array
    }
}
