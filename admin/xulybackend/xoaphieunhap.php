<?php
session_start();
	include("../../phantrangfrontend/connect.php");
	$newid=$_GET['del_id'];
	$sql="DELETE FROM donnhaphang WHERE id_donnhap='$newid'";
	if (mysqli_query($connect,$sql)) {
		$sql2 = "DELETE FROM chitietdonnhap WHERE id_donnhap='$newid'";
		$connect->query($sql2);
		echo "<script>alert('Xóa phiếu nhập hàng thành công.');
						window.location.href='../dsdonnhaphang.php';
				</script>";
	} else {

	}

?>