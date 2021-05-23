<?php 
include("../phantrangfrontend/connect.php");

$email=$_POST['email'];
$name=$_POST['name'];
$password=$_POST['password'];
$repassword=$_POST['repassword'];
$phone=$_POST['phone'];

$sql1="SELECT * FROM customers WHERE email_cust='$email'";
		$results=$connect->query($sql1);
		$kq1=$results->fetch_assoc();

		if($email=$kq1['email_cust']){
			echo "<script>
					alert('Email đã tồn tại');
					window.location.href='../taikhoan.php';
				</script>";
		}else{
			if ($password==$repassword) {
				$sql="INSERT INTO customers(email_cust,name_cust,password,phone_cust) VALUES('$email','$name','$password','$phone')";

				$connect->query($sql);
				echo "<script>alert('Đăng ký thành công.');
							window.location.href='../taikhoan.php';
					</script>";
			} else {
				echo "<script>alert('Mật khẩu không trùng khớp.');
							window.location.href='../taikhoan.php';
					</script>";
			 }
		}


?>