<?php
include('config.php');

	if(isset($_SESSION['user_email_address'])){

	}else if(isset($_SESSION["email"])) {
		
	} else {
			echo "<script>
				alert('Vui lòng đăng nhập tài khoản của bạn.');
				window.location.href='taikhoan.php';
			  </script>";

	}
 ?>