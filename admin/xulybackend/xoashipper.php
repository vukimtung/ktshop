<?php
	include("../../phantrangfrontend/connect.php");
	$newid=$_GET['del_id'];
	$sql="DELETE FROM shipper WHERE id_s='$newid'";
	if (mysqli_query($connect,$sql)) {
		echo "<script>alert('Xóa shipper thành công.');
						window.location.href='../danhsachshipper.php';
				</script>";
	}

?>