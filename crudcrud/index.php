<?php 

session_start();

if(!isset($_SESSION['auth']) || $_SESSION['auth'] !== true){
    header('location: /login.php');
    exit();
}

header('location: ./crud/index.php');

?>