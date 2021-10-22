<?php 
include("../../phantrangfrontend/connect.php");

	$newid=$_POST['iddh'];
	$id_nv = 4;
	$tt = "Đã xác nhận";
		$sql="UPDATE orders SET status = '$tt', id_nvien = '$id_nv' WHERE id_order = '$newid'";

		$connect->query($sql);
		header('location: ../dsdonhang.php');

?>