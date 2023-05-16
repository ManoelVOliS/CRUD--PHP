<?php 

session_start();

if(!isset($_SESSION['auth']) || $_SESSION['auth'] !== true){
    header('location: /login.php');
    exit();
}


$name = $_POST['name'];
$level = $_POST['level'];
$tipo = $_POST['tipo'];
// $friendly = $_POST['friendly'];

$fp = fopen('pokemon.csv', 'r');

while(($row = fgetcsv($fp)) !== false){
    if($row[0] == $name) {
        header('location: index.php');
        exit();
    }
}
fclose($fp);

$fp = fopen('pokemon.csv', 'a');
// fputcsv($fp, [$name,$level,$friendly]);
if(empty($name) || empty($level) || empty($tipo)) {  
    header('location: index.php?error=emptyfields');
    exit();
}

fputcsv($fp, [$name,$level,$tipo]);


header('location: index.php');

?>