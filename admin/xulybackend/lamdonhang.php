<?php 
include("../../phantrangfrontend/connect.php");

	$newid=$_POST['iddh'];
	$tt = "Đã xác nhận";
		$sql="UPDATE orders SET status = '$tt' WHERE id_order = '$newid'";

		$connect->query($sql);
		header('location: ../dsdonhang.php');

?>