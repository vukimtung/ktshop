<!DOCTYPE html>
<html lang="en">
<title>Tài Khoản Của Bạn || KT-Cake</title>
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
		<div class="flex-w flex-tr" style="background: linear-gradient(-180deg, rgb(212 244 209), rgb(230 168 190));">
				<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md txt-center" style="border: 1px solid #9e9e9e;">
					<form action="xulyfrontend/capnhattk.php" method="POST">
							<h4 class="" style="font-weight: bold !important; margin-bottom: 30px;">
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

				<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md" style="border: 1px solid #9e9e9e;">
						<h4 class="" style="font-family: Philosopher, sans-serif !important; font-weight: bold !important; text-align: center;">
							Danh Sách Địa Chỉ Giao Hàng Của Tôi
						</h4>

						<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModalCenter" style="margin-bottom: 5px;float: right;margin-top: 28px;">
							+ Thêm địa chỉ mới
						</button>
						<table class="table bor8 m-b-20 how-pos4-parent" style="margin-top: 5% !important;background: #fff;">
							<thead>
								<tr>
									<th scope="col">#</th>
									<th scope="col">Địa chỉ</th>
									<th scope="col" colspan="2"></th>
								</tr>
							</thead>
							<tbody>
							<?php
								include('phantrangfrontend/connect.php');
								$idkh = $_SESSION['customer_id'];
								$stt = 0;
								$sql="SELECT * FROM dc_khachhang WHERE id_kh = '$idkh'";
								$ketqua=mysqli_query($connect, $sql);
								while($row=mysqli_fetch_assoc($ketqua)){
									$stt++; ?>
								<tr>
								<th scope="row"><?php echo $stt;?></th>
								<td><?php echo $row['diachi_kh'];?></td>
								<td>
								<button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#message<?php echo $row['id_dc'];?>"><i class="fa fa-edit" aria-hidden="true"> Sửa</i></button>
								</td>
								<td>
									<a href="xulyfrontend/xoadiachikh.php?iddc=<?php echo $row['id_dc']?>" 
									style="" class="btn btn-default button-xoa btn-sm">
										<i class="fa fa-times" aria-hidden="true"> Xóa</i></a>
								</td>
								</tr>
								<!-- Modal sửa -->
								<div class="modal fade" id="message<?php echo $row['id_dc'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered" role="document">
									<div class="modal-content" style="margin-top: 200px;">
                  					<div class="modal-header" style="text-align: center; border-bottom: none;">
											<h2 class="modal-title" id="exampleModalLongTitle" style="color: red; font-weight: bold;">Sửa Địa Chỉ Giao Hàng</h2>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 35px;">
											<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
										<form role="form" action="xulyfrontend/xulysuadckh.php" method="POST">
										<div class="box-body">
											<div class="form-group">
											<label for="" style="font-weight:bold;">Địa chỉ của tôi</label>
											<input type="text" class="form-control" id="dckh" name="dckh" value="<?php echo $row['diachi_kh']?>">
											</div>
										</div>
										<div class="box-footer" style="background-color: unset; text-align: center;">
										<input type="hidden" value="<?php echo $row['id_dc']?>" name="form_id">
										<button type="submit" class="btn btn-primary" name="sua">Cập Nhật</button>
										</div>
										</div>
										</form>
										</div>
									</div>
									</div>
								<!-- end modal sửa -->

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
								<?php } ?>
							</tbody>
						</table>
				</div>
			</div>
		</div>
		<br><br>

		<div class=" p-t-43 p-b-40">
				<!-- Tab01 -->
				<div class="tab01">
					<!-- Nav tabs -->
					<div style="margin: 10px 175px;padding-top: 20px;padding-bottom: 10px;background: #f5f5f5;box-shadow: 0 1px 0 2px rgb(0 0 0 / 29%);">
						<ul class="nav nav-tabs" role="tablist">
							<li class="nav-item p-b-10">
								<a class="nav-link active" data-toggle="tab" href="#tatca" role="tab" style="background: #f5f5f5;"><i class="fa fa-clipboard-list"></i>&nbsp;Tất cả đơn hàng</a>
							</li>

							<li class="nav-item p-b-10">
								<a class="nav-link" data-toggle="tab" href="#moi" role="tab" style="background: #f5f5f5;"><i class="fa fa-clipboard-check"></i>&nbsp;Chờ xác nhận</a>
							</li>

							<li class="nav-item p-b-10">
								<a class="nav-link" data-toggle="tab" href="#layhang" role="tab" style="background: #f5f5f5;"><i class="fa fa-clock-o"></i></i>&nbsp;Chờ lấy hàng</a>
							</li>
							
							<li class="nav-item p-b-10">
								<a class="nav-link" data-toggle="tab" href="#danggiao" role="tab" style="background: #f5f5f5;"><i class="fa fa-shipping-fast"></i>&nbsp;Đang giao</a>
							</li>

							<li class="nav-item p-b-10">
								<a class="nav-link" data-toggle="tab" href="#dagiao" role="tab" style="background: #f5f5f5;"><i class="fa fa-box"></i>&nbsp;Đã giao</a>
							</li>

							<li class="nav-item p-b-10">
								<a class="nav-link" data-toggle="tab" href="#xacnhan" role="tab" style="background: #f5f5f5;"><i class="fa fa-check-double"></i>&nbsp;Xác nhận đã nhận hàng</a>
							</li>

							<li class="nav-item p-b-10">
								<a class="nav-link" data-toggle="tab" href="#dahuy" role="tab" style="background: #f5f5f5;"><i class="fa fa-times"></i>&nbsp;Đơn hàng đã hủy</a>
							</li>
						</ul>
					</div>
					<!-- Tab panes -->
					<div class="tab-content p-t-43">
						<!-- - -->
						<div class="tab-pane fade show active" id="tatca" role="tabpanel">
							<div class="row">
							<div class="col-lg-10 col-xl-9 m-lr-auto m-b-50">
									<div class="m-lr-0-xl">
										<h4 class="" style="font-weight: bold !important; text-align: center;">Đơn Hàng Của Bạn</h4>
										<div class="wrap-table-shopping-cart">
											<table class="table-shopping-cart">
												<tr class="table_head" style="background: linear-gradient(-180deg, rgb(242, 228, 159), rgb(244 142 151));">
													<th class="column-1">Đơn hàng</th>
													<th class="column-2">Tổng đơn</th>
													<th class="column-3">Hình thức thanh toán</th>
													<th class="column-3">Ngày đặt hàng</th>
													<th class="column-5">Tình trạng</th>
													<th class="column-3">Ngày giao hàng</th>
													<th class="column-6" colspan="2" style="text-align:center;">Tùy chọn</th>
												</tr>

												<?php
												$stt = 0;
												$idkh = $kq['id_cust'];
												
												$sql2 = "SELECT * FROM orders o LEFT JOIN customers c ON o.customer_id = c.id_cust WHERE customer_id = '$idkh' ORDER BY date_order DESC";
												$ketqua2 = $connect->query($sql2);
												while($kq2=$ketqua2->fetch_assoc()){ 
													$stt ++;

												?>
												<tr class="table_row" style="border-bottom: 2px solid white;">
													<td class="column-1">
															<?php echo $stt;?>
													</td>
													<td class="column-2"><?php echo number_format($kq2['total']);?> VND</td>
													<td class="column-3"> <?php echo $kq2['payment'];?></td>
													<td class="column-4"> <?php echo $kq2['date_order'];?></td>
													<td class="column-5"> <?php echo $kq2['status'];?></td>
													<td class="column-4"> <?php echo $kq2['delivery_date'];?></td>
													<?php
													if($kq2['status']=='Đơn hàng mới'){?>
														<td class="column-4">
															<a href="chitietdh.php?iddh=<?php echo $kq2['id_order']?>" class="btn btn-default button-xem">
																<i class="fa fa-eye" aria-hidden="true"> Xem</i></a>
														</td>
														<td class="column-7">
															<a href="xulyfrontend/huydonhang.php?iddh=<?php echo $kq2['id_order']?>" 
															style="" class="btn btn-default button-xoa">
																<i class="fa fa-times" aria-hidden="true"> Hủy</i></a>
														</td>
													<?php } elseif($kq2['status']=='Đã giao'){ ?>
															<td class="column-4">
																<a href="chitietdh.php?iddh=<?php echo $kq2['id_order']?>" class="btn btn-default button-xem"><i class="fa fa-eye" aria-hidden="true"> Xem</i></a>
															</td>
															<td class="column-7">
																<a href="xulyfrontend/xacnhangiaotc.php?iddh=<?php echo $kq2['id_order']?>" 
																style="" class="btn btn-warning">
																<i class="fa fa-check" aria-hidden="true"> Đã nhận hàng</i></a>
															</td>
														<?php } elseif($kq2['status']=='Đã hủy') { ?>
															<td class="column-4">
																<a href="chitietdh.php?iddh=<?php echo $kq2['id_order']?>" class="btn btn-default button-xem"><i class="fa fa-eye" aria-hidden="true"> Xem</i></a>
															</td>
															<td class="column-7">
																<a href="xulyfrontend/datlaidon.php?iddh=<?php echo $kq2['id_order']?>" class="btn btn-default button-xem"><i class="fa fa-edit" aria-hidden="true"> Đặt lại</i></a>
															</td>
														<?php } else { ?>
															<td class="column-4">
																<a href="chitietdh.php?iddh=<?php echo $kq2['id_order']?>" class="btn btn-default button-xem"><i class="fa fa-eye" aria-hidden="true"> Xem</i></a>
															</td>
														<?php } ?>
												</tr>
												<?php } ?>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>

						<!-- - -->
						<div class="tab-pane fade" id="moi" role="tabpanel">
							<div class="row">
							<div class="col-lg-10 col-xl-9 m-lr-auto m-b-50">
									<div class="m-lr-0-xl">
										<h4 class="" style="font-weight: bold !important; text-align: center;">Đơn Hàng Của Bạn</h4>
										<div class="wrap-table-shopping-cart">
											<table class="table-shopping-cart">
												<tr class="table_head" style="background: linear-gradient(-180deg, rgb(242, 228, 159), rgb(244 142 151));">
													<th class="column-1">Đơn hàng</th>
													<th class="column-2">Tổng đơn</th>
													<th class="column-3">Hình thức thanh toán</th>
													<th class="column-4">Ngày đặt hàng</th>
													<th class="column-5">Tình trạng</th>
													<th class="column-6" colspan="2" style="text-align:center;">Tùy chọn</th>
												</tr>

												<?php
												$stt = 0;
												$idkh = $kq['id_cust'];
												
												$sql2 = "SELECT * FROM orders o LEFT JOIN customers c ON o.customer_id = c.id_cust WHERE (customer_id = '$idkh') AND (status = 'Đơn hàng mới')";
												$ketqua2 = $connect->query($sql2);
												while($kq2=$ketqua2->fetch_assoc()){ 
													$stt ++;

												?>
												<tr class="table_row" style="border-bottom: 2px solid white;">
													<td class="column-1">
															<?php echo $stt;?>
													</td>
													<td class="column-2"><?php echo number_format($kq2['total']);?> VND</td>
													<td class="column-3"> <?php echo $kq2['payment'];?></td>
													<td class="column-4"> <?php echo $kq2['date_order'];?></td>
													<td class="column-5"> <?php echo $kq2['status'];?></td>
													<td class="column-4">
														<a href="chitietdh.php?iddh=<?php echo $kq2['id_order']?>" class="btn btn-default button-xem"><i class="fa fa-eye" aria-hidden="true"> Xem</i></a>
													</td>
													<td class="column-7">
														<a href="xulyfrontend/huydonhang.php?iddh=<?php echo $kq2['id_order']?>" class="btn btn-default button-xoa">
															<i class="fa fa-times" aria-hidden="true"> Hủy</i></a>
													</td>
												</tr>
												<?php } ?>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>

						<!-- - -->
						<div class="tab-pane fade" id="layhang" role="tabpanel">
							<div class="row">
							<div class="col-lg-10 col-xl-9 m-lr-auto m-b-50">
									<div class="m-lr-0-xl">
										<h4 class="" style="font-weight: bold !important; text-align: center;">Đơn Hàng Của Bạn</h4>
										<div class="wrap-table-shopping-cart">
											<table class="table-shopping-cart">
												<tr class="table_head" style="background: linear-gradient(-180deg, rgb(242, 228, 159), rgb(244 142 151));">
													<th class="column-1">Đơn hàng</th>
													<th class="column-2">Tổng đơn</th>
													<th class="column-3">Hình thức thanh toán</th>
													<th class="column-4">Ngày đặt hàng</th>
													<th class="column-5">Tình trạng</th>
													<th class="column-6" style="text-align:center;">Tùy chọn</th>
												</tr>

												<?php
												$stt = 0;
												$idkh = $kq['id_cust'];
												
												$sql2 = "SELECT * FROM orders o LEFT JOIN customers c ON o.customer_id = c.id_cust WHERE (customer_id = '$idkh') AND (status = 'Đã xác nhận')";
												$ketqua2 = $connect->query($sql2);
												while($kq2=$ketqua2->fetch_assoc()){ 
													$stt ++;

												?>
												<tr class="table_row" style="border-bottom: 2px solid white;">
													<td class="column-1">
															<?php echo $stt;?>
													</td>
													<td class="column-2"><?php echo number_format($kq2['total']);?> VND</td>
													<td class="column-3"> <?php echo $kq2['payment'];?></td>
													<td class="column-4"> <?php echo $kq2['date_order'];?></td>
													<td class="column-5"> <?php echo $kq2['status'];?></td>
													<td class="column-4">
														<a href="chitietdh.php?iddh=<?php echo $kq2['id_order']?>" class="btn btn-default button-xem"><i class="fa fa-eye" aria-hidden="true"> Xem</i></a>
													</td>
												</tr>
												<?php } ?>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>

						<!-- - -->
						<div class="tab-pane fade" id="danggiao" role="tabpanel">
							<div class="row">
							<div class="col-lg-10 col-xl-9 m-lr-auto m-b-50">
									<div class="m-lr-0-xl">
										<h4 class="" style="font-weight: bold !important; text-align: center;">Đơn Hàng Của Bạn</h4>
										<div class="wrap-table-shopping-cart">
											<table class="table-shopping-cart">
												<tr class="table_head" style="background: linear-gradient(-180deg, rgb(242, 228, 159), rgb(244 142 151));">
													<th class="column-1">Đơn hàng</th>
													<th class="column-2">Tổng đơn</th>
													<th class="column-3">Hình thức thanh toán</th>
													<th class="column-4">Ngày đặt hàng</th>
													<th class="column-5">Tình trạng</th>
													<th class="column-4" style="text-align:center;">Tùy chọn</th>
												</tr>

												<?php
												$stt = 0;
												$idkh = $kq['id_cust'];
												
												$sql2 = "SELECT * FROM orders o LEFT JOIN customers c ON o.customer_id = c.id_cust WHERE (customer_id = '$idkh') AND (status = 'Đang giao')";
												$ketqua2 = $connect->query($sql2);
												while($kq2=$ketqua2->fetch_assoc()){ 
													$stt ++;

												?>
												<tr class="table_row" style="border-bottom: 2px solid white;">
													<td class="column-1">
															<?php echo $stt;?>
													</td>
													<td class="column-2"><?php echo number_format($kq2['total']);?> VND</td>
													<td class="column-3"> <?php echo $kq2['payment'];?></td>
													<td class="column-4"> <?php echo $kq2['date_order'];?></td>
													<td class="column-5"> <?php echo $kq2['status'];?></td>
													<td class="column-4">
														<a href="chitietdh.php?iddh=<?php echo $kq2['id_order']?>" class="btn btn-default button-xem"><i class="fa fa-eye" aria-hidden="true"> Xem</i></a>
													</td>
												</tr>
												<?php } ?>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>

						<!-- - -->
						<div class="tab-pane fade" id="dagiao" role="tabpanel">
							<div class="row">
								<div class="col-lg-10 col-xl-9 m-lr-auto m-b-50">
									<div class="m-lr-0-xl">
										<h4 class="" style="font-weight: bold !important; text-align: center;">Đơn Hàng Của Bạn</h4>
										<div class="wrap-table-shopping-cart">
											<table class="table-shopping-cart">
												<tr class="table_head" style="background: linear-gradient(-180deg, rgb(242, 228, 159), rgb(244 142 151));">
													<th class="column-1">Đơn hàng</th>
													<th class="column-2">Tổng đơn</th>
													<th class="column-3">Hình thức thanh toán</th>
													<th class="column-3">Ngày đặt hàng</th>
													<th class="column-5">Tình trạng</th>
													<th class="column-3">Ngày giao hàng</th>
													<th class="column-4" colspan="2" style="text-align:center;">Tùy chọn</th>
												</tr>

												<?php
												$stt = 0;
												$idkh = $kq['id_cust'];
												
												$sql2 = "SELECT * FROM orders o LEFT JOIN customers c ON o.customer_id = c.id_cust WHERE customer_id = '$idkh' AND status = 'Đã giao' OR status = 'Nhận thành công'";
												$ketqua2 = $connect->query($sql2);
												while($kq2=$ketqua2->fetch_assoc()){ 
													$stt ++;

												?>
												<tr class="table_row" style="border-bottom: 2px solid white;">
													<td class="column-1">
															<?php echo $stt;?>
													</td>
													<td class="column-2"><?php echo number_format($kq2['total']);?> VND</td>
													<td class="column-3"> <?php echo $kq2['payment'];?></td>
													<td class="column-4"> <?php echo $kq2['date_order'];?></td>
													<td class="column-5"> 
														<?php 
															if($kq2['status']=='Đã giao') {
																echo "Đã giao";
															} else {
																echo "Đã giao, bạn đã xác nhận";
															}?>
													</td>
													<td class="column-4"> <?php echo $kq2['delivery_date'];?></td>
													<td class="column-4">
														<a href="chitietdh.php?iddh=<?php echo $kq2['id_order']?>" class="btn btn-default button-xem"><i class="fa fa-eye" aria-hidden="true"> Xem</i></a>
													</td>
													<?php 
														if($kq2['status']=='Đã giao') { ?>
															<td class="column-4">
																<a href="xulyfrontend/xacnhangiaotc.php?iddh=<?php echo $kq2['id_order']?>" 
																style="" class="btn btn-warning">
																<i class="fa fa-check" aria-hidden="true"> Đã nhận hàng</i></a>
															</td>
														<?php } ?>
												</tr>
												<?php } ?>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>

						<!-- - -->
						<div class="tab-pane fade" id="xacnhan" role="tabpanel">
							<div class="row">
							<div class="col-lg-10 col-xl-9 m-lr-auto m-b-50">
									<div class="m-lr-0-xl">
										<h4 class="" style="font-weight: bold !important; text-align: center;">Đơn Hàng Của Bạn</h4>
										<div class="wrap-table-shopping-cart">
											<table class="table-shopping-cart">
												<tr class="table_head" style="background: linear-gradient(-180deg, rgb(242, 228, 159), rgb(244 142 151));">
													<th class="column-1">Đơn hàng</th>
													<th class="column-2">Tổng đơn</th>
													<th class="column-3">Hình thức thanh toán</th>
													<th class="column-3">Ngày đặt hàng</th>
													<th class="column-5">Tình trạng</th>
													<th class="column-3">Ngày giao hàng</th>
													<th class="column-4" style="text-align:center;">Tùy chọn</th>
												</tr>

												<?php
												$stt = 0;
												$idkh = $kq['id_cust'];
												
												$sql2 = "SELECT * FROM orders o LEFT JOIN customers c ON o.customer_id = c.id_cust WHERE (customer_id = '$idkh') AND (status = 'Nhận thành công')";
												$ketqua2 = $connect->query($sql2);
												while($kq2=$ketqua2->fetch_assoc()){ 
													$stt ++;
												?>
												<tr class="table_row" style="border-bottom: 2px solid white;">
													<td class="column-1">
															<?php echo $stt;?>
													</td>
													<td class="column-2"><?php echo number_format($kq2['total']);?> VND</td>
													<td class="column-3"> <?php echo $kq2['payment'];?></td>
													<td class="column-4"> <?php echo $kq2['date_order'];?></td>
													<td class="column-5"> <?php echo $kq2['status'];?></td>
													<td class="column-4"> <?php echo $kq2['delivery_date'];?></td>
													<td class="column-4">
														<a href="chitietdh.php?iddh=<?php echo $kq2['id_order']?>" class="btn btn-default button-xem"><i class="fa fa-eye" aria-hidden="true"> Xem</i></a>
													</td>
												</tr>
												<?php } ?>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>

						<!-- - -->
						<div class="tab-pane fade" id="dahuy" role="tabpanel">
							<div class="row">
							<div class="col-lg-10 col-xl-9 m-lr-auto m-b-50">
									<div class="m-lr-0-xl">
										<h4 class="" style="font-weight: bold !important; text-align: center;">Đơn Hàng Của Bạn</h4>
										<div class="wrap-table-shopping-cart">
											<table class="table-shopping-cart">
												<tr class="table_head" style="background: linear-gradient(-180deg, rgb(242, 228, 159), rgb(244 142 151));">
													<th class="column-1">Đơn hàng</th>
													<th class="column-2">Tổng đơn</th>
													<th class="column-3">Hình thức thanh toán</th>
													<th class="column-4">Ngày đặt hàng</th>
													<th class="column-5">Tình trạng</th>
													<th class="column-6" colspan="3" style="text-align:center;">Tùy chọn</th>
												</tr>

												<?php
												$stt = 0;
												$idkh = $kq['id_cust'];
												
												$sql2 = "SELECT * FROM orders o LEFT JOIN customers c ON o.customer_id = c.id_cust WHERE (customer_id = '$idkh') AND (status = 'Đã hủy')";
												$ketqua2 = $connect->query($sql2);
												while($kq2=$ketqua2->fetch_assoc()){ 
													$stt ++;
												?>
												<tr class="table_row" style="border-bottom: 2px solid white;">
													<td class="column-1">
															<?php echo $stt;?>
													</td>
													<td class="column-2"><?php echo number_format($kq2['total']);?> VND</td>
													<td class="column-3"> <?php echo $kq2['payment'];?></td>
													<td class="column-4"> <?php echo $kq2['date_order'];?></td>
													<td class="column-5"> <?php echo $kq2['status'];?></td>
													<td class="column-6">
														<a href="chitietdh.php?iddh=<?php echo $kq2['id_order']?>" class="btn btn-default button-xem"><i class="fa fa-eye" aria-hidden="true"> Xem</i></a>
													</td>
													<td class="column-7">
														<a href="xulyfrontend/datlaidon.php?iddh=<?php echo $kq2['id_order']?>" class="btn btn-default button-xem"><i class="fa fa-edit" aria-hidden="true"> Đặt lại</i></a>
													</td>
													<td class="column-8">
														<a href="xulyfrontend/xoadonhang.php?iddh=<?php echo $kq2['id_order']?>" class="btn btn-default button-xoa"><i class="fa fa-times" aria-hidden="true"> Xóa</i></a>
													</td>
												</tr>
												<?php } ?>
											</table>
										</div>
									</div>
								</div>
							</div>
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