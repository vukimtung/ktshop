<header class="main-header">
    <!-- Logo -->
    <a href="shipperindex.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>Ship</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Shipper</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">...</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Notifications: style can be found in dropdown.less -->
                  <li class="dropdown notifications-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <i class="fa fa-bell-o"></i>
                      <span class="label label-danger" style="top: 12px; right: 12px; padding: 3px 3px;">  </span>
                    </a>
                    <ul class="dropdown-menu">
                    <li class="header">Thông báo ngày: <?php
                                $today = date("d/m/Y");
                                echo $today;
                              ?></li>
                    <li>
                    <!-- inner menu: contains the actual data -->
                     <ul class="menu">
                     <?php
                      include('../phantrangfrontend/connect.php');
                      $idship = $_SESSION['id_s'];
                      $sl = 0;
                      $sql="SELECT * FROM orders WHERE status='Đã xác nhận' AND id_shipper = '$idship'";
                      $ketqua=$connect->query($sql);
                      while ($kq=$ketqua->fetch_assoc()){ 
                      $sl++; }
                     ?>
                      <li>
                        <a href="dsdhmoi.php">
                          <i class="fa fa-users text-aqua"></i>Bạn có <?php echo $sl;?> đơn hàng mới.
                        </a>
                      </li>

                      <?php
                      $idship = $_SESSION['id_s'];
                      $sl1 = 0;
                      $sql1="SELECT * FROM orders WHERE status='Đang giao' AND id_shipper = '$idship'";
                      $ketqua1=$connect->query($sql1);
                      while ($kq1=$ketqua1->fetch_assoc()){ 
                      $sl1++; }
                      if($sl1>0){
                      ?>
                      <li>
                        <a href="dhchuahthanh.php" class="bg-red">
                          <i class="fa fa-users text-aqua "></i>Bạn có <?php echo $sl1;?> đơn hàng chưa hoàn thành.
                        </a>
                      </li>
                      <?php } ?>
        </ul>
      </div>
    </nav>
  </header>