<?php 

include 'secured.php';

if(isset($_POST['search'])) {
  $search = $_POST['search'];
  
  $fp = fopen('pokemon.csv', 'r');
  $results = array();
  while(($row = fgetcsv($fp)) !== false){
    if(strpos(strtolower($row[0]), strtolower($search)) !== false || strpos(strtolower($row[2]), strtolower($search)) !== false) {
      $results[] = $row;
    }
  }
  fclose($fp);
}

?>