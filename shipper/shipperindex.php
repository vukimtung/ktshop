<!DOCTYPE html>
<html>
<?php 
  include("phantrangshipper/session.php");
  include("phantrangshipper/head.php");
?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php 
  include("phantrangshipper/header.php");
  include("phantrangshipper/aside.php");
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
          $idship = $_SESSION['id_s'];
          include('../phantrangfrontend/connect.php');
          $sql="SELECT * FROM orders WHERE status='Đã xác nhận' AND id_shipper = '$idship'";
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
            <a href="dsdhmoi.php" class="small-box-footer">
              Xem <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <?php
          $stt2 = 0;
          $sql2="SELECT * FROM orders WHERE status='Đang giao' AND id_shipper = '$idship'";
          $ketqua2=$connect->query($sql2);
          while ($kq2=$ketqua2->fetch_assoc()){ 
                    $stt2++;
          }
                  ?>
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $stt2; ?></h3>

              <p>Đơn hàng chưa hoàn thành</p>
            </div>
            <div class="icon">
              <i class="fa fa-calendar"></i>
            </div>
            <a href="dhchuahthanh.php" class="small-box-footer">
              Xem <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
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
  include("phantrangshipper/footer.php");
  ?>
</body>
</html>
