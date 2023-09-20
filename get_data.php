<?php 


header('Content-Type: application/json');
include "db.php";

$id = $_POST['id'];
$queryV3 = " select meaning from vocabulary_en  where id =   " . $id;
        $resultV3 = mysqli_query($conn, $queryV3);
        while ($row = mysqli_fetch_array($resultV3)) {
           
             $valu = $row['meaning'];
            
 }

 $response = [
    'valu' => $valu
   
    
  ]; 
 
  $response = json_encode( $response);
 echo $response ;
