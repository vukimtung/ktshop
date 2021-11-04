<?php
	include("../../phantrangfrontend/connect.php");
	$newid=$_GET['del_id'];
	$sql="DELETE FROM shipper WHERE id_s='$newid'";
	if (mysqli_query($connect,$sql)) {
		header('location: ../danhsachshipper.php');
	}

?>