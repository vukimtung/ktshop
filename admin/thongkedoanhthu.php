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

    <?php
        include('../phantrangfrontend/connect.php');
        $sql11="SELECT SUM(total) as t FROM orders WHERE status !='Đã hủy'";
        $ketqua11=$connect->query($sql11);
        $kq11=$ketqua11->fetch_assoc();
        $sql12="SELECT SUM(thanhtien) as tt FROM donnhaphang";
        $ketqua12=$connect->query($sql12);
        $kq12=$ketqua12->fetch_assoc();
      ?>
      <div class="row" style="margin: 0 5px;">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-shopping-cart"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Tổng doanh số bán:</span>
              <span class="info-box-number"><?php echo number_format($kq11['t']);?>đ</span>
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-flag-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Nhập nguyên liệu:</span>
              <span class="info-box-number"><?php echo number_format($kq12['tt']);?>đ</span>
            </div>
          </div>
        </div>
        
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-star-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Tổng doanh thu:</span>
              <span class="info-box-number"><?php echo number_format($kq11['t'] - $kq12['tt']);?>đ</span>
            </div>
          </div>
        
      </div>
      <!-- /.row -->

      <!-- Chart -->
      <div class="row" style="margin-bottom: 10px">
        <div class="col-xs-12">
          <h2>Thống kê doanh số bán ra của sản phẩm</h2>
          <div id="chart-container" style="width:640px; height:auto;">
            <canvas id="mycanvas"></canvas>
          </div>
        </div>
      </div>


      <!-- /.row -->
      <div class="row">
        <div class="col-md-4 col-sm-4 col-xs-12">
          <div class="" style="border: 1px solid #143508; border-radius: 15px; margin-bottom: 10px;">
                  <form role="form" action="thongkedoanhthu.php" method="POST" enctype="multipart/form-data">
                      <div class="box-body">
                        <div class="form-group">
                        <label>Thống kê theo ngày</label>
                        <div class="input-group date">
                          <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                          </div>
                            <input type="date" class="form-control pull-right" id="ngaytk" name="ngaytk">
                          </div>
                        </div>
                      </div>

                      <div class="box-footer" style="background-color: unset; text-align: center;">
                        <button type="submit" class="btn btn-success" name="xemngay">Xem</button>
                      </div>
                </form>

          </div>
        </div>
        <!-- /.col -->

        <div class="col-md-4 col-sm-4 col-xs-12">
          <div class="" style="border: 1px solid #143508; border-radius: 15px; padding: 5px 0px; margin-bottom: 10px;">
                  <form role="form" action="thongkedoanhthu.php" method="POST" enctype="multipart/form-data">
                      <div class="box-body">
                        <div class="form-group">
                        <label>Thống kê theo tháng</label>
                        <div class="input-group date">
                        <label for="">Chọn tháng: &nbsp;</label>

                            <select name="thangt" id="thangt">
                            <option value="01">1</option>
                            <option value="02">2</option>
                            <option value="03">3</option>
                            <option value="04">4</option>
                            <option value="05">5</option>
                            <option value="06">6</option>
                            <option value="07">7</option>
                            <option value="08">8</option>
                            <option value="09">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            </select>

                            &ensp;<label for="cars">Chọn năm:&nbsp;</label>
                            <select name="namt" id="namt">
                              <?php
                                $sql14 = "SELECT LEFT(date_order,4) as n FROM orders GROUP BY n";
                                $ketqua14=mysqli_query($connect, $sql14);
                                while($row=mysqli_fetch_assoc($ketqua14)){
                                  echo "<option value=".$row['n'].">".$row['n']."</option>";
                                }
                              ?>
                            </select>
                          </div>
                        </div>
                      </div>

                      <div class="box-footer" style="background-color: unset; text-align: center;">
                        <button type="submit" class="btn btn-success" name="xemthang">Xem</button>
                      </div>
                </form>
                <div class="col-md-3 col-sm-6 col-xs-12">
            
                  </div>

          </div>
        </div>
        <!-- /.col -->

        <div class="col-md-4 col-sm-4 col-xs-12">
          <!-- Box Comment -->
        <div class="" style="border: 1px solid #143508; border-radius: 15px; padding: 5px 0px; margin-bottom: 10px;">
                <form role="form" action="thongkedoanhthu.php" method="POST" enctype="multipart/form-data">
                    <div class="box-body">
                      <div class="form-group">
                      <label>Thống kê theo quý</label>
                      <div class="input-group date">
                      <label for="">Chọn quý: &nbsp;</label>

                        <select name="quy" id="quy">
                        <option value="I">I (tháng 1,2,3)</option>
                        <option value="II">II (tháng 4,5,6)</option>
                        <option value="III">III (tháng 7,8,9)</option>
                        <option value="IV">IV (tháng 10,11,12)</option>
                        </select>

                        &ensp;<label for="">Chọn năm:&nbsp;</label>
                          <select name="namq" id="namq">
                            <?php
                              $sql15 = "SELECT LEFT(date_order,4) as n FROM orders GROUP BY n";
                              $ketqua15=mysqli_query($connect, $sql15);
                              while($row=mysqli_fetch_assoc($ketqua15)){
                                echo "<option value=".$row['n'].">".$row['n']."</option>";
                              }
                            ?>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="box-footer" style="background-color: unset; text-align: center;">
                      <button type="submit" class="btn btn-success" name="xemquy">Xem</button>
                    </div>
              </form>
        </div>
          <!-- /.box -->
        </div>
      </div><br>
      <!-- /.row -->

      <!-- thống kê theo ngày -->
      <div class="row">
      <?php
            if(isset($_POST['xemngay'])) {
            $t = $_POST['ngaytk'];
            $sql13="SELECT *, SUM(total) as tt FROM orders WHERE (date_order LIKE '%$t%') AND (status !='Đã hủy')";
            $ketqua13=$connect->query($sql13);
            while($kq13=$ketqua13->fetch_assoc()) {
              $sql133="SELECT *, SUM(thanhtien) as t FROM donnhaphang WHERE ngaynhap LIKE '%$t%'";
              $ketqua133=$connect->query($sql133);
              while($kq133=$ketqua133->fetch_assoc()) {
          ?>
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
                <ol class="breadcrumb">
                    <li> <h3>Thống kê doanh thu ngày: <?php echo $t; ?></h3></li>
                </ol>
            </div>
            <div class="box-body">
              <table id="" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Doanh số bán</th>
                  <th>Nhập nguyên liệu</th>
                  <th>Doanh thu</th>
                </tr>
                </thead>
                <tbody>
                
                  <tr>
                  <td><?php echo number_format($kq13['tt']);?>đ</td>
                  <td><?php echo number_format($kq133['t']);?>đ</td>
                  <td style="color: red; font-weight: bold;"><?php echo number_format($kq13['tt'] - $kq133['t']);?>đ</td>
                </tr>
              </table>
            </div>
            <?php } } } else {}?>
          </div>
        </div>
      
        

        <!-- thống kê theo tháng -->
          <?php
              if(isset($_POST['xemthang'])) {
              $th = $_POST['thangt'];
              $namt = $_POST['namt'];
              $sql111="SELECT *, SUM(total) as tt FROM orders WHERE (date_order LIKE '%-$th-%') AND (date_order LIKE '$namt-%') AND (status !='Đã hủy')";
              $ketqua111=$connect->query($sql111);
              while($kq111=$ketqua111->fetch_assoc()) {
                $sql112="SELECT *, SUM(thanhtien) as t FROM donnhaphang WHERE (ngaynhap LIKE '%-$th-%') AND (ngaynhap LIKE '$namt-%')";
                $ketqua112=$connect->query($sql112);
                while($kq112=$ketqua112->fetch_assoc()) {
            ?>
          <div class="col-xs-12 col-lg-12">
            <div class="box">
              <div class="box-header">
                  <ol class="breadcrumb">
                      <li> <h3>Thống kê doanh thu tháng: <?php echo $th .'/'. $namt; ?></h3></li>
                  </ol>
              </div>
              <div class="box-body">
                <table id="" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Doanh số bán</th>
                    <th>Nhập nguyên liệu</th>
                    <th>Doanh thu</th>
                  </tr>
                  </thead>
                  <tbody>
                  
                    <tr>
                    <td><?php echo number_format($kq111['tt']);?>đ</td>
                    <td><?php echo number_format($kq112['t']);?>đ</td>
                    <td style="color: red;font-weight: bold;"><?php echo number_format($kq111['tt'] - $kq112['t']);?>đ</td>
                  </tr>
                </table>
              </div>
              <?php } } } else { ?>
                <!-- thống kê theo quý -->

          <?php
              if(isset($_POST['xemquy'])) {
              $q = $_POST['quy'];
              $namq = $_POST['namq'];
              if($q=='I') {
                $sql122="SELECT *, SUM(total) as tt FROM orders WHERE (date_order LIKE '%-01-%') OR (date_order LIKE '%-02-%') OR (date_order LIKE '%-03-%') AND (date_order LIKE '$namq-%') AND (status !='Đã hủy')";
                $sql123="SELECT *, SUM(thanhtien) as t FROM donnhaphang WHERE (ngaynhap LIKE '%-01-%') OR (ngaynhap LIKE '%-02-%') OR (ngaynhap LIKE '%-03-%') AND (ngaynhap LIKE '$namq-%')";
              } elseif ($q=='II') {
                $sql122="SELECT *, SUM(total) as tt FROM orders WHERE (date_order LIKE '%-04-%') OR (date_order LIKE '%-04-%') OR (date_order LIKE '%-06-%') AND (date_order LIKE '$namq-%') AND (status !='Đã hủy')";
                $sql123="SELECT *, SUM(thanhtien) as t FROM donnhaphang WHERE (ngaynhap LIKE '%-04-%') OR (ngaynhap LIKE '%-05-%') OR (ngaynhap LIKE '%-06-%') AND (ngaynhap LIKE '$namq-%')";
              } elseif($q=='III') {
                $sql122="SELECT *, SUM(total) as tt FROM orders WHERE (date_order LIKE '%-07-%') OR (date_order LIKE '%-08-%') OR (date_order LIKE '%-09-%') AND (date_order LIKE '$namq-%') AND (status !='Đã hủy')";
                $sql123="SELECT *, SUM(thanhtien) as t FROM donnhaphang WHERE (ngaynhap LIKE '%-07-%') OR (ngaynhap LIKE '%-08-%') OR (ngaynhap LIKE '%-09-%') AND (ngaynhap LIKE '$namq-%')";
              } else {
                $sql122="SELECT *, SUM(total) as tt FROM orders WHERE (date_order LIKE '%-10-%') OR (date_order LIKE '%-11-%') OR (date_order LIKE '%-12-%') AND (date_order LIKE '$namq-%') AND (status !='Đã hủy')";
                $sql123="SELECT *, SUM(thanhtien) as t FROM donnhaphang WHERE (ngaynhap LIKE '%-10-%') OR (ngaynhap LIKE '%-11-%') OR (ngaynhap LIKE '%-12-%') AND (ngaynhap LIKE '$namq-%')";
              }
              $ketqua122=$connect->query($sql122);
              while($kq122=$ketqua122->fetch_assoc()) {
                $ketqua123=$connect->query($sql123);
                while($kq123=$ketqua123->fetch_assoc()) {
            ?>
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                  <ol class="breadcrumb">
                      <li> <h3>Thống kê doanh thu quý <?php echo $q .' năm '. $namq; ?></h3></li>
                  </ol>
              </div>
              <div class="box-body">
                <table id="" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Doanh số bán</th>
                    <th>Nhập nguyên liệu</th>
                    <th>Doanh thu</th>
                  </tr>
                  </thead>
                  <tbody>
                  
                    <tr>
                    <td><?php echo number_format($kq122['tt']);?>đ</td>
                    <td><?php echo number_format($kq123['t']);?>đ</td>
                    <td style="color: red; font-weight: bold;"><?php echo number_format($kq122['tt'] - $kq123['t']);?>đ</td>
                  </tr>
                </table>
              </div>
              <?php } } } else {}?>
          </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
      
    </section>
    <!-- /.content -->

  </div>
  <!-- /.content-wrapper -->
  <?php 
  include("phantrangadmin/footer.php");
  ?>

    <!-- ChartJS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <script type="text/javascript" src="js/jquery.min.js"></script>
  <script type="text/javascript" src="js/app.js"></script>

</body>
</html>
