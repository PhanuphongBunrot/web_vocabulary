<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">


<?php 
session_start();
$states =$_POST['states'];


include "db.php";


for ($i=0; $i <count($states) ; $i++) { 
   $arr_s [] = $states[$i];
    $sql = " INSERT INTO test_val (val_test) VALUES ('$states[$i]') ";
    mysqli_query($conn, $sql);
}
$_SESSION['states'] = $arr_s;



echo ".";
			echo "<script>";
			echo "Swal.fire({
			icon: 'info',
			title: 'Start Test',
			showConfirmButton: false,
			timer: 2000
			}).then((result) => {
				if (result.isDismissed) {
					window.location.href ='wirde.php';
				}
			  })";
			echo "</script>";
?>

