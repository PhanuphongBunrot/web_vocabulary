<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">

<?php 
$val = $_POST['vac_en'];
$mae = $_POST['mea_en'];
include "db.php";

 $val_arr [] =  $val;
$query2 = " select * from vocabulary_en   ";
$result2 = mysqli_query($conn, $query2);
while ($row = mysqli_fetch_array($result2)) {
    $arr[] = $row['vla'];
	   

}
 $in = array_intersect( $val_arr,$arr);
if (count($in) != 0 ){
	echo ".";
	echo "<script>";
	echo "Swal.fire({
	icon: 'warning',
	title: 'mistake',
	showConfirmButton: false,
	timer: 2000
	}).then((result) => {
		if (result.isDismissed) {
			window.location.href ='test.php';
		}
	  })";
	echo "</script>";
}else{
$sql = " INSERT INTO vocabulary_en (vla,meaning) VALUES ('$val','$mae') ";


mysqli_query($conn, $sql);



echo ".";
			echo "<script>";
			echo "Swal.fire({
			icon: 'success',
			title: 'บันทึกข้อมูลสำเร็จ',
			showConfirmButton: false,
			timer: 2000
			}).then((result) => {
				if (result.isDismissed) {
					window.location.href ='test.php';
				}
			  })";
			echo "</script>";
}


?>