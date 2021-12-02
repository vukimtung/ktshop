<!DOCTYPE html>
<html>
<?php 
  include("phantrangadmin/session.php");
  include("phantrangadmin/head.php");
?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php 
  include("phantrangadmin/header.php");
  include("phantrangadmin/aside.php");
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

      <!-- <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-aqua">
            <span class="info-box-icon"><i class="fa fa-bookmark-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Bookmarks</span>
              <span class="info-box-number">41,410</span>

              <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
                  <span class="progress-description">
                    70% Increase in 30 Days
                  </span>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-green">
            <span class="info-box-icon"><i class="fa fa-thumbs-o-up"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Likes</span>
              <span class="info-box-number">41,410</span>

              <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
                  <span class="progress-description">
                    70% Increase in 30 Days
                  </span>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="fa fa-calendar"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Events</span>
              <span class="info-box-number">41,410</span>

              <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
                  <span class="progress-description">
                    70% Increase in 30 Days
                  </span>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-red">
            <span class="info-box-icon"><i class="fa fa-comments-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Comments</span>
              <span class="info-box-number">41,410</span>

              <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
                  <span class="progress-description">
                    70% Increase in 30 Days
                  </span>
            </div>
          </div>
        </div>
      </div> -->
      <!-- /.row -->

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
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <?php
          $stt1 = 0;
          include('../phantrangfrontend/connect.php');
          $sql1="SELECT * FROM nhanvien";
          $ketqua1=$connect->query($sql1);
          while ($kq1=$ketqua1->fetch_assoc()){ 
                    $stt1++;
          }
                  ?>
          <div class="small-box bg-green">
            <div class="inner">
              <!-- <h3>53<sup style="font-size: 20px">%</sup></h3> -->
              <h3><?php echo $stt1; ?></h3>

              <p>Nhân viên</p>
            </div>
            <div class="icon">
              <!-- <i class="ion ion-stats-bars"></i> -->
              <i class="ion ion-person"></i>
            </div>
            <a href="danhsachnhanvien.php" class="small-box-footer">
              Xem <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
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

      <!-- =========================================================== -->

      
      <!-- /.row -->

      <!-- =========================================================== -->

      <!-- /.row -->

      <!-- =========================================================== -->

      <!-- Direct Chat -->
      
      <!-- /.row -->


      <div class="row">
        <div class="col-md-4">
          <!-- Widget: user widget style 1 -->
      <!-- <h2 class="page-header">Sản phẩm bán chạy</h2> -->
          <div class="box box-widget widget-user-2" style="border: 1px solid #c4c1c1;">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-yellow">
              <div class="widget-user-image">
                <img class="img-circle" src="../images/pizza.jpg" alt="User Avatar">
              </div>
              <!-- /.widget-user-image -->
              <h3 class="widget-user-username" style="font-weight: 500;">Top Sản Phẩm Bán Chạy</h3>
              <!-- <h5 class="widget-user-desc">Lead Developer</h5> -->
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li style="color: #ee4b4b; padding: 0 15px; font-weight: 700;">Tên Sản Phẩm <span class="pull-right">Đã bán</span></li>
              <?php
                include('../phantrangfrontend/connect.php');
                $stt4 = 0;
                $sql4="SELECT *, SUM(quantity) as tong FROM order_details  GROUP BY product_id ORDER BY tong DESC limit 4";
                $ketqua4=$connect->query($sql4);
                while($kq4=$ketqua4->fetch_assoc()) {
                  $stt4++;
                $idsp = $kq4['product_id'];
                $sql5="SELECT * FROM products WHERE id_pro = $idsp";
                $ketqua5=$connect->query($sql5);
                while($kq5=$ketqua5->fetch_assoc()) {
              ?>
                <li><a href="#"><?php 
                echo $stt4 . '.&ensp;';
                echo $kq5['name_pro'];?> 
                <span class="pull-right"><?php echo $kq4['tong'];?> sp</span></a></li> <?php } }?>
              </ul>
            </div>
          </div>
          <!-- /.widget-user -->
        </div>
        <!-- /.col -->
        <div class="col-md-4">
          <!-- Widget: user widget style 1 -->
          <!-- <h2 class="page-header">Sản phẩm nhiều đánh giá</h2> -->
          <div class="box box-widget widget-user" style="border: 1px solid #c4c1c1;">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-aqua-active">
            <!-- <h5 class="widget-user-desc">Sản phẩm đánh giá nhiều nhất</h5> -->
              <h3 class="widget-user-username" style="text-align: center;font-weight: 500;">Sản phẩm đánh giá nhiều nhất</h3>
            </div>
            <?php
                $sql6="SELECT *, COUNT(idsp) as sl, avg(rating) as dg FROM comments  GROUP BY idsp ORDER BY sl DESC LIMIT 1";
                $ketqua6=$connect->query($sql6);
                while($kq6=$ketqua6->fetch_assoc()) {
                $id1 = $kq6['idsp'];
                $sql7="SELECT * FROM products WHERE id_pro = $id1";
                $ketqua7=$connect->query($sql7);
                while($kq7=$ketqua7->fetch_assoc()) {
              ?>
            <div class="widget-user-image">
              <img class="img-circle" src="../<?php echo $kq7['picture']; ?>" alt="Hình ảnh sản phẩm">
            </div>
            <div style="font-size: 24px; text-align: center;padding-top: 45px;margin-bottom: -15px;font-weight: 700;color: #f64c4c;">
            <span><?php echo $kq7['name_pro']; ?></span>
            </div>
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                  <h5 class="description-header"><?php echo number_format($kq6['dg'],1); ?> <i class="fa fa-star" style="color:#f9ba48;"></i></h5>
                    <!-- <span class="description-text">sao</span> -->
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header"></h5>
                    <span class="description-text"></span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4">
                  <div class="description-block">
                    <h5 class="description-header"><?php echo $kq6['sl']; ?> Đánh giá</h5>
                    <!-- <span class="description-text">Đánh giá</span> -->
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <?php } }?>
          </div>
          <!-- /.widget-user -->
        </div>
        <!-- /.col -->
        <div class="col-md-4">
          <!-- Widget: user widget style 1 -->
          <!-- <h2 class="page-header">Nhân viên tiêu biểu</h2> -->
          <div class="box box-widget widget-user" style="border: 1px solid #c4c1c1;">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-black" style="background: url('../dist/img/photo1.png') center center;">
            <h3 class="widget-user-username" style="text-align: center;font-weight: 500;">Nhân viên tiêu biểu</h3>
            </div>
            <?php
                $sql8="SELECT *, COUNT(id_nvien) as sl, SUM(total) as tong FROM orders GROUP BY id_nvien DESC LIMIT 1";
                $ketqua8=$connect->query($sql8);
                while($kq8=$ketqua8->fetch_assoc()) {
                $id2 = $kq8['id_nvien'];
                $sql9="SELECT * FROM nhanvien WHERE id_nv = $id2";
                $ketqua9=$connect->query($sql9);
                while($kq9=$ketqua9->fetch_assoc()) {
              ?>
            <div class="widget-user-image">
              <img class="img-circle" src="../<?php echo $kq9['avatar']; ?>" alt="Hình ảnh sản phẩm" style="width: 88px; height: 85px; background-size: cover;">
            </div>
            <div style="font-size: 24px; text-align: center;padding-top: 45px;margin-bottom: -32px;font-weight: 700;color: #f64c4c;">
            <span><?php echo $kq9['ten_nv']; ?></span>
            </div>
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                  <h5 class="description-header">Đã giải quyết: <br><?php echo $kq8['sl']; ?> đơn hàng</h5>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header"></h5>
                    <span class="description-text"></span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4">
                  <div class="description-block">
                    <h5 class="description-header">Doanh thu: <?php echo number_format($kq8['tong']); ?>đ</h5>
                    <!-- <span class="description-text">Đánh giá</span> -->
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <?php } } ?>
          </div>
          <!-- /.widget-user -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

        <!-- /.col -->
        <div class="col-md-6">
          <!-- Box Comment -->
          
          <!-- /.box -->
        </div>

        <div class="col-md-6">
            

           
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->

  </div>
  <!-- /.content-wrapper -->
  <?php 
  include("phantrangadmin/footer.php");
  ?>

<script>
  $(function () {
    "use strict";

    // AREA CHART
    var area = new Morris.Area({
      element: 'revenue-chart',
      resize: true,
      data: [
        {y: '2011 Q1', item1: 2666, item2: 2666},
        {y: '2011 Q2', item1: 2778, item2: 2294},
        {y: '2011 Q3', item1: 4912, item2: 1969},
        {y: '2011 Q4', item1: 3767, item2: 3597},
        {y: '2012 Q1', item1: 6810, item2: 1914},
        {y: '2012 Q2', item1: 5670, item2: 4293},
        {y: '2012 Q3', item1: 4820, item2: 3795},
        {y: '2012 Q4', item1: 15073, item2: 5967},
        {y: '2013 Q1', item1: 10687, item2: 4460},
        {y: '2013 Q2', item1: 8432, item2: 5713}
      ],
      xkey: 'y',
      ykeys: ['item1', 'item2'],
      labels: ['Item 1', 'Item 2'],
      lineColors: ['#a0d0e0', '#3c8dbc'],
      hideHover: 'auto'
    });

    // LINE CHART
    var line = new Morris.Line({
      element: 'line-chart',
      resize: true,
      data: [
        {y: '2011 Q1', item1: 2666},
        {y: '2011 Q2', item1: 2778},
        {y: '2011 Q3', item1: 4912},
        {y: '2011 Q4', item1: 3767},
        {y: '2012 Q1', item1: 6810},
        {y: '2012 Q2', item1: 5670},
        {y: '2012 Q3', item1: 4820},
        {y: '2012 Q4', item1: 15073},
        {y: '2013 Q1', item1: 10687},
        {y: '2013 Q2', item1: 8432}
      ],
      xkey: 'y',
      ykeys: ['item1'],
      labels: ['Item 1'],
      lineColors: ['#3c8dbc'],
      hideHover: 'auto'
    });

    //DONUT CHART
    var donut = new Morris.Donut({
      element: 'sales-chart',
      resize: true,
      colors: ["#3c8dbc", "#f56954", "#00a65a"],
      data: [
        {label: "Download Sales", value: 12},
        {label: "In-Store Sales", value: 30},
        {label: "Mail-Order Sales", value: 20}
      ],
      hideHover: 'auto'
    });
    //BAR CHART
    var bar = new Morris.Bar({
      element: 'bar-chart',
      resize: true,
      data: [
        {y: '2006', a: 100, b: 90},
        {y: '2007', a: 75, b: 65},
        {y: '2008', a: 50, b: 40},
        {y: '2009', a: 75, b: 65},
        {y: '2010', a: 50, b: 40},
        {y: '2011', a: 75, b: 65},
        {y: '2012', a: 100, b: 90}
      ],
      barColors: ['#00a65a', '#f56954'],
      xkey: 'y',
      ykeys: ['a', 'b'],
      labels: ['CPU', 'DISK'],
      hideHover: 'auto'
    });
  });
</script>
</body>
</html>
