<?php 
include("../../phantrangfrontend/connect.php");
if (isset($_POST['sua'])) {
	$newid=$_POST['form_id'];
	$ten_n=$_POST['ten_n'];
	$diachi_n=$_POST['diachi_n'];
	$dienthoai_n=$_POST['dienthoai_n'];
		$sql="UPDATE nhacungcap SET ten_n = '$ten_n', diachi_n = '$diachi_n', dienthoai_n = '$dienthoai_n' WHERE id_n = '$newid'";

		if (mysqli_query($connect, $sql)) {
			echo "<script>alert('Cập nhật thành công.');
                        window.location.href='../danhsachncc.php';
                </script>";
		} else {
		}
} else {

}

?>