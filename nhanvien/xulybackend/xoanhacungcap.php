<?php
	include("../../phantrangfrontend/connect.php");
	$newid=$_GET['del_id'];
	$sql="DELETE FROM nhacungcap WHERE id_n='$newid'";
	if (mysqli_query($connect,$sql)) {
		header('location: ../danhsachncc.php');
	}

?>