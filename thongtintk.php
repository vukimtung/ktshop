<!DOCTYPE html>
<html lang="en">
<title>Tài Khoản Của Bạn || KT-Shop</title>
<?php 
session_start();
include("phantrangfrontend/head.php");
include("phantrangfrontend/sessionKH.php");
include('phantrangfrontend/connect.php');
include('config.php');
		if(isset($_SESSION['user_email_address'])){
			$emailkh = $_SESSION['user_email_address'];
			$sql="SELECT * FROM customers WHERE email_cust='$emailkh'";
			$results=$connect->query($sql);
			$kq=$results->fetch_assoc();
		} else if(isset($_SESSION['email'])){
			$emailkh = $_SESSION['email'];
			$sql="SELECT * FROM customers WHERE email_cust='$emailkh'";
			$results=$connect->query($sql);
			$kq=$results->fetch_assoc();
		} else {
		
	}
	?>

<body class="animsition">
	
	<?php
	include("phantrangfrontend/header.php");
	?>
	
	<!-- Title page -->
	<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/slider3.jpg');">
		<h2 class="ltext-105 txt-center" style="color: #d10909;">
			Tài Khoản Của Bạn
		</h2>
	</section>	


	<!-- Content page -->
	<section class="bg0 p-t-104 p-b-116">
		<div class="container">
			<div class="flex-w flex-tr">
				<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md txt-center" style="margin-left: 25% !important">
					<form action="xulyfrontend/capnhattk.php" method="POST">
						<h4 class="" style="font-family: Philosopher, sans-serif !important; font-weight: bold !important;">
							Thông Tin Cá Nhân
						</h4>

						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="name" value="<?php echo $kq['name_cust']; ?>"><i class="fa fa-user how-pos4 pointer-none"></i>
						</div>

						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="email" value="<?php echo $kq['email_cust']; ?>">
							<img class="how-pos4 pointer-none" src="images/icons/icon-email.png" alt="ICON">
						</div>

						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="password" value="<?php echo $kq['password']; ?>"><i class="fa fa-key how-pos4 pointer-none"></i>
						</div>

						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="phone" value="<?php echo $kq['phone_cust']; ?>"><i class="fa fa-phone how-pos4 pointer-none"></i>
						</div>

						<div style="display: flex;">
							<input type="hidden" name="idkh" value="<?php echo $kq['id_cust']; ?>">
							<button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer" style="margin-left: 25%; width: 40% !important">Cập Nhật</button>
						</div>
						
					</form>
				</div>
			</div>

		</div><br><br>


			<div class="row">
				<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
					<div class="m-l-25 m-r--38 m-lr-0-xl">
						<h4 class="" style="font-family: Philosopher, sans-serif !important; font-weight: bold !important; text-align: center;">Đơn Hàng Của Bạn</h4>
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">
								<tr class="table_head">
									<th class="column-1">Đơn hàng</th>
									<th class="column-2">Tổng đơn</th>
									<th class="column-3">Hình thức thanh toán</th>
									<th class="column-4">Ngày đặt hàng</th>
									<th class="column-5">Tình trạng</th>
									<th class="column-6" colspan="2"></th>
								</tr>

								<?php
								$stt = 0;
								$idkh = $kq['id_cust'];
								
								$sql2 = "SELECT * FROM orders o LEFT JOIN customers c ON o.customer_id = c.id_cust WHERE customer_id = '$idkh'";
								$ketqua2 = $connect->query($sql2);
								while($kq2=$ketqua2->fetch_assoc()){ 
									$stt ++;

								?>

							

								<tr class="table_row">
									<td class="column-1">
											<?php echo $stt;?>
									</td>
									<td class="column-2"><?php echo number_format($kq2['total']);?> VND</td>
									<td class="column-3"> <?php echo $kq2['payment'];?></td>
									<td class="column-4"> <?php echo $kq2['date_order'];?></td>
									<td class="column-5"> <?php echo $kq2['status'];?></td>
									<?php
									if($kq2['status']=='Đã giải quyết'){?>
                  						<td class="column-6">
											<a href="chitietdh.php?iddh=<?php echo $kq2['id_order']?>" style="padding-right: 20px"><i class="fa fa-edit" aria-hidden="true">Xem</i></a>
										</td>
									<?php } else{ ?>
											<td class="column-6">
												<a href="chitietdh.php?iddh=<?php echo $kq2['id_order']?>" style="padding-right: 20px"><i class="fa fa-edit" aria-hidden="true">Xem</i></a>
											</td>
										<td class="column-7">
											<a href="xulyfrontend/huydonhang.php?iddh=<?php echo $kq2['id_order']?>" style="padding-right: 20px"><i class="fa fa-times" aria-hidden="true">Hủy</i></a>
										</td>
										<?php } ?>
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