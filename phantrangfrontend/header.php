<?php 
include("phantrangfrontend/connect.php");

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
							if (!empty($_SESSION['email'])){ ?>
							<a href="thongtintk.php" class="flex-c-m trans-04 p-lr-25"><i class="fa fa-user"></i><?php echo $_SESSION['name_cust'];?></a>
							<a href="xulyfrontend/dangxuat.php" class="flex-c-m trans-04 p-lr-25"><i class="fa fa-key"></i>Đăng xuất</a>
						<?php } else { ?>
						<a href="taikhoan.php" class="flex-c-m trans-04 p-lr-25"><i class="fa fa-user"></i>Tài khoản</a>
					<?php }?>
					</div>
				</div>
			</div>

			<div class="wrap-menu-desktop" style="background: #f3debe !important">
				<nav class="limiter-menu-desktop container">
					
					<!-- Logo desktop -->		
					<a href="index.php" class="logo">
						<h6 class="ltext-102 cl2 respon1" style="color: #ea0606 !important">KT-Shop</h6>
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

						<a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti" data-notify="0">
							<i class="zmdi zmdi-favorite-outline"></i>
						</a>
						<a href="https://www.facebook.com/VKTung20" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11">
							<i class="fa fa-facebook" style="color: #284ac8;"></i>
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

				<a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti" data-notify="0">
					<i class="zmdi zmdi-favorite-outline"></i>
				</a>
				<a href="https://www.facebook.com/VKTung20" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11">
					<i class="fa fa-facebook" style="color: #284ac8;"></i>
				</a>
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
			<ul class="topbar-mobile">
				<li>
					<div class="left-top-bar">
						
					</div>
				</li>

				<li>
					<div class="right-top-bar flex-w h-full">
					<?php
							if (!empty($_SESSION['email'])){ ?>
							<a href="thongtintk.php" class="flex-c-m trans-04 p-lr-25"><i class="fa fa-user"></i><?php echo $_SESSION['name_cust'];?></a>
							<a href="xulyfrontend/dangxuat.php" class="flex-c-m trans-04 p-lr-25"><i class="fa fa-key"></i>Đăng xuất</a>
						<?php } else { ?>
						<a href="taikhoan.php" class="flex-c-m trans-04 p-lr-25"><i class="fa fa-user"></i>Tài khoản</a>
					<?php }?>
					</div>
				</li>
			</ul>

			<ul class="main-menu-m">
				<li>
					<a href="index.php">Trang Chủ</a>
				</li>

				<li class="label1 rs1" data-label1="hot">
					<a href="sanpham.php">Sản Phẩm</a>
				</li>

				<li>
					<a href="thongtin.php">Thông Tin</a>
				</li>

				<li>
					<a href="lienhe.php">Liên Hệ</a>
				</li>
			</ul>
		</div>

	</header>

	<!-- Cart -->
	<!-- <div class="wrap-header-cart js-panel-cart">
		<div class="s-full js-hide-cart"></div>

		<div class="header-cart flex-col-l p-l-65 p-r-25">
			<div class="header-cart-title flex-w flex-sb-m p-b-8">
				<span class="mtext-103 cl2">
					Giỏ Hàng
				</span>

				<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>
			
			<div class="header-cart-content flex-w js-pscroll">
				<ul class="header-cart-wrapitem w-full">
					<li class="header-cart-item flex-w flex-t m-b-12">
						<div class="header-cart-item-img">
							<img src="images/item-cart-01.jpg" alt="IMG">
						</div>

						<div class="header-cart-item-txt p-t-8">
							<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
								White Shirt Pleat
							</a>

							<span class="header-cart-item-info">
								1 x $19.00
							</span>
						</div>
					</li>
				</ul>
				
				<div class="w-full">
					<div class="header-cart-total w-full p-tb-40">
						Total: $75.00
					</div>

					<div class="header-cart-buttons flex-w w-full">
						<a href="giohang.php" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
							Thanh Toán
						</a>
					</div>
				</div>
			</div>
		</div>
	</div> -->
