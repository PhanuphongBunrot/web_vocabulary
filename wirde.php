<?php
session_start();
include "db.php";
$query = " select vla from vocabulary_en  ";
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_array($result)) {
    $arr[] = $row['vla'];
}
$states=$_SESSION['states'];

for ($i=0; $i < count($states) ; $i++) { 
  
  $data_d = "'".$states[$i]."'";
    $queryV3 = " select * from vocabulary_en  where vla =   ".$data_d;
    $resultV3 = mysqli_query($conn, $queryV3);
    while ($row = mysqli_fetch_array($resultV3)) {
      $arr_mea [] =[
        "meaning"=> $row['meaning']
      ] ;
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

<div class="container">
    <div class="   fs-2 shadow p-3 mb-5 bg-body rounded">




        <form action="check_data.php" method="post" enctype="multipart/form-data">
           

            <div class="form-floating">
                <textarea class="form-control" name="detail" placeholder="Leave a comment here" id="floatingTextarea2" required style="height: 200px;"></textarea>

            </div>
            <br>



            <br>
            <button class="btn btn-success btn-login text-uppercase fw-bold"  type="submit" required><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send" viewBox="0 0 16 16">
  <path d="M15.854.146a.5.5 0 0 1 .11.54l-5.819 14.547a.75.75 0 0 1-1.329.124l-3.178-4.995L.643 7.184a.75.75 0 0 1 .124-1.33L15.314.037a.5.5 0 0 1 .54.11ZM6.636 10.07l2.761 4.338L14.13 2.576 6.636 10.07Zm6.787-8.201L1.591 6.602l4.339 2.76 7.494-7.493Z"/>
</svg>      Send</button>
            
        </form>
        <?php for ($i=0; $i <count($arr_mea) ; $i++) { 
           ?>
            <?php   echo $arr_mea[$i]['meaning']." ";?>
      <?php  } ?>
    </div>
</div>
</body>




</html>