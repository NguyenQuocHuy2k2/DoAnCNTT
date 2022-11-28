<?php
class Product extends Db
{
    public function getAllProducts()
    {
        $sql = self::$connection->prepare("SELECT * 
FROM `products`,`manufactures`,`protypes`
WHERE `products`.`manu_id` = `manufactures`.`manu_id`
AND `products`.`type_id` = `protypes`.`type_id`");
        $sql->execute(); //return an object
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item; //return an array
    }
    public function getAllProductsDESC()
    {
        $sql = self::$connection->prepare("SELECT * 
FROM `products`,`manufactures`,`protypes`
WHERE `products`.`manu_id` = `manufactures`.`manu_id`
AND `products`.`type_id` = `protypes`.`type_id` ORDER BY `id` DESC");
        $sql->execute(); //return an object
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item; //return an array
    }
    public function getProductById($id)
    {
        $sql = self::$connection->prepare("SELECT * FROM products WHERE id = " . $id);
        $sql->execute(); //return an object
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item; //return an array
    }
    public function updateProductNotImage($name, $manu, $type_id, $price, $desc, $feature, $id)
    {
        $sql = self::$connection->prepare("UPDATE `products` SET `name`=?,`manu_id`=?,`type_id`=?,`price`=?,`description`=?,`feature`=?, `created_at` = NOW() WHERE `id`=?");
        $sql->bind_param("siiisii", $name, $manu, $type_id, $price, $desc, $feature, $id);
        return $sql->execute(); //return an object
    }
    public function addProduct($name, $manu, $type_id, $price, $image, $desc, $feature)
    {
        $sql = self::$connection->prepare("INSERT INTO `products`(`name`, `manu_id`, `type_id`, `price`, `pro_image`, `description`, `feature`) VALUES(?,?,?,?,?,?,?)");
        $sql->bind_param("siiissi", $name, $manu, $type_id, $price, $image, $desc, $feature);
        return $sql->execute(); //return an object
    }
    public function deleteProduct($id)
    {
        $sql = self::$connection->prepare("DELETE FROM `products` WHERE `id`=?");
        $sql->bind_param("i", $id);
        return $sql->execute();
    }

    public function updateProduct($name, $manu, $type_id, $price, $image, $desc, $feature, $id)
    {
        $sql = self::$connection->prepare("UPDATE `products` SET `name`=?,`manu_id`=?,`type_id`=?,`price`=?,`pro_image`=?,`description`=?,`feature`=?,`created_at` = NOW() WHERE `id`=?");
        $sql->bind_param("siiissii", $name, $manu, $type_id, $price, $image, $desc, $feature, $id);
        return $sql->execute(); //return an object
    }
    public function getAllIDProduct()
    {
        $sql = self::$connection->prepare("SELECT `id` FROM `products`");
        $sql->execute(); //return an object
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item; //return an array
    }
}
