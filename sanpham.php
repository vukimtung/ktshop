<!DOCTYPE html>
<html lang="en">
<title>Sản Phẩm || KT-Cake</title>
<?php 
session_start();
include("phantrangfrontend/head.php");
?>
<body class="animsition">
	
	<?php
	include("phantrangfrontend/header.php");
	?><br><br>
	<!-- Product -->
	<div class="bg0 m-t-23 p-b-140">
		<div class="container">
			<div class="flex-w flex-sb-m p-b-52" style="margin-top: 50px !important">
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

				<!-- <div class="flex-w flex-l-m filter-tope-group m-tb-10">
					<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
						Tất cả giá
					</button>
					<?php
						include('phantrangfrontend/connect.php');
						$sql="SELECT DISTINCT price FROM products ORDER BY price ASC";
						// $sql="SELECT DISTINCT price FROM products WHERE price<'100000'";
						$ketqua=$connect->query($sql);

						while($kq=$ketqua->fetch_assoc()){ ?>
						<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5" data-filter=".<?php echo $kq['price'];?>">
							<?php echo number_format($kq['price']);?>
						</button>
					<?php } ?>
				</div> -->

					<div class="flex-w flex-c-m m-tb-10">
                        <div class="col-12 col-md-10">
                            <form class="card card-sm" action="timkiemsp.php" method="POST">
                                <div class="card-body row no-gutters align-items-center" style="padding: 0px;">
                                    <!--end of col-->
                                    <div class="col">
									<input class="form-control form-control-lg form-control-borderless" id="search-input" type="text" placeholder="Từ khóa" style="border: none !important" name="tukhoa">
                                    </div>
                                    <!--end of col-->
                                    <div class="col-auto">
										<span class="microphone"><i class="fa fa-microphone"></i></span>&ensp;
                                        <button class="btn btn-lg btn-success" type="submit" name="timsp">Tìm</button>
                                    </div>
                                    <!--end of col-->
                                </div>
                            </form>
                        </div>
                        <!--end of col-->
                 </div>

			</div>

			<div class="row isotope-grid danhsach" >
				
				<?php
				include('phantrangfrontend/connect.php');
				$sql="SELECT * FROM products ORDER BY RAND()";
				$ketqua=$connect->query($sql);

				while($kq=$ketqua->fetch_assoc()) { ?>


				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item <?php echo $kq['category_id'];?> <?php echo $kq['price'];?>">
					<!-- Block2 -->
					<div class="block2">
						<div class="block2-pic hov-img0">
						<a href="chitietsp.php?idsp=<?php echo $kq['id_pro'];?>&iddm=<?php echo $kq['category_id'];?>">
						<img src="<?php echo $kq['picture'];?>" alt="IMG-PRODUCT" style="height: 250px; object-fit: cover;"></a>

							<a href="chitietsp.php?idsp=<?php echo $kq['id_pro'];?>&iddm=<?php echo $kq['category_id'];?>" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04"> <!--class="js-show-modal1" xem nhanh sản phẩm-->
								Xem
							</a>
						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								<a href="chitietsp.php?idsp=<?php echo $kq['id_pro'];?>&iddm=<?php echo $kq['category_id'];?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
									<?php echo $kq['name_pro'];?>
								</a>

								<span class="stext-105 cl3">
								<?php
										$idg = $kq['id_giagiam'];
										$g="SELECT * FROM giagiam WHERE id_gg = $idg";
										$ketqua2=$connect->query($g);
										  while($kq2=$ketqua2->fetch_assoc()) { 
										  if(($kq['price']) > ($kq['price'] - (($kq['price'] * $kq2['phantramgiam']) / 100))) {
											echo '<div><span style="text-decoration-line: line-through;">' . number_format($kq['price']). ' VND</span>&ensp;&ensp;' . '-'.$kq2['phantramgiam'].'%</div>';
											echo '<span style="font-weight: bold; font-size: 16px;">' . number_format($kq['price'] - (($kq['price'] * $kq2['phantramgiam']) / 100)). ' VND</span>';
										  } else {
											echo number_format($kq['price']). ' VND';
										  }
										}
									?>
								</span>
							</div>
<!-- 
							<form action="#" method="POST">
								<input type="hidden" name="" value="<?php echo $kq['id_pro'];?>">
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
				<a href="#" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
					Xem Thêm
				</a>
			</div>
		</div>
	</div>
		

	<?php 
	include("phantrangfrontend/footer.php");
	?>
</body>
</html>