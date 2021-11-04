<!DOCTYPE html>
<html lang="en">
<title>Sản Phẩm Tìm Kiếm || KT-Cake</title>
<?php 
session_start();
include("phantrangfrontend/head.php");
?>
<body class="animsition">
	
	<?php
	include("phantrangfrontend/header.php");
	?>

	
	<!-- Product -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/slider3.jpg');">
		<h2 class="ltext-105 txt-center" style="color: #d10909;">
			Sản phẩm chứa từ khóa "<?php 
				$key = $_POST['tukhoa'];
 				echo $key;
 			?>"
		</h2>
	</section>	
	<div class="bg0 m-t-23 p-b-140">
		<div class="container">
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
			</div>

			<div class="row isotope-grid danhsach" >
				
				<?php
				include('phantrangfrontend/connect.php');
				$key = $_POST['tukhoa'];
				$sql="SELECT * FROM products WHERE (name_pro LIKE '%$key%') OR (price LIKE '%$key%') ORDER BY id_pro DESC";
				$ketqua=$connect->query($sql);

				while($kq=$ketqua->fetch_assoc()) { ?>


				<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item <?php echo $kq['category_id'];?>">
					<!-- Block2 -->
					<div class="block2">
						<div class="block2-pic hov-img0">
							<img src="<?php echo $kq['picture'];?>" alt="IMG-PRODUCT" style="height: 250px; object-fit: cover;">

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
									<?php echo number_format($kq['price']);?> VND
								</span>
							</div>

							<!-- <div class="block2-txt-child2 flex-r p-t-3">
								<a href="#" class="btn-addwish-b2 dis-block pos-relative ">
									<img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">
									<img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
								</a>
							</div> -->
						</div>
					</div>
				</div>
			<?php }?>
			</div>

			<!-- Load more -->
			<div class="flex-c-m flex-w w-full p-t-45">
				<a href="sanpham.php" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
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