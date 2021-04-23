<!DOCTYPE html>
<html lang="en">
<title>Thanh Toán || KT-Shop</title>
<link rel="SHORTCUT ICON"  href="https://www.facebook.com/images/emoji.php/v9/f64/1/16/1f370.png">
<?php 
session_start();
include("phantrangfrontend/sessionKH.php");
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
				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">
								<tr class="table_head">
									<th class="column-1">Sản Phẩm</th>
									<th class="column-2"></th>
									<th class="column-3">Giá</th>
									<th class="column-4">Số Lượng</th>
									<th class="column-5">Tổng Tiền</th>
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
									<td class="column-1">
										<div class="how-itemcart1">
											<img src="<?php echo $value['item_picture'];?>" alt="IMG">
										</div>
									</td>
									<td class="column-2"><?php echo $value['item_name'];?></td>
									<td class="column-3"><?php echo number_format($value['item_price']);?> VND</td>
									<td class="column-4"><?php echo $value['quantity']; ?></td>
									<td class="column-5"><?php echo number_format($tongtien);?> VND</td>
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

				<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
						<h4 class="mtext-109 cl2 p-b-30">
							Thông Tin Đặt Hàng
						</h4>
						<div class="flex-w flex-t bor12 p-t-15 p-b-30">
							<div class="size-208 w-full-ssm">
								<span class="stext-110 cl2">
									Địa Chỉ:
								</span>
							</div>

							<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
								<p class="stext-111 cl6 p-t-2">
									Vui lòng điền đầy đủ thông tin để tiến hàng mua hàng.
								</p>
								
								<div class="p-t-15">
									<form action="xulyfrontend/xulythanhtoan.php" method="POST">
									<div class="bor8 bg0 m-b-12">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="address" placeholder="Địa chỉ của bạn" required="">
									</div>

									<div class="bor8 bg0 m-b-12">
										<input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="phone" placeholder="Số điện thoại" required="">
									</div>

									<div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
										<select class="js-select2" name="hinhthuctt">
											<option value="">--Thanh Toán--</option>
											<option value="Tiền mặt">Tiền mặt khi nhận hàng</option>
										</select>
										<div class="dropDownSelect2"></div>
									</div>
								</div>
							</div>
						</div>

						<div class="flex-w flex-t bor12 p-b-13">
							<div class="size-208">
								<span class="stext-110 cl2">
									Thành Tiền:
								</span>
							</div>

							<div class="size-209">
								<span class="mtext-109 cl2">
									<?php echo number_format($thanhtien); ?> VND
								</span>
							</div>
						</div><br>

						<input type="hidden" name="total" value="<?php echo $thanhtien; ?>">
						<button type="submit" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer" name="thanhtoan">
							Thanh Toán
						</button><br>
						<button type="submit" class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer" name="ttonline">
							Thanh Toán Online Paypal
						</button>
						
					</form>
					
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