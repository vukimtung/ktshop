<?php 
include("phantrangfrontend/connect.php");
include('config.php');
?>
<header>
	
		<!-- Header desktop -->
		<div class="container-menu-desktop">
			<!-- Topbar -->
			<div class="top-bar">
				<div class="content-topbar flex-sb-m h-full container">
					<div class="left-top-bar">
						Đặt hàng ngay: 0394 539 094
					</div>

					<div class="right-top-bar flex-w h-full">
						<?php
							if (isset($_SESSION['user_email_address'])){ ?>
							<a href="thongtintk.php" class="flex-c-m trans-04 p-lr-25"><i class="fa fa-user"></i>&ensp;<?php echo $_SESSION['user_first_name'].' '.$_SESSION['user_last_name'];?></a>
							<a href="xulyfrontend/dangxuat.php" class="flex-c-m trans-04 p-lr-25"><i class="fa fa-key"></i>&ensp;Đăng xuất</a>
							<?php } else if (isset($_SESSION['email'])){ ?>
							<a href="thongtintk.php" class="flex-c-m trans-04 p-lr-25"><i class="fa fa-user"></i>&ensp;<?php echo $_SESSION['name_cust'];?></a>
							<a href="xulyfrontend/dangxuat.php" class="flex-c-m trans-04 p-lr-25"><i class="fa fa-key"></i>&ensp;Đăng xuất</a>
						<?php } else { ?>
						<a href="taikhoan.php" class="flex-c-m trans-04 p-lr-25"><i class="fa fa-user"></i>&nbsp;Tài khoản</a>
						<?php } ?>
					</div>
				</div>
			</div>

			<div class="wrap-menu-desktop" style="background: linear-gradient(-180deg, #f2e49f, #eab2a0) !important">
				<nav class="limiter-menu-desktop container">
					
					<!-- Logo desktop -->		
					<a href="index.php" class="logo">
						<h6 class="ltext-102 cl2 respon1" style="color: #ea0606 !important">KT-Cake</h6>
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							<li>
								<a href="index.php">Trang Chủ</a>
							</li>

							<li class="label1" data-label1="hot">
								<a href="sanpham.php">Sản Phẩm</a>
							</li>

							<li>
								<a href="tintuc.php">Tin Tức</a>
							</li>

							<li>
								<a href="lienhe.php">Liên Hệ</a>
							</li>

							<!-- <li class="label1" data-label1="hot">
								<a href="covid19/index.php">Covid-19</a>
							</li> -->
						</ul>
					</div>	

					<!-- Icon header -->
					<div class="wrap-icon-header flex-w flex-r-m">
						<!-- <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
							<i class="zmdi zmdi-search"></i>
						</div> -->

						<div onclick="location.href='giohang.php'" style="margin-right: 8px !important" class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti zmdi zmdi-shopping-cart" 
						data-notify="<?php
										if (isset($_SESSION['cart'])){
											$count=count($_SESSION['cart']);
											echo $count;
										} else {echo "0";}
									?>">
							
						</div>

						<!-- <a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10">
							<i class="zmdi zmdi-favorite-outline"></i>
						</a> -->
						<a href="https://m.me/106177684946031?ref=ktshop" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11">
							<i class="fab fa-facebook-messenger"></i>
						</a>
						
						
				</nav>
			</div>	
		</div>

		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->		
			<div class="logo-mobile">
				<a href="index.php"><h6 class="ltext-102 cl2" style="color: #ea0606 !important">KT-Shop</h6></a>
			</div>

			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m m-r-15">
				<!-- <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
					<i class="zmdi zmdi-search"></i>
				</div> -->

				<div onclick="location.href='giohang.php'" class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti zmdi zmdi-shopping-cart" 
				data-notify="<?php
								if (isset($_SESSION['cart'])){
									$count=count($_SESSION['cart']);
									echo $count;
								} else {echo "0";}
							?>">
				</div>

				<!-- <a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti" data-notify="0">
					<i class="zmdi zmdi-favorite-outline"></i>
				</a> -->

				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti">
					<a href="https://m.me/106177684946031?ref=ktshop" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10">
								<i class="fa fa-facebook-messenger"></i>
					</a>
				</div>
				
				
			</div>

			<!-- Button show menu -->
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>


		<!-- Menu Mobile -->
		<div class="menu-mobile">
			<ul class="topbar-mobile" style="margin-right: -8px;">
				<li>
					<div class="left-top-bar">
					Đặt hàng ngay: 0394 539 094
					</div>
				</li>

				<li>
					<div class="right-top-bar flex-w h-full">
					<?php
							if (isset($_SESSION['user_email_address'])){ ?>
							<a href="thongtintk.php" class="flex-c-m trans-04 p-lr-25"><i class="fa fa-user"></i>&ensp;<?php echo $_SESSION['user_first_name'].' '.$_SESSION['user_last_name'];?></a>
							<a href="xulyfrontend/dangxuat.php" class="flex-c-m trans-04 p-lr-25"><i class="fa fa-key"></i>&ensp;Đăng xuất</a>
							<?php } else if (isset($_SESSION['email'])){ ?>
							<a href="thongtintk.php" class="flex-c-m trans-04 p-lr-25"><i class="fa fa-user"></i>&ensp;<?php echo $_SESSION['name_cust'];?></a>
							<a href="xulyfrontend/dangxuat.php" class="flex-c-m trans-04 p-lr-25"><i class="fa fa-key"></i>&ensp;Đăng xuất</a>
						<?php } else { ?>
						<a href="taikhoan.php" class="flex-c-m trans-04 p-lr-25"><i class="fa fa-user"></i>&nbsp;Tài khoản</a>
						<?php } ?>
					</div>
				</li>
			</ul>

			<ul class="main-menu-m" style="margin-right: -8px;">
				<li>
					<a href="index.php">Trang Chủ</a>
				</li>

				<li class="label1 rs1" data-label1="hot">
					<a href="sanpham.php">Sản Phẩm</a>
				</li>

				<li>
					<a href="tintuc.php">Tin Tức</a>
				</li>

				<li>
					<a href="lienhe.php">Liên Hệ</a>
				</li>
			</ul>
		</div>

	</header>

