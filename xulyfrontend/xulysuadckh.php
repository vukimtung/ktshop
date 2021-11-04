<?php 

include("../phantrangfrontend/connect.php");

$dckh=$_POST['dckh'];
$iddc=$_POST['form_id'];

$sql="UPDATE dc_khachhang SET diachi_kh = '$dckh' WHERE id_dc = '$iddc' ";

$connect->query($sql);
echo "<script>
	alert('Cập nhật thành công!');
	history.back();
	</script>";
?>