<?php 
include("../phantrangfrontend/connect.php");

$email=$_POST['email'];
$name=$_POST['name'];
$password=$_POST['password'];
$repassword=$_POST['repassword'];
$phone=$_POST['phone'];

if ($password==$repassword) {
	$sql="INSERT INTO customers(email_cust,name_cust,password,phone_cust) VALUES('$email','$name','$password','$phone')";

	$connect->query($sql);
	echo "<script>alert('Đăng ký thành công.');
				window.location.href='../taikhoan.php';
		</script>";
} else {
	echo "<script>alert('Đăng ký thất bại.');
				window.location.href='../taikhoan.php';
		</script>";
 }
?>