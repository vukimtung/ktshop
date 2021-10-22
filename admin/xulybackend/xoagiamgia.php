<?php
	include("../../phantrangfrontend/connect.php");
	$newid=$_GET['del_id'];
	$sql="DELETE FROM giagiam WHERE id_gg='$newid'";
	if (mysqli_query($connect,$sql)) {
		header('location: ../danhsachgiamgia.php');
	}

?>