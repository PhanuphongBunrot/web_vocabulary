<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">
<?php 
include "db.php";
$sql = " DELETE FROM test_val ";
mysqli_query($conn, $sql);

echo ".";
			echo "<script>";
			echo "Swal.fire({
			icon: 'success',
			title: 'just to moment',
			showConfirmButton: false,
			timer: 2000
			}).then((result) => {
				if (result.isDismissed) {
					window.location.href ='test.php';
				}
			  })";
			echo "</script>";
?>