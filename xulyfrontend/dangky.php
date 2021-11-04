<?php 
include("../phantrangfrontend/connect.php");

if (isset($_POST['dangky'])) {
	$email=$_POST['email_kh'];
	$name=$_POST['name'];
	$password=$_POST['password'];
	$repassword=$_POST['repassword'];
	$phone=$_POST['phone'];

	$sql1="SELECT * FROM customers WHERE email_cust='$email'";
			$results=$connect->query($sql1);
			$kq1=$results->fetch_assoc();
		
			if(isset($kq1)){
				echo "<script>
						alert('Email đã tồn tại');
							history.back();
					</script>";
			}else{
				if ($password==$repassword) {
					$sql="INSERT INTO customers(email_cust,name_cust, password ,phone_cust) VALUES('$email','$name','$password','$phone')";

					$connect->query($sql);
					echo "<script>alert('Đăng ký thành công.');
								window.location.href='../taikhoan.php';
						</script>";
				} else {
					echo "<script>alert('Mật khẩu không trùng khớp.');
							history.back();
						</script>";
				 }
			}
	} else{

	}
	


?>