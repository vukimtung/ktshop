<?php 
include("../phantrangfrontend/connect.php");
$iddh=$_GET['iddh'];
$tt = 'Nhận thành công';

$sql="UPDATE orders SET status = '$tt' WHERE id_order = '$iddh'";

$connect->query($sql);
echo "<script>
	alert('Cám ơn bạn đã xác nhận.');
	history.back();
	</script>";
?>