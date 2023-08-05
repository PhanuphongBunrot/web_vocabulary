<?php

header('Content-Type: application/json');
include "db.php";

$data = $_POST['detail'];
$data_vla = [];
$diff = [];
$delete_vo = [];
$queryV2 = " select * from test_val   ";
$resultV2 = mysqli_query($conn, $queryV2);
while ($row = mysqli_fetch_array($resultV2)) {
    $data_vla[] = $row['val_test'];
    $delete_lisl[] = [
        "id" => $row['id'],
        "vlaue" => $row['val_test']
    ];
}

$query = " select * from vocabulary_en ";
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_array($result)) {

    $delete_vo[] = [
        "id_v" => $row['id'],
        "vlaue_v" => $row['vla']
    ];
}

$data = explode(" ", $data);
if ($data_vla != null) {
    $diff = array_diff($data_vla, $data);
    $diff = array_values($diff);
    $arr_in = array_intersect($data_vla, $data);
    $arr_in = array_values($arr_in);

    for ($i = 0; $i < count($diff); $i++) {
        $data_d = "'" . $diff[$i] . "'";
        $queryV3 = " select * from vocabulary_en  where vla =   " . $data_d;
        $resultV3 = mysqli_query($conn, $queryV3);
        while ($row = mysqli_fetch_array($resultV3)) {
            $arr_mea[] = [
                "meaning" => $row['meaning']
            ];
        }

    }

    if ($arr_in != null) {
        $time = 1;
        for ($y = 0; $y < count($arr_in); $y++) {
            for ($i = 0; $i < count($delete_lisl); $i++) {
                if ($arr_in[$y] === $delete_lisl[$i]['vlaue']) {
                    $id = $delete_lisl[$i]['id'];

                    $sql = " DELETE FROM test_val where id = " . $delete_lisl[$i]['id'];
                    mysqli_query($conn, $sql);
                }
            }
        }

        for ($z = 0; $z < count($arr_in); $z++) {

            for ($x = 0; $x < count($delete_vo); $x++) {

                if ($arr_in[$z] === $delete_vo[$x]['vlaue_v']) {
                    $id = $delete_vo[$x]['id_v'];


                    $sql_2 = " UPDATE vocabulary_en SET status_w = '$time' WHERE id = $id ";
                    mysqli_query($conn, $sql_2);
                }
            }
        }
    }
}


for ($i = 0; $i < count($diff); $i++) {
    
       $valu []   =    substr($diff[$i],0,1)." ".$arr_mea[$i]['meaning'];
     
}           
            $response = [
                'valu' => $valu
               
                
              ]; 
             
              $response = json_encode( $response);
             echo $response ;
?>