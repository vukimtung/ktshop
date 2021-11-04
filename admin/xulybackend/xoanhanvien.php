<?php
	include("../../phantrangfrontend/connect.php");
	$newid=$_GET['del_id'];
	$sql="DELETE FROM nhanvien WHERE id_nv='$newid'";
	if (mysqli_query($connect,$sql)) {
		echo "<script>alert('Xóa nhân viên thành công.');
						window.location.href='../danhsachnhanvien.php';
				</script>";
	}

?>