<?php
	include("../../phantrangfrontend/connect.php");
	$newid=$_GET['del_id'];
	$sql="DELETE FROM nhanvien WHERE id_nv='$newid'";
	if (mysqli_query($connect,$sql)) {
		header('location: ../danhsachnhanvien.php');
	}

?>