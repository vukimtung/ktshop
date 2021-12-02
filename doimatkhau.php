<!DOCTYPE html>
<html lang="en">
<title>Đổi mật khẩu || KT-Cake</title>
<?php 
session_start();
include("phantrangfrontend/head.php");
include('phantrangfrontend/connect.php');
include('config.php');

if(isset($_GET['token'])){
    $token = $_GET['token'];
    $sql="SELECT * FROM password_reset WHERE token = '$token'";
    $ketqua=$connect->query($sql);
    while($kq=$ketqua->fetch_assoc()){
        $email = $kq['email'];
    }
} else {
    header('location:quenmatkhau.php');
}

if(isset($_POST['submit'])){
    $password = mysqli_real_escape_string($connect, $_POST['password']);
    $repassword = mysqli_real_escape_string($connect, $_POST['repassword']);
    if($password!=$repassword){
        echo "<script>alert('Nhập lại mật khẩu không đúng!');
                history.back();
        </script>";
    } elseif(strlen($password)<6){
        echo "<script>alert('Mật khẩu phải chứa ít nhất 6 ký tự!');
                history.back();
        </script>";
    } else {
        $sql1="UPDATE customers SET password = '$password' WHERE email_cust = '$email'";

		if (mysqli_query($connect, $sql1)) {
			echo "<script>alert('Đổi mật khẩu thành công.');
						window.location.href='taikhoan.php';
				</script>";
		}
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
			Đổi mật khẩu
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
								Nhập mật khẩu mới
							</h3>
							<div class="bor8 m-b-20 how-pos4-parent">
                            <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="email" name="email" value="<?php echo $email;?>">
								<img class="how-pos4 pointer-none" src="images/icons/icon-email.png" alt="ICON">
							</div>

                            <div class="bor8 m-b-20 how-pos4-parent">
							    <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="password" name="password" placeholder="Mật khẩu mới" required><i class="fa fa-key how-pos4 pointer-none"></i>
							</div>

                            <div class="bor8 m-b-20 how-pos4-parent">
							    <input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="password" name="repassword" placeholder="Nhập lại mật khẩu" required><i class="fa fa-key how-pos4 pointer-none"></i>
							</div>

							<div style="display: flex;">
								<button name="submit" class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer" style="margin-left: 25%; width: 40% !important">Xác nhận</button>
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