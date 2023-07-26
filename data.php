<?php
session_start();
include "db.php";
$query = " select vla from vocabulary_en where status_w is null ";
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_array($result)) {
    $arr[] = $row['vla'];
}

$count_data_do_th = " SELECT COUNT(vla) FROM vocabulary_en WHERE status_w  = 1 ";
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

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-css/1.4.6/select2-bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css">

    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <title>Document</title>
</head>

<div class="container">
    <div class="   fs-2 shadow p-3 mb-5 bg-body rounded">


        <h3>Total  <?php echo count($arr) ?></h3>
     <?php   if (count($arr) > 0) {
        $total_per = ($count_data_do_th_t[0] * 100) / count($arr);
    } else {
        $total_per = 0;
    }
    ?>
   
   
    <div class="progress">

        <div class="progress-bar bg-info" role="progressbar" style="width: <?php echo  $total_per; ?>%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
    </div>

   
    <p></p>

        <form action="add_data.php" method="post" enctype="multipart/form-data">
            <select class="js-example-basic-multiple" name="states[]" multiple="multiple" style="width: 100%">

                <?php for ($i = 0; $i < count($arr); $i++) {
                ?>
                    <option value="<?php echo $arr[$i]; ?>"><?php echo $arr[$i]; ?></option>
                <?php   }    ?>
            </select>
            <br>




            <br>
            <button class="btn btn-primary btn-login text-uppercase fw-bold"  type="submit" required> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-checklist" viewBox="0 0 16 16">
  <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
  <path d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0zM7 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z"/>
</svg>     Send</button>
        </form>
    </div>
</div>
</body>


<script>
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });
</script>


</html>