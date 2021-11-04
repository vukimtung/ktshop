<?php 
include("../../phantrangfrontend/connect.php");

	$newid=$_GET['id_dh'];
	$tt = "Đang giao";
		$sql="UPDATE orders SET status = '$tt' WHERE id_order = '$newid'";

		$connect->query($sql);
		echo "<script>alert('Đã nhận đơn hàng.');
                history.back();
        </script>";

?>