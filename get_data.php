<?php 


header('Content-Type: application/json');
include "db.php";

$id = $_POST['id'];
$queryV3 = " select vla,meaning from vocabulary_en  where id =   " . $id;
        $resultV3 = mysqli_query($conn, $queryV3);
        while ($row = mysqli_fetch_array($resultV3)) {
           
             $valu = $row['meaning'];
             $valu_v = $row['vla'];

            
 }

 $response = [
    'valu' => $valu,
    'valu_v' => $valu_v
   
    
  ]; 
 
  $response = json_encode( $response);
 echo $response ;
