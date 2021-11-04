<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <?php
            include('../phantrangfrontend/connect.php');
            $email_s = $_SESSION['email_s'];
            $sql="SELECT * FROM shipper WHERE email_s='$email_s'";
            $ketqua=$connect->query($sql);
            $kq=$ketqua->fetch_assoc();
          ?>
          <img src="../<?php echo $kq['avatar']?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['name_s']; ?></p>
          <!-- <a href="#"><i class="fa fa-circle text-success"></i> Online</a> -->
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
      <li class="">
          <a href="shipperindex.php">
            <i class="fa fa-table"></i> <span>Trang chủ</span>
          </a>
        </li>
        <li class="">
          <a href="thongtincanhan.php">
            <i class="fa fa-table"></i> <span>Thông tin cá nhân</span>
          </a>
        </li>

        <li class=" treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Quản lý đơn hàng</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="dsdonhang.php"><i class="fa fa-edit"></i>Tất cả đơn hàng của tôi</a></li>
            <li><a href="dsdhmoi.php"><i class="fa fa-edit"></i>Đơn hàng mới</a></li>
            <li><a href="dhchuahthanh.php"><i class="fa fa-edit"></i>Đơn hàng chưa hoàn thành</a></li>
          </ul>
        </li>
        
        <li class="">
          <a href="phantrangshipper/dangxuat.php">
            <i class="fa fa-key"></i> <span>Đăng xuất</span></i>
            </span>
          </a>
        </li>
    </section>
    <!-- /.sidebar -->
  </aside>
