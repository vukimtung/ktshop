<?php
	include("../../phantrangfrontend/connect.php");
	$newid=$_GET['del_id'];
	$sql="DELETE FROM roles WHERE id_r='$newid'";
	if (mysqli_query($connect,$sql)) {
		echo "<script>alert('Xóa quyền thành công.');
						window.location.href='../danhsachquyen.php';
				</script>";
	}

?>