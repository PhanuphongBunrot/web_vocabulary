
<?php

header('Content-Type: application/json');

error_reporting(E_ALL ^ E_NOTICE);
include "db.php";

$mea_en = $_POST['mea_en'];
$id = $_POST['id'];
$time = date("Y-m-d H:i:s");
$vla_en = $_POST['vla_en'];
$query = " select * from vocabulary_en  where id  = " . $id;
$result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_array($result)) {

    if ($mea_en != 0) {
        if ( $mea_en === $row['vla']) {
          
            $sql = " UPDATE vocabulary_en SET updated_mae = '$time' WHERE id = $id ";

            // Execute query
            mysqli_query($conn, $sql);

			$response = [
    
				'status' => true,
				
			  ]; 
			 
			  $response = json_encode( $response);
			 echo $response ;
            
        }else if ($mea_en !==  $row['meaning']){

			$response = [
    
				'status' => 'false',
				'valu' =>$row['vla']
			  ]; 
			 
			  $response = json_encode( $response);
			 echo $response ;
          
        }
    }

    if ($vla_en != 0) {
        if ($vla_en  ===  $row['meaning']) {
            
            $sql = " UPDATE vocabulary_en SET updated_at = '$time' WHERE id = $id ";

            // Execute query
            mysqli_query($conn, $sql);
            mysqli_query($conn, $sql);
			$response = [
    
				'status' => true,
				
			  ]; 
			 
			  $response = json_encode( $response);
			 echo $response ;
        }else if ($vla_en  !==  $row['meaning']){
			$response = [
    
				'status' => 'false',
				'valu' =>$row['meaning']
			  ]; 
			 
			  $response = json_encode( $response);
			 echo $response ;
        }
    }
}
