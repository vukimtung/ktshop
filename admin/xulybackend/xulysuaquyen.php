<?php 
include("../../phantrangfrontend/connect.php");
if (isset($_POST['sua'])) {
	$newid=$_POST['form_id'];
	$name_r=$_POST['name_r'];
    $mota = $_POST['description'];
		$sql="UPDATE roles SET ten_r = '$name_r', mota_r = '$mota' WHERE id_r = '$newid'";

		if (mysqli_query($connect, $sql)) {
			header('location: ../danhsachquyen.php');
		} else {
			header('location: ../suaquyen.php');
		}
} else {

}

?>