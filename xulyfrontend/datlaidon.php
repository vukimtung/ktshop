<?php
session_start();
	include("../phantrangfrontend/connect.php");
	$newid=$_GET['iddh'];
	$sql="UPDATE orders SET status = 'Đơn hàng mới' WHERE id_order='$newid'";
		$connect->query($sql);
		header('location: ../thongtintk.php');
?>