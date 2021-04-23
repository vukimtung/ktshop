<!DOCTYPE html>
<html lang="en">
<title>Tài khoản || KT-Shop</title>
<?php 
session_start();
include("phantrangfrontend/head.php");
?>

<body class="animsition">
	
	<?php
	include("phantrangfrontend/header.php");
	?>
	
	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/slider3.jpg');">
		<h2 class="ltext-105 txt-center" style="color: #d10909;">
			Tài Khoản
		</h2>
	</section>	


	<!-- Content page -->
	<section class="bg0 p-t-104 p-b-116">
		<div class="container">
			<div class="flex-w flex-tr">
				<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md txt-center">
					<form action="xulyfrontend/dangnhap.php" method="POST">
						<h4 class="" style="font-family: Philosopher, sans-serif !important; font-weight: bold !important;">
							Đăng Nhập
						</h4>

						<div class="bor8 m-b-20 how-pos4-parent" style="margin-top: 17% !important">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="email" placeholder="Email" required="Vui lòng nhập Email.">
							<img class="how-pos4 pointer-none" src="images/icons/icon-email.png" alt="ICON">
						</div>

						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="password" name="password" placeholder="Mật khẩu" required="Vui lòng nhập mật khẩu."><i class="fa fa-key how-pos4 pointer-none"></i>
						</div>

						<button name="login" class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer" style="margin-left: 30%; width: 40% !important">
							Đăng nhập
						</button>
					</form>
					<div class="social-auth-links text-center">
				      <p>- Hoặc -</p>
				      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat" style="background: #3b5998; color: white; width: 80%; margin-left: 11%;"><i class="fa fa-facebook"></i> Đăng nhập với Facebook</a>
				      <a href="#" class="btn btn-block btn-social btn-google btn-flat" style="background: #eb3333; color: white; width: 80%; margin-left: 11%;"><i class="fa fa-google-plus"></i> Đăng nhập với Google+</a>
    				</div>
				</div>

				<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md txt-center">
					<form action="xulyfrontend/dangky.php" method="POST">
						<h4 class="" style="font-family: Philosopher, sans-serif !important; font-weight: bold !important;">
							Đăng Ký
						</h4>

						<div class="bor8 m-b-20 how-pos4-parent" style="margin-top: 5% !important">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="email" placeholder="Email" required="Vui lòng nhập Email.">
							<img class="how-pos4 pointer-none" src="images/icons/icon-email.png" alt="ICON">
						</div>

						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="name" placeholder="Họ Tên" required="Vui lòng nhập tên của bạn."><i class="fa fa-user how-pos4 pointer-none"></i>
						</div>

						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="password" name="password" placeholder="Mật khẩu" required="Vui lòng nhập mật khẩu."><i class="fa fa-key how-pos4 pointer-none"></i>
						</div>

						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="password" name="repassword" placeholder="Nhập lại mật khẩu" required="Vui lòng nhập lại mật khẩu."><i class="fa fa-key how-pos4 pointer-none"></i>
						</div>

						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="phone" placeholder="Số điện thoại" required="Vui lòng nhập số điện thoại."><i class="fa fa-phone how-pos4 pointer-none"></i>
						</div>

						<button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer" style="margin-left: 30%; width: 40% !important">
							Đăng ký
						</button>
					</form>
				</div>
			</div>
		</div>
	</section>	
	
	<?php 
	include("phantrangfrontend/footer.php");
	?>
</body>
</html>