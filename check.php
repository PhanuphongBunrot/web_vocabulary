
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">
<?php



error_reporting(E_ALL ^ E_NOTICE);
include "db.php";

$mea_en = $_POST['mea_en'];
$id = $_GET['id'];
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
            echo ".";
            echo "<script>";
            echo "Swal.fire({
			icon: 'success',
			title: 'correct',
			showConfirmButton: false,
			timer: 2000
			}).then((result) => {
				if (result.isDismissed) {
					window.location.href ='test.php';
				}
			  })";
            echo "</script>";
        }else if ($mea_en !==  $row['meaning']){
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
        }
    }

    if ($vla_en != 0) {
        if ($vla_en  ===  $row['meaning']) {
            
            $sql = " UPDATE vocabulary_en SET updated_at = '$time' WHERE id = $id ";

            // Execute query
            mysqli_query($conn, $sql);
            mysqli_query($conn, $sql);
            echo ".";
            echo "<script>";
            echo "Swal.fire({
			icon: 'success',
			title: 'correct',
			showConfirmButton: false,
			timer: 2000
			}).then((result) => {
				if (result.isDismissed) {
					window.location.href ='test.php';
				}
			  })";
            echo "</script>";
        }else if ($vla_en  !==  $row['meaning']){
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
        }
    }
}
