


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  
    
    <title>Document</title>
</head>
<script>
$(document).ready(function(){
 
});
</script>
</head>
<body>


<body>
<div class="container">
<div class="   fs-2 shadow p-3 mb-5 bg-body rounded">

    <?php 
    
    include "db.php";
    $count_data_do_en = " SELECT COUNT(vla) FROM vocabulary_en where status_w is null  ";
$count_data_do_en_t = mysqli_query($conn, $count_data_do_en);
$count_data_do_en_t = mysqli_fetch_array($count_data_do_en_t);
echo $count_data_do_en_t[0];
     $queryV2 = " select * from vocabulary_en  where status_w is null ";
$resultV2 = mysqli_query($conn, $queryV2);
while ($row = mysqli_fetch_array($resultV2)) { ?>

 <center><h3 data-id=" <?php  echo $row['id']?>"> <?php  echo $row['vla']."<hr>"?></h3>  </center>
<?php }



?>

<a href= "test.php"class="btn btn-danger">Back</a>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="view.js"></script>
</body>
</html>

