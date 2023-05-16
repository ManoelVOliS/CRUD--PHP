<?php 

$fp = fopen('users.csv', 'r');
$data = [];
while(($row = fgetcsv($fp, null, ',', "'")) !== false){
    $data[] = [
        'email' => $row[0],
        'password' => $row[1],
        'name' => $row[2]
    ];
}

echo json_encode(
  $data

)

?>