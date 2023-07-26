<?php

include "db.php";
$query = " select * from vocabulary_en  where updated_at is null ";
$result = mysqli_query($conn, $query);
$arr  = [];
$arrV2 = [];
$arr_m = [];
$arr_mV2 = [];
while ($row = mysqli_fetch_array($result)) {
    $arr[] = $row['vla'];

    $arrV2[] = [
        'ids' =>  $row['id'],
        'vals' =>  $row['vla']
    ];
}

$queryV2 = " select * from vocabulary_en  where updated_mae is null ";
$resultV2 = mysqli_query($conn, $queryV2);
while ($row = mysqli_fetch_array($resultV2)) {

    $arr_m[] =  $row['meaning'];
    $arr_mV2[] = [
        'id' =>  $row['id'],
        'val' =>  $row['meaning']
    ];
}

if (count($arr) == 0) {
    $arr  = [''];
    $arrV2 = [''];
}

if (count($arr_m) == 0) {
    $arr_m = [''];
    $arr_mV2 = [''];
}

$count_data = " SELECT COUNT(id) FROM vocabulary_en WHERE id  is not null ";
$count_data_t = mysqli_query($conn, $count_data);
$count_data_t = mysqli_fetch_array($count_data_t);



$count_data_do_en = " SELECT COUNT(vla) FROM vocabulary_en WHERE updated_at is not null  ";
$count_data_do_en_t = mysqli_query($conn, $count_data_do_en);
$count_data_do_en_t = mysqli_fetch_array($count_data_do_en_t);


$count_data_do_th = " SELECT COUNT(vla) FROM vocabulary_en WHERE updated_mae is not null ";
$count_data_do_th_t = mysqli_query($conn, $count_data_do_th);
$count_data_do_th_t = mysqli_fetch_array($count_data_do_th_t);

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    
    <title>Document</title>
</head>


<style>
    * {
        box-sizing: border-box;
    }

    body {
        font: 16px Arial;
    }

    /*the container must be positioned relative:*/
    .autocomplete {
        position: relative;
        display: inline-block;
    }

    input {
        border: 1px solid transparent;
        background-color: #f1f1f1;
        padding: 10px;
        font-size: 16px;
    }

    input[type=text] {
        background-color: #f1f1f1;
        width: 100%;
    }

    input[type=submit] {
        background-color: DodgerBlue;
        color: #fff;
        cursor: pointer;
    }

    .autocomplete-items {
        position: absolute;
        border: 1px solid #d4d4d4;
        border-bottom: none;
        border-top: none;
        z-index: 99;
        /*position the autocomplete items to be the same width as the container:*/
        top: 100%;
        left: 0;
        right: 0;
    }

    .autocomplete-items div {
        padding: 10px;
        cursor: pointer;
        background-color: #fff;
        border-bottom: 1px solid #d4d4d4;
    }

    /*when hovering an item:*/
    .autocomplete-items div:hover {
        background-color: #e9e9e9;
    }

    /*when navigating through the items using the arrow keys:*/
    .autocomplete-active {
        background-color: DodgerBlue !important;
        color: #ffffff;
    }
</style>

<body>
    <div class="container">

        <div class="   fs-2 shadow p-3 mb-5 bg-body rounded">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
</svg>
</button>
 <a href="export.php"><img src="image/imgs/excel-img.png" style="width: 60px;;height:auto;" ></a>
 <a href="Report.pdf"><img src="image/imgs/pdf-img.png" style="width: 60px;;height:auto;" ></a>
 <a href="view.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
  <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
</svg></a>
 <center> <h2 class="container">Vocabulary</h2></center>
            <form name="form1" class="container" action="save.php" method="POST" onSubmit="JavaScript:return fncSubmit();">
                <div style="width: 700px; " class="container">
                    <label>Vocabulary English </label>
                    <input type="text" name="vac_en" class="form-control " required>
                    <label>Meaning English </label>
                    <input type="text" name="mea_en" class="form-control " required>

                    <br>
                    <button type="submit" class="btn btn-success">SAVE </button>

            </form>
        </div>



    </div>

    <div class="   fs-2 shadow p-3 mb-5 bg-body rounded">
        <center>



            <h1><?php

                $rds =   $arr[array_rand($arr)];
                if ($rds != null) {
                    echo $rds;
                } else {
                    echo "No Data";
                }

                ?></h1>
            <?php for ($i = 0; $i  < count($arrV2); $i++) {
                if ($rds != null) {
                    if ($rds === $arrV2[$i]['vals']) {
                        $id_V[] = $arrV2[$i]['ids'];
                    }
                }
            }

            ?>
            <a href="test.php" type="submit" class="btn btn-danger">Random </a>
            <div id="text" ></div>
            <br>
        </center>
        <form id="form_th" name="form1" class="container" action="javascript:();" enctype="multipart/form-data">
            <div style="width: 700px; " class="container">
                <br>
                <input type="text" name="vla_en" id="vla_en_f" class="form-control ">
                <input type="text" name="mea_en" id="mea_en_f" class="form-control " value="0" style="display: none;">
                <input type="text" name="id"  id="id_f" class="form-control " value="<?php echo $id_V[0] ?>" style="display: none;">


                <button type="submit" class="btn btn-primary" >Send </button>

        </form>

        <?php

        if ($count_data_t[0] > 0) {
            $total_per = ($count_data_do_en_t[0] * 100) / $count_data_t[0];
        } else {
            $total_per = 0;
        }
        ?>
        <br>
        <h4 style="text-align: center;"><?php echo $count_data_do_en_t[0] . "/" . $count_data_t[0] ?></h4>
        <div class="progress">

            <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo  $total_per; ?>%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
    </div>
    </div>
    <div class="   fs-2 shadow p-3 mb-5 bg-body rounded">

        <center>

            <h1><?php $rd =   $arr_m[array_rand($arr_m)];
                if ($rd != null) {
                    echo $rd;
                } else {
                    echo "No Data";
                }
                ?></h1>
            <?php for ($i = 0; $i  < count($arr_mV2); $i++) {
                if ($rd != null) {
                    if ($rd === $arr_mV2[$i]['val']) {
                        $id_V2[] = $arr_mV2[$i]['id'];
                    }
                }
            }
           
            ?>
            <a href="test.php" type="submit" class="btn btn-danger">Random </a>
            <div id="text_v" ></div>
            <br>
        </center>
        <form id="from_eng" name="from_eng" class="container" action="javascript:();" enctype="multipart/form-data">
            <div style="width: 700px; " class="container">
                <br>
                <input type="text" name="mea_en" id="mea_en" class="form-control ">
                <input type="text" name="vla_en" id="vla_en" class="form-control " value="0" style="display: none;">
                <input type="text" name="id" id="id" class="form-control " value="<?php echo $id_V2[0] ?>" style="display: none;">
                <br>
                <button type="submit" class="btn btn-primary" id="submit_eng">Send </button>

        </form>

        <?php

        if ($count_data_t[0] > 0) {
            $total_per = ($count_data_do_th_t[0] * 100) / $count_data_t[0];
        } else {
            $total_per = 0;
        }
        ?>
        <br>
        <h4 style="text-align: center;"><?php echo $count_data_do_th_t[0] . "/" . $count_data_t[0] ?></h4>
        <div class="progress">

            <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo  $total_per; ?>%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
        </div>

        <a class="btn btn-warning btn-login text-uppercase fw-bold" href="data.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-break-fill" viewBox="0 0 16 16">
                <path d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V9H2V2a2 2 0 0 1 2-2zm5.5 1.5v2a1 1 0 0 0 1 1h2l-3-3zM2 12h12v2a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2v-2zM.5 10a.5.5 0 0 0 0 1h15a.5.5 0 0 0 0-1H.5z" />
            </svg> write Test </a>

            
    </div>
    </div>
            


    <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Search </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <center><!--Make sure the form has the autocomplete function switched off:-->
            <form name="my-form" action="" method="post" enctype="multipart/form-data" >
                <div class="autocomplete" style="width:300px;">
                    <input id="myInput" type="text" name="myCountry" class="myCountry">
                   
                </div>
                <button  class="btn btn-primary" type="submit" name="submit">   <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
</svg></button>
            </form>
        <br>
          <h4 id="data"></h4>
        </center>
            

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>
</body>
<script src="test.js"></script>


<script src="getdata.js" ></script>
<script src="check.js" ></script>

</html>