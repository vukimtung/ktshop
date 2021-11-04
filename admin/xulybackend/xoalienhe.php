<?php
	include("../../phantrangfrontend/connect.php");
	$newid=$_GET['del_id'];
	$sql="DELETE FROM contact WHERE id_contact='$newid'";
	if (mysqli_query($connect,$sql)) {
		echo "<script>alert('Xóa liên hệ thành công');
                        window.location.href='../dslienhe.php';
            </script>";
	}

?>