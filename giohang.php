<!DOCTYPE html>
<html lang="en">
<title>Giỏ Hàng || KT-Cake</title>
<?php 
session_start();
include("phantrangfrontend/head.php");
?>
<body class="animsition">
	
	<!-- Header -->
	<?php
	include("phantrangfrontend/header.php");
	?><br><br>

	<!-- Shoping Cart -->
	<div class="bg0 p-t-75 p-b-85">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 col-xl-8 m-lr-auto m-b-50">
					<div class="m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">
								<tr class="table_head" style="background: linear-gradient(-180deg, rgb(242, 228, 159), rgb(244 142 151));">
									<th class="column-1">Sản Phẩm</th>
									<th class="column-2"></th>
									<th class="column-3">Giá</th>
									<th class="column-4">Số Lượng</th>
									<th class="column-5">Tổng Tiền</th>
									<th class="column-6" colspan="2"></th>
								</tr>

								<?php
								if (isset($_SESSION['cart'])) {
									$thanhtien=0;
									$tongtien=0;
									foreach ($_SESSION['cart'] as $key => $value) { 
										$thanhtien=$thanhtien+$value['item_price']*$value['quantity'];
										$tongtien=$value['item_price']*$value['quantity'];
										?>

								<tr class="table_row">
									<td class="column-1" style="padding-left:5px;">
										<div class="how-itemcart1">
											<img src="<?php echo $value['item_picture'];?>" alt="IMG">
										</div>
									</td>
									<td class="column-2"><?php echo $value['item_name'];?></td>
									<td class="column-3"><?php echo number_format($value['item_price']);?> VND</td>

									<form action="xulyfrontend/capnhatspgiohang.php" method="POST">
									<td class="column-4">
										<div class="wrap-num-product flex-w m-l-auto m-r-0">
											<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-minus"></i>
											</div>

											<input name="quantity" class="mtext-104 cl3 txt-center num-product" type="number" name="num-product1" value="<?php echo $value['quantity']; ?>">

											<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
												<i class="fs-16 zmdi zmdi-plus"></i>
											</div>
										</div>
									</td>
									<td class="column-5"><?php echo number_format($tongtien);?> VND</td>

									<td class="column-6">
											<button class="btn btn-sm btn-success" name="capnhat">Cập nhật</button>
											<input type="hidden" name="item_name" value="<?php echo $value['item_name']; ?>">
										</form>

										<td class="column-6" style="padding-right:5px;">
										<form action="xulyfrontend/xoaspgiohang.php" method="POST">
											<button class="btn btn-sm btn-danger" name="xoa">Xóa</button>
											<input type="hidden" name="item_name" value="<?php echo $value['item_name']; ?>">
										</form>
									</td>
									</td>
								</tr>
								<?php
										}
									} else {
										$thanhtien=0;
									}
								?>
							</table>
						</div>
					</div>
				</div>

				<div class="col-sm-10 col-lg-7 col-xl-4 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">

						<div class="flex-w flex-t bor12 p-b-13">
							<div class="">
								<span class="stext-110 cl2">
									Thành Tiền:
								</span>
							</div>

							<div class="size-209">
								<span class="mtext-109 cl2">
									<?php echo number_format($thanhtien); ?> VND
								</span>
							</div>
						</div>
						<button onclick="location.href='thanhtoan.php'" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
							Đặt Hàng
						</button>
					</div>
				</div>
			</div>
		</div>
	</div>
		
	
		

	<!-- Footer -->
	<?php 
	include("phantrangfrontend/footer.php");
	?>

</body>
</html>