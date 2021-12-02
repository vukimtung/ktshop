<!DOCTYPE html>
<html lang="en">
<title>Quên mật khẩu || KT-Cake</title>
<?php 
session_start();
include("phantrangfrontend/head.php");
include('phantrangfrontend/connect.php');
include('config.php');

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $sql="SELECT * FROM customers WHERE email_cust = '$email'";
    $ketqua=mysqli_query($connect, $sql);
    if(mysqli_num_rows($ketqua) > 0){
        $token = uniqid(md5(time()));
        $sql2="SELECT * FROM password_reset WHERE email = '$email'";
        $ketqua2=mysqli_query($connect, $sql2);
        if (mysqli_num_rows($ketqua2) > 0) {
            $sql1="UPDATE password_reset SET token = '$token' WHERE email = '$email'";
        } else {
            $sql1="INSERT INTO password_reset(email, token) VALUE('$email','$token')";
        }
		$ketqua1=$connect->query($sql1);
            if (mysqli_query($connect, $sql1)) {
                echo "<script>
                            window.location.href='doimatkhau.php?token=$token';
                    </script>";
            }

        
    } else {
		echo "<script>
					alert('Không tìm thấy email.');
					history.back();
				</script>";
	}

}
?>

<body class="animsition">
	
	<?php
	include("phantrangfrontend/header.php");
	?>
	
	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/slider3.jpg');">
		<h2 class="ltext-105 txt-center" style="color: #d10909;">
			Lấy lại mật khẩu
		</h2>
	</section>	


	<!-- Content page -->
	<section class="bg0 p-t-104 p-b-116">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-xl-7 m-lr-auto m-b-50">
					<div class="bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md txt-center" style="border-radius: 20px; background: linear-gradient( -180deg, rgb(212 244 209), rgb(230 168 190));">
						<form action="" method="POST">
							<h3 class="" style="font-weight: bold !important; margin-bottom: 30px;">
								Tìm tài khoản của bạn
							</h3>
                            <label for="">Vui lòng nhập email để tìm kiếm tài khoản của bạn.</label>

							<div class="bor8 m-b-20 how-pos4-parent">
                            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="email" name="email" value="" required>
								<img class="how-pos4 pointer-none" src="images/icons/icon-email.png" alt="ICON">
							</div>

							<div style="display: flex;">
								<button name="submit" class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer" style="margin-left: 25%; width: 40% !important">Tìm kiếm</button>
							</div>
							
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>	
	
	<?php 
	include("phantrangfrontend/footer.php");
	?>
</body>
</html>