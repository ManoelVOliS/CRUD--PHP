<?php 

include 'secured.php';

$id = $_GET['id'];

// $name = $_GET['name'];
// $level = $_GET['level'];
// $friendly = $_GET['friendly'];

$tempFile = tempnam('.', '');
$fpTemp = fopen($tempFile, 'w');

$fpOriginal = fopen('pokemon.csv', 'r');

while(($row = fgetcsv($fpOriginal)) !== false){
    if($row[0] != $id){
        fputcsv($fpTemp, $row);
    }
}

fclose($fpOriginal);
fclose($fpTemp);

rename($tempFile, 'pokemon.csv');

header('location: index.php');

?>