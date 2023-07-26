<?php
include 'db.php';

header('Content-Type: application/json');
$search = "'".$_GET['vla']."'";

 $queryV3 = " select * from vocabulary_en  where vla =   ".$search;
 $resultV3 = mysqli_query($conn, $queryV3);
 while ($row = mysqli_fetch_array($resultV3)) {
    $data_json[] = [
        "vla" => $row["vla"],
        "mas" => $row["meaning"]
    ] ;
            
  }

 
 

 $response = json_encode( $data_json);
echo $response ;

?>