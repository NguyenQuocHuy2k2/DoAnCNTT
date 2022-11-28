<?php
class Role extends Db
{

    public function addRole($role_id, $role_name)
    {
        $sql = self::$connection->prepare("INSERT INTO `roles`(`role_id`, `role_name`) VALUES (?,?)");
        $sql->bind_param("is", $role_id, $role_name);
        return $sql->execute(); //return an object
    }

    public function getAllRole()
    {
        $sql = self::$connection->prepare("SELECT * FROM `roles`");
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }
    public function getRoleByID($role_id)
    {
        $sql = self::$connection->prepare("SELECT * FROM `roles` WHERE `role_id`=?");
        $sql->bind_param("i", $role_id);
        $sql->execute(); //return an object
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items; //return an array
    }

    public function updateRoleByID($role_name, $role_id)
    {
        $sql = self::$connection->prepare("UPDATE `roles` SET `role_name`=? WHERE `role_id`=?");
        $sql->bind_param("si", $role_name, $role_id);
        $sql->execute(); //return an object
    }

    public function deleteRoleByID($role_id)
    {
        $sql = self::$connection->prepare("SELECT * FROM `users` WHERE `role_id`=?");
        $sql->bind_param("i", $role_id);
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);

        if (count($item) == 0) {
            $sql = self::$connection->prepare("DELETE FROM `roles` WHERE `role_id`=?");
            $sql->bind_param("i", $role_id);
            header('location:roles.php?status=dc');
            return $sql->execute(); //return an object
        } else {
            header('location:roles.php?status=df');
        }
    }
}
