<!DOCTYPE html>
<html>
<?php 
  include("phantrangnhanvien/session.php");
  include("phantrangnhanvien/head.php");
?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php 
  include("phantrangnhanvien/header.php");
  include("phantrangnhanvien/aside.php");
  ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 style="text-align: center"></h1>
    </section>
    <!-- /.content -->

    <!-- Main content -->
    <section class="content">

      <!-- =========================================================== -->

      <!-- Small boxes (Stat box) -->
      <div class="row">
      <?php
          $stt = 0;
          include('../phantrangfrontend/connect.php');
          $sql="SELECT * FROM orders WHERE status='Đơn hàng mới'";
          $ketqua=$connect->query($sql);
          while ($kq=$ketqua->fetch_assoc()){ 
                    $stt++;
          }
                  ?>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $stt;?></h3>

              <p>Đơn hàng mới</p>
            </div>
            <div class="icon">
              <i class="fa fa-shopping-cart"></i>
            </div>
            <a href="dsdonhang.php" class="small-box-footer">
              Xem <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <?php
          $stt2 = 0;
          include('../phantrangfrontend/connect.php');
          $sql2="SELECT * FROM products";
          $ketqua2=$connect->query($sql2);
          while ($kq2=$ketqua2->fetch_assoc()){ 
                    $stt2++;
          }
                  ?>
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $stt2; ?></h3>

              <p>Sản phẩm</p>
            </div>
            <div class="icon">
              <i class="fa fa-calendar"></i>
            </div>
            <a href="danhsachsp.php" class="small-box-footer">
              Xem <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <?php
          $stt3 = 0;
          include('../phantrangfrontend/connect.php');
          $sql3="SELECT * FROM customers";
          $ketqua3=$connect->query($sql3);
          while ($kq3=$ketqua3->fetch_assoc()){ 
                    $stt3++;
          }
                  ?>
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $stt3; ?></h3>

              <p>Khách hàng</p>
            </div>
            <div class="icon">
              <!-- <i class="ion ion-pie-graph"></i> -->
              <i class="ion ion-person-add"></i>
            </div>
            <a href="dskhachhang.php" class="small-box-footer">
              Xem <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->

        <!-- /.col -->
        <div class="col-md-6">
          <!-- Box Comment -->
          
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->

  </div>
  <!-- /.content-wrapper -->
  <?php 
  include("phantrangnhanvien/footer.php");
  ?>
</body>
</html>
