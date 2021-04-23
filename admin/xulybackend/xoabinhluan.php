<?php
	include("../../phantrangfrontend/connect.php");
	$newid=$_GET['del_id'];
	$sql="DELETE FROM comments WHERE id_com='$newid'";
	if (mysqli_query($connect,$sql)) {
		header('location: ../dsbinhluan.php');
	}

?>