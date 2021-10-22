<!DOCTYPE html>
<html lang="en">
<title>Liên Hệ || KT-Cake</title>
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
			Liên Hệ
		</h2>
	</section>		


	<!-- Content page -->
	<section class="bg0 p-t-104 p-b-116">
		<div class="container">
			<div class="flex-w flex-tr" style="background: linear-gradient( -180deg, rgb(212 244 209), rgb(230 168 190)); margin-bottom: 10px;">
				<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md txt-center">
					<form action="xulyfrontend/xulylienhe.php" method="POST">
						<h4 class="" style="font-family: Philosopher, sans-serif !important; font-weight: bold !important;">
							Gửi Tin Nhắn
						</h4>

						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="email" placeholder="Nhập Email của bạn" required="Vui lòng nhập Email của bạn.">
							<img class="how-pos4 pointer-none" src="images/icons/icon-email.png" alt="ICON">
						</div>

						<div class="bor8 m-b-30">
							<textarea class="stext-111 cl2 plh3 size-120 p-lr-28 p-tb-25" name="msg" placeholder="Chúng tôi có thể giúp gì cho bạn?" required></textarea>
						</div>

						<button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer" style="margin-left: 25%; width: 40% !important">
							Gửi
						</button>
					</form>
				</div>

				<div class="size-210 bor10 flex-w flex-col-m p-lr-93 p-tb-30 p-lr-15-lg w-full-md">
					<div class="flex-w w-full p-b-42">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-map-marker"></span>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Địa Chỉ
							</span>

							<p class="stext-115 cl6 size-213 p-t-18">
								Khu II, Đường 3/2, Xuân Khánh, Ninh Kiều, Cần Thơ.
							</p>
						</div>
					</div>

					<div class="flex-w w-full p-b-42">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-phone-handset"></span>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Điện Thoại
							</span>

							<p class="stext-115 cl1 size-213 p-t-18">
								0394 539 094
							</p>
						</div>
					</div>

					<div class="flex-w w-full">
						<span class="fs-18 cl5 txt-center size-211">
							<span class="lnr lnr-envelope"></span>
						</span>

						<div class="size-212 p-t-2">
							<span class="mtext-110 cl2">
								Email
							</span>

							<p class="stext-115 cl1 size-213 p-t-18">
								kimtung204@gmail.com
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Map -->
		<div class="map mx-auto text-center">
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3928.8415184086434!2d105.76842661474251!3d10.029933692830642!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31a0895a51d60719%3A0x9d76b0035f6d53d0!2zxJDhuqFpIGjhu41jIEPhuqduIFRoxqE!5e0!3m2!1svi!2s!4v1616945881634!5m2!1svi!2s" width="70%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
		</div>
	</section>	
	<?php 
	include("phantrangfrontend/footer.php");
	?>
</body>
</html>