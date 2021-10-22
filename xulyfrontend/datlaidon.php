<?php
session_start();
	include("../phantrangfrontend/connect.php");
	$newid=$_GET['iddh'];
    $ngaydat = date("d/m/Y");
	$sql="UPDATE orders SET status = 'Đơn hàng mới', date_order = '$ngaydat' WHERE id_order='$newid'";
		$connect->query($sql);
		header('location: ../thongtintk.php');
?>