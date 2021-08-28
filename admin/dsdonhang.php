<!DOCTYPE html>
<html>
<?php 
  include("phantrangadmin/head.php");
  include("phantrangadmin/session.php");
?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php 
  include("phantrangadmin/header.php");
  include("phantrangadmin/aside.php");
  ?>

  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
            <h1 style="text-align: center; color: red; font-weight: bold;">Danh Sách Đơn Hàng </h1>
            </div>
            <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Đơn Hàng Số</th>
                  <th>Tên Khách Hàng</th>
                  <th>Tổng Đơn</th>
                  <th>Hình Thức Thanh Toán</th>
                  <th>Ngày Đặt</th>
                  <th>Trạng Thái</th>
                  <th>Tùy chọn</th>
                </tr>
                </thead>
                <tbody>
                <?php
                include('../phantrangfrontend/connect.php');
                $stt = 0;
                $sql="SELECT * FROM orders o LEFT JOIN customers c ON o.customer_id = c.id_cust ORDER BY date_order DESC";
                $ketqua=$connect->query($sql);
                while ($kq=$ketqua->fetch_assoc()){ 
                    $stt++;
                  ?>
                  <tr>
                  <td><?php echo $stt?></td>
                  <td><?php echo $kq['name_cust']?></td>
                  <td><?php echo number_format($kq['total']);?> VND</td>
                  <td><?php echo $kq['payment']?></td>
                  <td><?php echo $kq['date_order']?></td>
                  <td><?php echo $kq['status']?></td>
                  <td>
                    <?php
                      if(($kq['status']=="Đã giao") || ($kq['status']=="Nhận thành công")){?>
                        <a href="chitietdonhang.php?id_dh=<?php echo $kq['id_order']?>" style="padding-right: 20px" class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"> Xem</i></a>
                        <a href="xulybackend/xoadonhang.php?id_dh=<?php echo $kq['id_order']?>" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"> Xóa</i></a>
                        <a href="./indonhang/indonhang.php?id_dh=<?php echo $kq['id_order']?>" class="btn btn-primary"><i class="fa fa-print" aria-hidden="true"> In</i></a>
                     <?php } else {?>
                      <a href="chitietdonhang.php?id_dh=<?php echo $kq['id_order']?>" class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"> Xem</i></a>
                      <a href="./indonhang/indonhang.php?id_dh=<?php echo $kq['id_order']?>" class="btn btn-primary"><i class="fa fa-print" aria-hidden="true"> In</i></a>
                   <?php } ?>
                  
                </td>
                </tr>
                <?php } ?>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
<?php
include('phantrangadmin/footer.php')
?>
</body>
</html>