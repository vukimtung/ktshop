<!DOCTYPE html>
<html lang="en">
<title>Tài khoản || KT-Cake</title>
<?php 
session_start();
include("phantrangfrontend/head.php");
include('config.php');
$login_button = '';
if(isset($_GET["code"]))
{
	$token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);
	if(!isset($token['error']))
	{
		$google_client->setAccessToken($token['access_token']);
		$_SESSION['access_token'] = $token['access_token'];
		$google_service = new Google_Service_Oauth2($google_client);
		$data = $google_service->userinfo->get();
		if(!empty($data['given_name']))
		{
			$_SESSION['user_first_name'] = $data['given_name'];
		}
		if(!empty($data['family_name']))
		{
			$_SESSION['user_last_name'] = $data['family_name'];
		}
		if(!empty($data['email']))
		{
			$_SESSION['user_email_address'] = $data['email'];
		}
		if(!empty($_SESSION['gender']))
		{
			$_SESSION['user_gender'] = $data['gender'];
		}
		if(!empty($_SESSION['picture']))
		{
			$_SESSION['user_image'] = $data['picture'];
		}
	}
}

if (!isset($_SESSION['access_token'])) {
	$login_button = '<a href="'.$google_client->createAuthUrl().'" class="btn btn-block btn-social btn-google btn-flat" style="background: #eb3333; color: white; width:70%;"><i class="fa fa-google-plus"></i> Đăng nhập với Google+</a>';
}
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
				<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md txt-center" style="border: 1px solid #9e9e9e;border-radius: 10px;">
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

						<div class="m-b-20">
							<a href="quenmatkhau.php">Quên mật khẩu?</a>
						</div>

						<button name="login" class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer" style="margin-left: 30%; width: 40% !important">
							Đăng nhập
						</button>

						
					</form>
					<div class="social-auth-links text-center">
				      <?php
						   if($login_button == '')
						   {
						   	include("phantrangfrontend/connect.php");

								$email=$_SESSION['user_email_address'];
								$name=$_SESSION['user_first_name'].' '.$_SESSION['user_last_name'];
								$password=rand();
								$phone=rand();

								$sql1="SELECT * FROM customers WHERE email_cust='$email'";
								$results=$connect->query($sql1);
								$kq1=$results->fetch_assoc();

								if(isset($kq1)){
									
								}else{
									$email=$_SESSION['user_email_address'];
									$sql="INSERT INTO customers(email_cust,name_cust,password,phone_cust) VALUES('$email','$name','$password','$phone')";

									$connect->query($sql);
									mysqli_close($connect);
							}	
						   }
						   else
						   {
							   if(!isset($_SESSION['email'])){
								echo '<p>- Hoặc -</p>';
								echo '<div align="center">'.$login_button . '</div>';
							   }
						   	
						   }
   					?>
    				</div>
				</div>

				<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md txt-center" style="border: 1px solid #9e9e9e;border-radius: 10px;">
					<form action="xulyfrontend/dangky.php" method="POST">
						<h4 class="" style="font-family: Philosopher, sans-serif !important; font-weight: bold !important;">
							Đăng Ký
						</h4>

						<div class="bor8 m-b-20 how-pos4-parent" style="margin-top: 5% !important">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="email_kh" placeholder="Email" required="Vui lòng nhập Email.">
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

						<button name="dangky" class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer" style="margin-left: 30%; width: 40% !important">
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