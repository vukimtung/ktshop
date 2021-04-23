<?php 

include("../phantrangfrontend/connect.php");

$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];
$phone=$_POST['phone'];
$idkh=$_POST['idkh'];

$sql="UPDATE customers SET email_cust = '$email', name_cust = '$name', password='$password', phone_cust='$phone' WHERE id_cust = '$idkh' ";

$connect->query($sql);
echo "<script>
	alert('Cập nhật thông tin thành công!');
	history.back();
	</script>";
?>