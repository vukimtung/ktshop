<!DOCTYPE html>
<html lang="en">
<title>Chi Tiết Đơn Hàng || KT-Cake</title>
<?php 
session_start();
include("phantrangfrontend/head.php");
include("phantrangfrontend/sessionKH.php");
include("phantrangfrontend/connect.php");
?>

<body class="animsition">
	
	<?php
	include("phantrangfrontend/header.php");
	?>
	
	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/slider3.jpg');">
		<h2 class="ltext-105 txt-center" style="color: #d10909;">
			Chi Tiết Đơn Hàng
		</h2>
	</section>	


	<!-- Content page -->
	<section class="bg0 p-t-104 p-b-116">
			<div class="row">
				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<h4 class="" style="font-family: Philosopher, sans-serif !important; font-weight: bold !important; text-align: center;">Thông Tin Đơn Hàng Của Bạn</h4>
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">
								<tr class="table_head">
									<th class="column-1">STT</th>
									<th class="column-2">Tên sản phẩm</th>
									<th class="column-3">Hình ảnh</th>
									<th class="column-4">Giá</th>
									<th class="column-5">Số lượng</th>
								</tr>

								<?php
									$stt = 0;
									$id_don = $_GET['iddh'];
					                $sql="SELECT * FROM order_details o LEFT JOIN products p ON o.product_id = p.id_pro WHERE order_id = '$id_don'";
					                $ketqua=$connect->query($sql);
					                while ($kq=$ketqua->fetch_assoc()){ 
					                	$stt ++;
					                ?>

								<tr class="table_row">
									<td class="column-1">
											<?php echo $stt;?>
									</td>
									<td class="column-2"><?php echo $kq['name_pro']?></td>
									<td class="column-3"><img src="<?php echo $kq['picture']?>" alt="hình ảnh sản phẩm" style="height: 120px; width: 120px; object-fit: cover;"></td>
									<td class="column-4"><?php echo number_format($kq['price']);?> VND</td>
									<td class="column-5"><?php echo $kq['quantity']?></td>
								</tr>
								<?php } ?>
							</table>
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