<?php
	include("../../phantrangfrontend/connect.php");
	$newid=$_GET['del_id'];
	$sql="DELETE FROM contact WHERE id_contact='$newid'";
	if (mysqli_query($connect,$sql)) {
		echo "<script>alert('Đã xóa thành công');
                        window.location.href='../dslienhe.php';
            </script>";
	}

?>