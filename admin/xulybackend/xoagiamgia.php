<?php
	include("../../phantrangfrontend/connect.php");
	$newid=$_GET['del_id'];
	$sql="DELETE FROM giagiam WHERE id_gg='$newid'";
	if (mysqli_query($connect,$sql)) {
		echo "<script>alert('Xóa giảm giá thành công.');
						window.location.href='../danhsachgiamgia.php';
				</script>";
	}

?>