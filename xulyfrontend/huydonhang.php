<?php
session_start();
	include("../phantrangfrontend/connect.php");
	$newid=$_GET['iddh'];
	$sql="UPDATE orders SET status = 'Đã hủy' WHERE id_order='$newid'";
		$connect->query($sql);
		header('location: ../thongtintk.php');
	// $sql="DELETE FROM orders WHERE id_order='$newid'";
	// if (mysqli_query($connect,$sql)) {
	// 	$sql2 = "DELETE FROM order_details WHERE order_id='$newid'";
	// 	$connect->query($sql2);
	// 	header('location: ../thongtintk.php');
	// } else {

	// }

?>