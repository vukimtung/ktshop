<header class="main-header">
    <!-- Logo -->
    <a href="adminindex.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>NV</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Nhân Viên</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">...</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <?php
            include('../phantrangfrontend/connect.php');
            $sl1 = 0;
            $t1 = 0;
            $sql1="SELECT * FROM contact";
            $ketqua1=$connect->query($sql1);
            while ($kq1=$ketqua1->fetch_assoc()){ 
              $sl1++;
              $t1 = 1;
          ?>
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">1</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Thông báo ngày: <?php
                          $today = date("d/m/Y");
                          echo $today;
                        ?></li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="dslienhe.php">
                      <i class="fa fa-envelope-o" style="color: blue;"></i>&ensp; Bạn có <?php echo $sl1;?> tin nhắn.
                    </a>
                  </li>
                </ul>
              </li>
              <!-- <li class="footer"><a href="#">Xem tất cả</a></li> -->
            </ul>
          </li>
          <?php } ?>
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
                      $sl = 0;
                      $sql="SELECT * FROM orders WHERE status = 'Đơn hàng mới'";
                      $ketqua=$connect->query($sql);
                      while ($kq=$ketqua->fetch_assoc()){ 
                      $sl++; }
                     ?>
                      <li>
                        <a href="dsdonhang.php">
                          <i class="fa fa-users text-aqua"></i>Bạn có <?php echo $sl;?> đơn hàng mới.
                        </a>
                      </li>
                      <?php
                        $sl2 = 0;
                        $t = 0;
                        $sql2="SELECT * FROM nguyenlieu WHERE sl ='$t'";
                        $ketqua2=$connect->query($sql2);
                        while ($kq2=$ketqua2->fetch_assoc()){ 
                          $sl2++;}
                          if($sl2>0){
                      ?>
                      <li style="background: #f89898;">
                        <a href="dsnguyenlieu.php">
                          <i class="fa fa-users text-aqua"></i>Có <?php echo $sl2;?> nguyên liệu đã hết.
                        </a>
                      </li>
                     <?php }?>
        </ul>
      </div>
    </nav>
  </header>