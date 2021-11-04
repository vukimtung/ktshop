<?php 

  session_start();

	if(isset($_POST['login'])){
		include('../phantrangfrontend/connect.php');
		$email=$_POST['email'];
		$password=$_POST['password'];

		$sql="SELECT * FROM customers WHERE email_cust='$email' AND password='$password'";
		$results=$connect->query($sql);
		$kq=$results->fetch_assoc();

		if(isset($kq)){
			$_SESSION['email']=$kq['email_cust'];
		    $_SESSION['password']=$kq['password'];
		    $_SESSION['name_cust']=$kq['name_cust'];
		    $_SESSION['customer_id']=$kq['id_cust'];
			echo "<script>
					alert('Đăng nhập thành công');
					window.location.href='../taikhoan.php';
				</script>";
		}else{
			echo "<script>
					alert('Đăng nhập thất bại');
					history.back();
				</script>";
		}

	}
	?>