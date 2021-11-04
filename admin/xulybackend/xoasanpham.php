<?php
	include("../../phantrangfrontend/connect.php");
	$newid=$_GET['del_id'];
	$sql="DELETE FROM products WHERE id_pro='$newid'";
	if (mysqli_query($connect,$sql)) {
		echo "<script>alert('Xóa sản phẩm thành công.');
						window.location.href='../danhsachsp.php';
				</script>";
	}

?>