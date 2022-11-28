<?php 
session_start();
if(isset($_GET['id'])){
 $type_id = $_GET['type_id'];
    unset($_SESSION['cart'][$_GET['id']]);
   
}
header('location:./cart.php?type_id='.$type_id);
