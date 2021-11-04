<!DOCTYPE html>
<html lang="en">
<head>
<title>Chi Tiết Đơn Hàng || KT-Cake</title>

<link href="css/chitietdh.css" rel="stylesheet">

<?php 
session_start();
include("phantrangfrontend/head.php");
include("phantrangfrontend/sessionKH.php");
include("phantrangfrontend/connect.php");
?>
</head>

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

	<!-- Skill Section -->
	<section id="skills" class="skills section-bg">
            <div class="container">
				<h4 class="" style="font-family: Philosopher, sans-serif !important; font-weight: bold !important; text-align: center;">Trạng Thái Đơn Hàng</h4>
                <div class="row skills-content m-t-30">
                    <div class="col-lg-12" >
                        <div class="progress">
							<?php
								$id_dh = $_GET['iddh'];
								$sql1="SELECT * FROM orders WHERE id_order = '$id_dh'";
								$ketqua1=$connect->query($sql1);
								$kq1=$ketqua1->fetch_assoc();
								if($kq1['status']=='Đơn hàng mới') {
							?>
                            <span class="skills">
								<span class="s1"><i class="fa fa-clipboard-check"></i></span>
								<span class="s2"><i class="fa fa-clock-o"></i></i></span>
								<span class="s3"><i class="fa fa-shipping-fast"></i></span>
								<span class="s4"><i class="fa fa-box"></i></span>
								<span class="s5"><i class="fa fa-check-double"></i></span>
							</span>
                            <div class="progress-bar-wrap">
                                <div class="progress-bar1"></div>
                            </div>
							<?php } elseif($kq1['status']=='Đã xác nhận') {?>
								<span class="skills">
								<span class="s1"><i class="fa fa-clipboard-check"></i></span>
								<span class="s2"><i class="fa fa-clock-o"></i></i></span>
								<span class="s3"><i class="fa fa-shipping-fast"></i></span>
								<span class="s4"><i class="fa fa-box"></i></span>
								<span class="s5"><i class="fa fa-check-double"></i></span>
							</span>
                            <div class="progress-bar-wrap">
                                <div class="progress-bar2"></div>
                            </div>
							<?php } elseif($kq1['status']=='Đang giao') {?>
								<span class="skills">
								<span class="s1"><i class="fa fa-clipboard-check"></i></span>
								<span class="s2"><i class="fa fa-clock-o"></i></i></span>
								<span class="s3"><i class="fa fa-shipping-fast"></i></span>
								<span class="s4"><i class="fa fa-box"></i></span>
								<span class="s5"><i class="fa fa-check-double"></i></span>
							</span>
                            <div class="progress-bar-wrap">
                                <div class="progress-bar3"></div>
                            </div>
							<?php } elseif($kq1['status']=='Đã giao') {?>
								<span class="skills">
								<span class="s1"><i class="fa fa-clipboard-check"></i></span>
								<span class="s2"><i class="fa fa-clock-o"></i></i></span>
								<span class="s3"><i class="fa fa-shipping-fast"></i></span>
								<span class="s4"><i class="fa fa-box"></i></span>
								<span class="s5"><i class="fa fa-check-double"></i></span>
							</span>
                            <div class="progress-bar-wrap">
                                <div class="progress-bar4"></div>
                            </div>
							<?php } elseif($kq1['status']=='Nhận thành công') {?>
							<span class="skills">
								<span class="s1"><i class="fa fa-clipboard-check"></i></span>
								<span class="s2"><i class="fa fa-clock-o"></i></i></span>
								<span class="s3"><i class="fa fa-shipping-fast"></i></span>
								<span class="s4"><i class="fa fa-box"></i></span>
								<span class="s5"><i class="fa fa-check-double"></i></span>
							</span>
                            <div class="progress-bar-wrap">
                                <div class="progress-bar5"></div>
                            </div>
								<?php } else {} ?>
								<div style="margin-top:10px;">
									<span class="t1">Chờ xác nhận</span>
									<span class="t2">Đã xác nhận</span>
									<span class="t3">Đang giao</span>
									<span class="t4">Đã giao</span>
									<span class="t5">Đã nhận</span>
								</div>
                        </div>
                </div>
            </div>
        </section>
        <!-- End Skill Section -->

	<!-- Content page -->
	<section class="bg0 p-t-50">
			<div class="row">
				<div class="col-lg-10 col-xl-8 m-lr-auto m-b-35">
					<div class=" m-lr-0-xl">
						<h4 class="" style="font-family: Philosopher, sans-serif !important; font-weight: bold !important; text-align: center;">Thông Tin Đơn Hàng Của Bạn</h4>
						<div class="wrap-table-shopping-cart">
							<table class="table-shopping-cart">
								<tr class="table_head" style="background: linear-gradient(-180deg, rgb(242, 228, 159), rgb(244 142 151));">
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

								<tr class="table_row" style="border-bottom: 2px solid white;">
									<td class="column-1">
											<?php echo $stt;?>
									</td>
									<td class="column-2"><?php echo $kq['name_pro']?></td>
									<td class="column-3"><img src="<?php echo $kq['picture']?>" alt="hình ảnh sản phẩm" style="height: 120px; width: 120px; object-fit: cover;"></td>
									<td class="column-4"><?php echo number_format($kq['unitprice']);?> VND</td>
									<td class="column-5"><?php echo $kq['quantity']?></td>
								</tr>
								<?php } ?>
							</table>
						</div>
					</div>
				</div>
			</div>

			<?php
				$iddh = $_GET['iddh'];
				$sql1="SELECT * FROM orders o LEFT JOIN shipper s ON o.id_shipper = s.id_s WHERE id_order = '$iddh'";
				$ketqua1=$connect->query($sql1);
				$kq1=$ketqua1->fetch_assoc();
				if(isset($kq1['id_s'])){
			?>
				<div class="row">
					<div class="col-lg-10 col-xl-8 m-lr-auto m-b-35">
						<div class=" m-lr-0-xl">
							<h4 class="" style="font-family: Philosopher, sans-serif !important; font-weight: bold !important;">Thông Tin Shipper</h4>
							<div class="">
								<lable style="font-weight: bold;">Họ Tên: </lable><?php echo $kq1['ten_s']?><br>
								<lable style="font-weight: bold;">Số Điện Thoại: </lable><?php echo $kq1['dienthoai_s']?><br>
								<lable style="font-weight: bold;">Email: </lable><?php echo $kq1['email_s']?><br>
							</div>
						</div>
					</div>
				</div>
			<?php } ?>
	</section>	
	
	<?php 
	include("phantrangfrontend/footer.php");
	?>
</body>
</html>