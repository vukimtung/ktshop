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
              <h3 class="box-title">Thông Tin Khách Hàng</h3>
            </div>
            <div class="box-body">
              <table id="" class="table table-bordered table-striped">
                <thead>
                <tr>
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
              <h3 class="box-title">Chi Tiết Đơn Hàng Số <?php echo $kq['id_order']?></h3><?php } ?>
            </div>
            <div class="box-body">
              <table id="" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sản Phẩm</th>
                  <th>Số Lượng</th>
                  <th>Hình Ảnh Của Sản Phẩm</th>
                </tr>
                </thead>
                <tbody>
                <?php
                include('../phantrangfrontend/connect.php');
                $id_don = $_GET['id_dh'];
                $sql="SELECT * FROM order_details o LEFT JOIN products p ON o.product_id = p.id_pro WHERE order_id = '$id_don'";
                $ketqua=$connect->query($sql);
                while ($kq=$ketqua->fetch_assoc()){ ?>
                  <tr>
                  <td><?php echo $kq['name_pro']?></td>
                  <td><?php echo $kq['quantity']?></td>
                  <td><img src="../<?php echo $kq['picture']?>" alt="hình ảnh sản phẩm" style="height: 120px; width: 120px; object-fit: cover;"></td>
                  <!-- <td>
                    <a href="" style="padding-right: 20px"><i class="fa fa-times" aria-hidden="true">.......</i></a>
                </td> -->
                </tr>
                <?php } ?>
              </table>
              <div style="display: flex;">
                <button onclick="location.href='dsdonhang.php'" style="margin-right: 10px; ">Trở lại</button>
               <form action="xulybackend/lamdonhang.php" method="POST">
                <input type="hidden" name="iddh" value="<?php echo $id_don;?>">
                 <button type="submit" name="lamdh">Làm đơn hàng này</button>
               </form>
              </div>
             
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