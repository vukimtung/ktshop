<!DOCTYPE html>
<html>
<?php 
  include("phantrangshipper/head.php");
  include("phantrangshipper/session.php");
?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php 
  include("phantrangshipper/header.php");
  include("phantrangshipper/aside.php");
  ?>

  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">

          <div class="box">
            <div class="box-header">
              <h3 class="box-title" style="font-weight: bold;">Thông Tin Khách Hàng</h3>
            </div>
            <div class="box-body">
              <table id="" class="table table-bordered table-striped">
                <thead>
                <tr class="bg-success">
                  <th>Tên Khách Hàng</th>
                  <th>Địa Chỉ</th>
                  <th>Email</th>
                  <th>Số Điện Thoại</th>
                </tr>
                </thead>
                <tbody>
                <?php
                include('../phantrangfrontend/connect.php');
                $id_don = $_GET['id_dh'];
                $sql="SELECT * FROM orders o LEFT JOIN customers c ON o.customer_id = c.id_cust WHERE id_order = '$id_don'";
                $ketqua=$connect->query($sql);
                while ($kq=$ketqua->fetch_assoc()){ ?>
                  <tr>
                  <td><?php echo $kq['name_cust']?></td>
                  <td><?php echo $kq['address']?></td>
                  <td><?php echo $kq['email_cust']?></td>
                  <td><?php echo $kq['phone']?></td>
                </tr>
              </table>
            </div>
          </div>

          <div class="box">
            <div class="box-header">
              <h3 class="box-title" style="font-weight: bold;">Thông Tin Đơn Hàng</h3>
            </div>
            <div class="box-body">
              <table id="" class="table table-bordered table-striped">
                <thead>
                <tr class="bg-success">
                  <th>Hình Thức Thanh Toán</th>
                  <th>Ngày Đặt</th>
                  <th>Ngày Giao</th>
                  <th>Hình Ảnh Xác Nhận</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $id_don = $_GET['id_dh'];
                $sql1="SELECT * FROM orders WHERE id_order = '$id_don'";
                $ketqua1=$connect->query($sql1);
                while ($kq1=$ketqua1->fetch_assoc()){ ?>
                  <tr>
                  <td><?php echo $kq1['payment']?></td>
                  <td><?php echo $kq1['date_order']?></td>
                  <td><?php echo $kq1['delivery_date']?></td>
                  <?php 
                    if($kq['img_confirm']==''){
                      echo "<td></td>";
                    } else {
                  ?>
                  <td><img src="../<?php echo $kq['img_confirm']?>" alt="hình ảnh xác nhận" style="height: 120px; width: 120px; object-fit: cover;"></td>
                  <?php } ?>
                </tr>
                <?php } ?>
              </table>
            </div>
          </div>

          <div class="box">
            <div class="box-header">
              <h3 class="box-title" style="font-weight: bold;">Chi Tiết Sản Phẩm Của Đơn Hàng</h3>
            </div>
            <div class="box-body">
              <table id="" class="table table-bordered table-striped">
                <thead>
                <tr class="bg-success">
                  <th>Sản Phẩm</th>
                  <th>Số Lượng</th>
                  <th>Hình Ảnh Của Sản Phẩm</th>
                  <th>Giá</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $id_don = $_GET['id_dh'];
                $sql2="SELECT * FROM order_details o LEFT JOIN products p ON o.product_id = p.id_pro WHERE order_id = '$id_don'";
                $ketqua2=$connect->query($sql2);
                while ($kq2=$ketqua2->fetch_assoc()){ ?>
                  <tr>
                  <td><?php echo $kq2['name_pro']?></td>
                  <td><?php echo $kq2['quantity']?></td>
                  <td><img src="../<?php echo $kq2['picture']?>" alt="hình ảnh sản phẩm" style="height: 120px; width: 120px; object-fit: cover;"></td>
                  <td><?php echo number_format($kq2['unitprice'])?> VND</td>
                </tr>
                <?php } ?>
              </table>
              <div style="display: flex;">
                <button onclick="location.href='dsdonhang.php'" style="margin-right: 10px; " class="btn btn-default">Trở lại</button>
                <?php 
                      if($kq['status']=='Đã xác nhận'){ ?>
                      <a href="xulybackend/nhandonhang.php?id_dh=<?php echo $kq['id_order']?>" class="btn btn-warning"><i class="fa fa-check" aria-hidden="true"> Nhận đơn</i></a>
                      <?php } ?>
              </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
<?php
include('phantrangshipper/footer.php')
?>
</body>
</html>