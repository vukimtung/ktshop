<!DOCTYPE html>
<html lang="en">
<title>Thanh Toán || KT-Cake</title>
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
								<tr class="table_head" style="background: linear-gradient(-180deg, rgb(242, 228, 159), rgb(244 142 151));">
									<th class="column-1">Hình ảnh</th>
									<th class="column-2">Tên sản phẩm</th>
									<th class="column-3">Giá</th>
									<th class="column-4">Số lượng</th>
									<th class="column-5">Tổng tiền</th>
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
					<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm" style="border-radius: 20px; background: linear-gradient( -180deg, rgb(212 244 209), rgb(230 168 190));">
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
									<p class="stext-111 cl6 p-t-2">Tên Khách Hàng</p>
									<div class="bor8 bg0 m-b-12">
									<?php
										if (isset($_SESSION['user_email_address'])){ ?>
											<input class="stext-111 cl8 plh3 size-111 p-lr-10" type="text" name="tenkh" value="<?php echo $_SESSION['user_first_name'].' '.$_SESSION['user_last_name'];?>">
										<?php } else if (isset($_SESSION['email'])){ ?>
										<input class="stext-111 cl8 plh3 size-111 p-lr-10" type="text" name="tenkh" value="<?php echo $_SESSION['name_cust'];?>">
										<?php } else { ?>
											<input class="stext-111 cl8 plh3 size-111 p-lr-10" type="text" name="tenkh" value="">
										<?php } ?>

									</div>

										<p class="stext-111 cl6 p-t-2">Địa Chỉ Nhận Hàng</p>
										
									<div class="m-b-10">
										<!-- <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="address" placeholder="Địa chỉ của bạn" required=""> -->
										<select class="stext-111 cl8 plh3 size-111 p-lr-10" name="address">
										<?php
											include('phantrangfrontend/connect.php');
											$idkh = $_SESSION['customer_id'];
											$sql="SELECT * FROM dc_khachhang WHERE id_kh = '$idkh'";
											$ketqua=mysqli_query($connect, $sql);
											while($row=mysqli_fetch_assoc($ketqua)){
											echo "<option value=".$row['id_dc'].">".$row['diachi_kh']."</option>";
											}
										?>
										</select>						
									</div>
										<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">
											+ Thêm địa chỉ mới
										</button>

									<p class="stext-111 cl6 p-t-10">Số Điện Thoại</p>
									<div class="bor8 bg0">
										<input class="stext-111 cl8 plh3 size-111 p-lr-10" type="text" name="phone" placeholder="Nhập số điện thoại" required="">
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

							<div class="size-209" style="text-align: center;">
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
							Thanh Toán Paypal &ensp;<img src="./images/icons/icon-pay-01.png"></img>
						</button>
						
					</form>
					
					</div>
				</div>
			</div>

			<!-- Modal thêm -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content" style="margin-top: 200px;">
                  <div class="modal-header" style="text-align: center; border-bottom: none;">
                      <h2 class="modal-title" id="exampleModalLongTitle" style="color: red; font-weight: bold;">Thêm địa chỉ nhận hàng</h2>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 35px;">
                      <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                  <form role="form" action="xulyfrontend/xulythemdckh.php" method="POST">
                    <div class="box-body">
                      <div class="form-group">
                        <label for="" style="font-weight:bold;">Địa chỉ mới</label>
                        <input type="text" class="form-control" id="dcnh" name="dcnh" placeholder="Nhập địa chỉ nhận hàng" required>
                      </div>
                    </div>
                    <div class="box-footer" style="background-color: unset; text-align: center;">
					<input type="hidden" name="idkh" value="<?php $idkhachhang = $_SESSION['customer_id']; echo $idkhachhang; ?>">
                      <button type="submit" class="btn btn-primary" name="hoanthanh">Thêm</button>
                    </div>
                  </form>
                  </div>
              </div>
            </div>
            <!-- end modal thêm -->
		</div>
	</div>
		
	<!-- Footer -->
	<?php 
	include("phantrangfrontend/footer.php");
	?>

</body>
</html>