<?php
	include("../../phantrangfrontend/connect.php");
	$newid=$_GET['del_id'];
	$sql="DELETE FROM categories WHERE id_cate='$newid'";
	if (mysqli_query($connect,$sql)) {
		header('location: ../danhmucsp.php');
	}

?>