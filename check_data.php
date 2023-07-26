<?php
include "db.php";

$data = $_POST['detail'];
$data_vla = [];
$diff  = [];
$delete_vo = [];
$queryV2 = " select * from test_val   ";
$resultV2 = mysqli_query($conn, $queryV2);
while ($row = mysqli_fetch_array($resultV2)) {
    $data_vla[] =  $row['val_test'];
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
    $diff  = array_values($diff);
    $arr_in  = array_intersect($data_vla, $data);
    $arr_in = array_values($arr_in);

    for($i = 0 ; $i < count($diff) ; $i++){
        $data_d = "'".$diff[$i]."'";
        $queryV3 = " select * from vocabulary_en  where vla =   ".$data_d;
        $resultV3 = mysqli_query($conn, $queryV3);
        while ($row = mysqli_fetch_array($resultV3)) {
          $arr_mea [] =[
            "meaning"=> $row['meaning']
          ] ;
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


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <title>Document</title>
</head>

<body>
    <div class="container">

        <div class="   fs-2 shadow p-3 mb-5 bg-body rounded">

            <h1> Wrong word</h1>

            <?php if ($diff != null) {

                for ($i = 0; $i < count($diff); $i++) {
            ?>
                    <h3 style="color: red;"><?php echo substr($diff[$i],0,1)." ".$arr_mea[$i]['meaning']; ?></h3>
                <?php   }
            } else { ?>
                <div class="container">
                    <center>
                        <h1 style="color: #009933 ;">Successful! ^^</h1>
                    </center>
                </div>
            <?php } ?>
            <a class="btn btn-danger text-uppercase fw-bold" href="wirde.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z" />
                </svg> Return</a>
            <a class="btn btn-primary btn-login text-uppercase fw-bold" href="delete.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                </svg> Reset</a>
        </div>
    </div>
</body>

</html>