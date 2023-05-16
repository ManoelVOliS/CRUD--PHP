<?php 

include 'secured.php';

$id = $_GET['id'];

$fp = fopen('pokemon.csv', 'r');

while(($row = fgetcsv($fp)) !== false){
    if($row[0] == $id){
        $found = true;
        $data = $row;
    }
}

if(!$found){
    header('location: index.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Pokemon name <?= $data[0] ?></h1>
    <form action="update.php" method="POST">
        <input type="hidden" name="id" value="<?= $data[0]?>">
        <input type="text" name="name" placeholder="name" value="<?= $data[0]?>">
        <input type="number" name="level" placeholder="level" min="1" value="<?= $data[1]?>">
        <input type="text" name="friendly" placeholder="tipo" value="<?= $data[2]?>">
        <!-- Friendly ? -->
        <!-- <select name="friendly">
            <option value="1" <?= $data[2] == '1' ? 'selected' : '' ?>>yes</option>
            <option value="2" <?= $data[2] == '0' ? 'selected' : '' ?>>no</option>
        </select> -->
        <button>Save</button>
    </form>
</body>

<style>
    body {
    font-family: Arial, sans-serif;
}

h1 {
    text-align: center;
}

form {
    display: flex;
    flex-direction: column;
    align-items: center;
}

input, select {
    margin: 10px;
    padding: 5px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

button {
    margin-top: 20px;
    padding: 10px 20px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

button:hover {
    background-color: #3e8e41;
}

a {
    display: block;
    text-align: right;
    margin: 10px;
    color: #4CAF50;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}

</style>
</html>