<!DOCTYPE html>
<html lang="en">
<title>KT-Cake</title>
<?php
session_start();
include("phantrangfrontend/head.php");
?>
<body class="animsition">
	
	<!-- Header -->
	<?php
	include("phantrangfrontend/header.php");
	include("phantrangfrontend/slider.php");
	include("phantrangfrontend/banner.php");
	?>
	


	<!-- Product -->
	<section class="bg0 p-t-23 p-b-140">
		<div class="container">
			<div class="p-b-10">
				<h3 class="ltext-102 trans-04 p-b-8" style="font-family: 'Montserrat-Bold' !important">
					Sản Phẩm
				</h3>
			</div>

			<div class="flex-w flex-sb-m p-b-52">
				<div class="flex-w flex-l-m filter-tope-group m-tb-10">
					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
						Tất cả
					</button>
					<?php
						include('phantrangfrontend/connect.php');
						$sql="SELECT * FROM categories";
						$ketqua=$connect->query($sql);

						while($kq=$ketqua->fetch_assoc()){ ?>
						<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".<?php echo $kq['id_cate'];?>">
							<?php echo $kq['name_cate'];?>
						</button>
					<?php } ?>
				</div>

				<div class="flex-w flex-c-m m-tb-10">
					<div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 m-tb-4 js-show-filter">
						<i class="icon-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-filter-list"></i>
						<i class="icon-close-filter cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
						 Lọc
					</div>
				</div>


				<!-- Tìm kiếm sản phẩm -->
				<div class="flex-w flex-c-m m-tb-10">
                        <div class="col-12 col-md-10">
                            <form class="card card-sm" action="timkiemsp.php" method="POST">
                                <div class="card-body row no-gutters align-items-center" style="padding: 0px;">
                                    <!--end of col-->
                                    <div class="col">
                                        <input class="form-control form-control-lg form-control-borderless" type="search" placeholder="Từ khóa" style="border: none !important" name="tukhoa">
                                    </div>
                                    <!--end of col-->
                                    <div class="col-auto">
                                        <button class="btn btn-lg btn-success" type="submit" name="timsp">Tìm</button>
                                    </div>
                                    <!--end of col-->
                                </div>
                            </form>
                        </div>
                        <!--end of col-->
                 </div>
				
				<!-- Filter -->
				<div class="dis-none panel-filter w-full p-t-10">
					<div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
						<div class="filter-col1 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Sắp xếp theo
							</div>

							<ul>
								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04 filter-link-active">
										Sản phẩm mới
									</a>
								</li>
							</ul>
						</div>

						<div class="filter-col2 p-r-15 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Giá
							</div>

							<ul>
								<li class="p-b-6">
									<a href="#" class="filter-link stext-106 trans-04 filter-link-active">
										Tất cả
									</a>
								</li>
							</ul>
						</div>

						<div class="filter-col4 p-b-27">
							<div class="mtext-102 cl2 p-b-15">
								Danh Mục
							</div>

							<div class="flex-w p-t-4 m-r--5">
								<?php
									include('phantrangfrontend/connect.php');
									$sql="SELECT * FROM categories";
									$ketqua=$connect->query($sql);

									while($kq=$ketqua->fetch_assoc()){ ?>
										<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".<?php echo $kq['id_cate'];?>">
											<?php echo $kq['name_cate'];?>
										</button>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="row isotope-grid danhsach">
				<?php
				include('phantrangfrontend/connect.php');
				$sql="SELECT * FROM products ORDER BY RAND() LIMIT 8";
				$ketqua=$connect->query($sql);

				while($kq=$ketqua->fetch_assoc()) { ?>


				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item <?php echo $kq['category_id'];?>">
					<!-- Block2 -->
					<div class="block2">
						<div class="block2-pic hov-img0">
							<img src="<?php echo $kq['picture'];?>" alt="IMG-PRODUCT" style="height: 250px; object-fit: cover;">

							<a href="chitietsp.php?idsp=<?php echo $kq['id_pro'];?>&iddm=<?php echo $kq['category_id'];?>" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
								Xem
							</a>
						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a href="chitietsp.php?idsp=<?php echo $kq['id_pro'];?>&iddm=<?php echo $kq['category_id'];?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
									<?php echo $kq['name_pro'];?>
								</a>

								<span class="stext-105 cl3">
									<?php echo number_format($kq['price']). ' VND';?>
								</span>
							</div>

							<!-- <form action="xulyfrontend/spyeuthich.php" method="POST">
								<input type="hidden" name="idsp" value="<?php echo $kq['id_pro'];?>">
								<input type="hidden" name="idsp" value="<?php echo $kq['name_pro'];?>">
								<input type="hidden" name="idsp" value="<?php echo $kq['price'];?>">
								<input type="hidden" name="idsp" value="<?php echo $kq['picture'];?>">
							<?php

								if ((!empty($_SESSION['user_email_address'])) || (!empty($_SESSION['email']))) { ?>
									<div class="block2-txt-child2 flex-r p-t-3">
											<button type="submit" name="yeuthich"><i class="far fa-heart"></i></button>
									</div>
								<?php } ?>
							</form> -->
						</div>
					</div>
				</div>
			<?php }?>
			</div>

			<!-- Load more -->
			<div class="flex-c-m flex-w w-full p-t-45">
				<a href="sanpham.php" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">Xem Thêm</a>
			</div>
		</div>
		
	</section>
	

	
	<?php 
	include("phantrangfrontend/footer.php");
	?>
</body>
</html>