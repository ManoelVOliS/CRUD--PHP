<?php 

session_start();

$email = $_POST['email'];
$password = $_POST['password'];

$userData = file_get_contents('http://localhost:8000/get.php');
$users = json_decode($userData, true);

foreach($users as $user){

    if($user['email'] == $email && $user['password'] == $password) {
        $_SESSION['auth'] = true;
        
        header('location: index.php');
        exit();
    }
}


$_SESSION['auth'] = false;
header('location: login.php');

?>