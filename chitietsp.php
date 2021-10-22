<!DOCTYPE html>
<html lang="en">
<title>Chi Tiết || KT-Cake</title>

<?php 
session_start();
include("phantrangfrontend/head.php");
?>
<body class="animsition">
	
	<?php
	include("phantrangfrontend/header.php");
	?><br>
	<!-- Chi tiết sản phẩm -->
	<section class="sec-product-detail bg0 p-t-65 p-b-60" style="margin-top: 40px">
		<div class="container">
			<div class="row">
				<?php
				include('phantrangfrontend/connect.php');
				$idsp=$_GET['idsp'];
				$sql="SELECT * FROM products WHERE id_pro='$idsp'";
				$ketqua=$connect->query($sql);
				$kq=$ketqua->fetch_assoc();
				?>
				<div class="col-md-6 col-lg-7 p-b-30">
					<div class="p-l-25 p-r-30 p-lr-0-lg">
						<div class="wrap-slick3 flex-sb flex-w">
							<div class="wrap-slick3-dots"></div>
							<div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

							<div class="slick3 gallery-lb">
								<div class="item-slick3" data-thumb="<?php echo $kq['picture'];?>">
									<div class="wrap-pic-w pos-relative">
										<img src="<?php echo $kq['picture'];?>" alt="IMG-PRODUCT">

										<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="<?php echo $kq['picture'];?>">
											<i class="fa fa-expand"></i>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
					
				<div class="col-md-6 col-lg-5 p-b-30">
					<div class="p-r-50 p-t-5 p-lr-0-lg">
						<h4 class="mtext-105 cl2 js-name-detail p-b-14">
							<?php echo $kq['name_pro'];?>
						</h4>

						<span class="mtext-106 cl2">
							<?php
								$idg = $kq['id_giagiam'];
								$cart_price = 0;
								$g="SELECT * FROM giagiam WHERE id_gg = $idg";
								$ketqua2=$connect->query($g);
									while($kq2=$ketqua2->fetch_assoc()) { 
									if(($kq['price']) > ($kq['price'] - (($kq['price'] * $kq2['phantramgiam']) / 100))) {
									echo '<div>Giá: &ensp;<span style="text-decoration-line: line-through;">' . number_format($kq['price']). ' VND</span>&ensp;&ensp;' . '-'.$kq2['phantramgiam'].'%</div>';
									echo '<span style="font-weight: bold; font-size: 21px;color: red;">' . number_format($kq['price'] - (($kq['price'] * $kq2['phantramgiam']) / 100)). ' VND</span>';
									$cart_price = $kq['price'] - (($kq['price'] * $kq2['phantramgiam']) / 100);
									} else {
									echo 'Giá: &ensp;<span style="font-weight: bold; font-size: 21px;color: red;">' . number_format($kq['price']). ' VND</span>';
									$cart_price = $kq['price'];
									}
								}
							?>
						</span><br><br>
						<span class="mtext-106 cl2">
							Đơn vị tính: <?php echo $kq['unit'];?>
						</span><br><br>
						<!--  -->
						<div class="p-t-33">
							<!-- <div class="flex-w flex-r-m p-b-10">
								<div class="size-203 flex-c-m respon6">
									Kích thước
								</div>

								<div class="size-204 respon6-next">
									<div class="rs1-select2 bor8 bg0">
										<select class="js-select2" name="time">
											<option>Choose an option</option>
											<option>Size S</option>
											<option>Size M</option>
											<option>Size L</option>
											<option>Size XL</option>
										</select>
										<div class="dropDownSelect2"></div>
									</div>
								</div>
							</div> -->

							<div class="flex-w flex-r-m p-b-10">
								<div class="size-204 flex-w flex-m respon6-next">
									<!-- <div class="size-203 flex-c-m respon6">
											Số lượng
										</div>
									<div class="wrap-num-product flex-w m-r-20 m-tb-10">
										<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
											<i class="fs-16 zmdi zmdi-minus"></i>
										</div>

										<input class="mtext-104 cl3 txt-center num-product" type="number" name="soluong" value=1>

										<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
											<i class="fs-16 zmdi zmdi-plus"></i>
										</div>
									</div> -->
									<button onclick="location.href='xulyfrontend/themgiohang.php?cart_id=<?php echo $kq['id_pro']?>&cart_name=<?php echo $kq['name_pro']?>&cart_price=<?php echo $cart_price;?>&&cart_picture=<?php echo $kq['picture']?>'" class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 trans-04" name="addtocart">
										Thêm Giỏ Hàng
									</button>
								</div>
							</div>	
						</div>

						<!--  -->
						<!-- <div class="flex-w flex-m p-l-100 p-t-40 respon7">
							<div class="flex-m bor9 p-r-10 m-r-11">
								<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100" data-tooltip="Add to Wishlist">
									<i class="zmdi zmdi-favorite"></i>
								</a>
							</div>

							<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Facebook">
								<i class="fa fa-facebook"></i>
							</a>
							<a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Google Plus">
								<i class="fa fa-google-plus"></i>
							</a>
						</div> -->
					</div>
				</div>
			</div>

			<div class="bor10 m-t-50 p-t-43 p-b-40">
				<!-- Tab01 -->
				<div class="tab01">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item p-b-10">
							<a class="nav-link active" data-toggle="tab" href="#description" role="tab">Mô tả sản phẩm</a>
						</li>
						
						<li class="nav-item p-b-10">
							<a class="nav-link" data-toggle="tab" href="#reviews" role="tab">Nhận xét khách hàng</a>
						</li>
					</ul>

					<!-- Tab panes -->
					<div class="tab-content p-t-43">
						<!-- - -->
						<div class="tab-pane fade show active" id="description" role="tabpanel">
							<div class="how-pos2 p-lr-15-md">
								<p class="stext-102 cl6">
									<?php echo $kq['description'];?>
								</p>
							</div>
						</div>

						<!-- - -->
						<div class="tab-pane fade" id="reviews" role="tabpanel">
							<div class="row">
								<div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
									<div class="p-b-30 m-lr-15-sm">
										<!-- Review -->
										<?php
											include('phantrangfrontend/connect.php');
											$idsp=$_GET['idsp'];
											$sql1 = "SELECT * FROM comments AS c INNER JOIN customers AS k ON c.id_kh = k.id_cust WHERE idsp = '$idsp'";
											$ketqua1 = $connect->query($sql1);
											while ($kq1=$ketqua1->fetch_assoc()){ ?>
											<div class="flex-w flex-t p-b-68">
											<div class="wrap-pic-s size-109 bor0 of-hidden m-r-18 m-t-6">
												<img src="<?php echo $kq['picture'];?>" alt="AVATAR">
											</div>

											<div class="size-207">
												<div class="flex-w flex-sb-m p-b-17">
													<span class="mtext-107 cl2 p-r-20">
														<?php echo $kq1['name_cust']; ?>
													</span>

													<span class="fs-18 cl11">
														<?php 

														$num = $kq1['rating']; 
															for ($i=0; $i < $num; $i++) { ?>
																<i class="zmdi zmdi-star"></i>
															<?php }
														?>
													</span>
												</div>

												<p class="stext-102 cl6">
													<?php echo $kq1['review']; ?>
												</p>
											</div>
										</div>
										<?php } ?>

										<?php

										if ((!empty($_SESSION['user_email_address'])) || (!empty($_SESSION['email']))) { ?>
											
										
										<!-- Add review -->
										<form class="w-full" action="xulyfrontend/nhanxetsp.php" method="POST">
											<h5 class="mtext-108 cl2 p-b-7">
												Đánh giá sản phẩm
											</h5>

											<p class="stext-102 cl6">
												Vui lòng điền đầy đủ các mục bên dưới *
											</p>

											<div class="flex-w flex-m p-t-50 p-b-23">
												<span class="stext-102 cl3 m-r-16">
													Đánh giá
												</span>

												<span class="wrap-rating fs-18 cl11 pointer">
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<input class="dis-none" type="number" name="rating" required>
												</span>
											</div>

											<div class="row p-b-25">
												<div class="col-12 p-b-5">
													<label class="stext-102 cl3" for="review">Nhận xét của bạn về sản phẩm</label>
													<textarea class="size-110 bor8 stext-102 cl2 p-lr-20 p-tb-10" id="review" name="review" required></textarea>
												</div>

												<?php
													if (!empty($_SESSION['user_email_address'])){ 
														$email_khach = $_SESSION['user_email_address'];
													} else if (!empty($_SESSION['email'])){ 
																$email_khach = $_SESSION['email'];	
													} 
													$sql2 = "SELECT * FROM customers WHERE email_cust = '$email_khach'";
														$ketqua2 = $connect->query($sql2);
														while ($kq2=$ketqua2->fetch_assoc()){ ?>
														<input type="hidden" name="id_khach" value="<?php echo $kq2['id_cust']; ?>">
													<?php } ?>
											</div>
											
											<input type="hidden" name="idsp" value="<?php echo $kq['id_pro']; ?>">
												<button class="flex-c-m stext-101 cl0 size-112 bg7 bor11 hov-btn3 p-lr-15 trans-04 m-b-10">
													Gửi
											</button>

										</form>
										<?php } else { ?>
											<h5 class="mtext-108 cl2 p-b-7 " style="text-align: center;">
												Bạn cần đăng nhập để có thể đánh giá sản phẩm.
											</h5>
										<?php } ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="bg6 flex-c-m flex-w size-302 m-t-73 p-tb-15">
			<span class="stext-107 cl6 p-lr-25">
				Bạn đang xem sản phẩm <?php echo $kq['name_pro'];?>
			</span>
		</div>
	</section>


	<!-- Sản phẩm cùng loại -->
	<section class="sec-relate-product bg0 p-t-45 p-b-105">
		<div class="container">
			<div class="p-b-45">
				<h3 class="ltext-107 cl5 txt-center" style="font-family: Montserrat-Bold !important">
					Sản Phẩm Cùng Loại
				</h3>
			</div>

			<!-- Slide2 -->
			<div class="wrap-slick2">
				<div class="slick2">
					<?php
						include('phantrangfrontend/connect.php');
						$iddm=$_GET['iddm'];
						$idsp=$_GET['idsp'];
						$sql="SELECT * FROM products WHERE (category_id='$iddm') AND (id_pro<>$idsp) ORDER BY RAND() limit 4";
						$ketqua=$connect->query($sql);
						while ($kqua=$ketqua->fetch_assoc()) {
					?>
					<div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
						<!-- Block2 -->
						<div class="block2">
							<div class="block2-pic hov-img0">
							<a href="chitietsp.php?idsp=<?php echo $kqua['id_pro'];?>&iddm=<?php echo $kqua['category_id'];?>">
								<img src="<?php echo $kqua['picture'];?>" alt="IMG-PRODUCT" style="height: 250px; object-fit: cover;"></a>

								<a href="chitietsp.php?idsp=<?php echo $kqua['id_pro'];?>&iddm=<?php echo $kqua['category_id'];?>" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
									Xem
								</a>
							</div>

							<div class="block2-txt flex-w flex-t p-t-14">
								<div class="block2-txt-child1 flex-col-l ">
									<a href="chitietsp.php?idsp=<?php echo $kq['id_pro'];?>&iddm=<?php echo $kq['category_id'];?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
										<?php echo $kqua['name_pro'];?>
									</a>

									<span class="stext-105 cl3">
										<!-- <?php echo number_format($kqua['price']);?> VND -->
										<?php
										$idgg = $kqua['id_giagiam'];
										$gg="SELECT * FROM giagiam WHERE id_gg = $idgg";
										$ketqua3=$connect->query($gg);
										  while($kq3=$ketqua3->fetch_assoc()) { 
										  if(($kqua['price']) > ($kqua['price'] - (($kqua['price'] * $kq3['phantramgiam']) / 100))) {
											echo '<div><span style="text-decoration-line: line-through;">' . number_format($kqua['price']). ' VND</span>&ensp;&ensp;' . '-'.$kq3['phantramgiam'].'%</div>';
											echo '<span style="font-weight: bold; font-size: 16px;">' . number_format($kqua['price'] - (($kqua['price'] * $kq3['phantramgiam']) / 100)). ' VND</span>';
										  } else {
											echo number_format($kqua['price']). ' VND';
										  }
										}
									?>
									</span>
								</div>

								<!-- <div class="block2-txt-child2 flex-r p-t-3">
									<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
										<img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">
										<img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
									</a>
								</div> -->
							</div>
						</div>
					</div>
				<?php }?>
				</div>
			</div>
		</div>
	</section>
		

	<?php 
	include("phantrangfrontend/footer.php");
	?>
</body>
</html>