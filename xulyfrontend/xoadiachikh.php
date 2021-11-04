<?php
session_start();
	include("../phantrangfrontend/connect.php");
	$newid=$_GET['iddc'];
	$sql="DELETE FROM dc_khachhang WHERE id_dc='$newid'";
	$connect->query($sql);
    echo "<script>  
        alert('Xóa thành công!');
        history.back();
	</script>";

?>