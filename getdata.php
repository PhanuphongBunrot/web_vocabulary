<?php
include 'db.php';
header('Content-Type: application/json');
$programe  = "SELECT * FROM vocabulary_en ";
$result = $conn->query($programe);
   $row = $result->fetch_assoc();

   while($row = $result->fetch_assoc()) {
    $data_json []=  $row["vla"];
  }
  $response = [
    
   'data_json' => $data_json
 ];

 $response = json_encode( $response);
echo $response ;

?>