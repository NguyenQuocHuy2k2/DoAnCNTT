<?php 
session_start();
include "login.php";
unset($_SESSION['user']);
unset($_SESSION['permision']);
header('location:../index.php');
?>