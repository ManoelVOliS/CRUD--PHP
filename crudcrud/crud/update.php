<?php 

include 'secured.php';

$id = $_POST['id'];
$name = $_POST['name'];
$level = $_POST['level'];
$friendly = $_POST['friendly'];

$tempFile = tempnam('.', '');

$fpTemp = fopen($tempFile, 'w');
$fpOriginal = fopen('pokemon.csv', 'r');

while(($row = fgetcsv($fpOriginal)) !== false){
    if($row[0] != $id){
        fputcsv($fpTemp, $row);
    } else{
        fputcsv($fpTemp, [$name,$level,$friendly,$id]);
        
    }
}

fclose($fpOriginal);
fclose($fpTemp);

rename($tempFile, 'pokemon.csv');

header('location: index.php');

?>