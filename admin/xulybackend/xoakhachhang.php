<?php
	include("../../phantrangfrontend/connect.php");
	$newid=$_GET['del_id'];
	$sql="DELETE FROM customers WHERE id_cust='$newid'";
	if (mysqli_query($connect,$sql)) {
		echo "<script>alert('Xóa khách hàng thành công.');
						window.location.href='../dskhachhang.php';
				</script>";
	}

?>