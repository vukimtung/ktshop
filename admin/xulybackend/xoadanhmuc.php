<?php
	include("../../phantrangfrontend/connect.php");
	$newid=$_GET['del_id'];
	$sql="DELETE FROM categories WHERE id_cate='$newid'";
	if (mysqli_query($connect,$sql)) {
		echo "<script>alert('Xóa danh mục thành công.');
						window.location.href='../danhmucsp.php';
				</script>";
		header('location: ../danhmucsp.php');
	}

?>