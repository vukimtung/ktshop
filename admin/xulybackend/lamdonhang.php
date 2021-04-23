<?php 
include("../../phantrangfrontend/connect.php");

	$newid=$_POST['iddh'];
	$tt = "Đã giải quyết";
		$sql="UPDATE orders SET status = '$tt' WHERE id_order = '$newid'";

		$connect->query($sql);
		header('location: ../dsdonhang.php');

?>