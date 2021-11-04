<?php
	include("../../phantrangfrontend/connect.php");
	$newid=$_GET['del_id'];
	$sql="DELETE FROM comments WHERE id_com='$newid'";
	if (mysqli_query($connect,$sql)) {
		echo "<script>alert('Xóa bình luận thành công.');
						window.location.href='../dsbinhluan.php';
				</script>";
	}

?>