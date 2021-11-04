<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <?php
            include('../phantrangfrontend/connect.php');
            $email_nv = $_SESSION['email_nv'];
            $sql="SELECT * FROM nhanvien WHERE email_nv='$email_nv'";
            $ketqua=$connect->query($sql);
            $kq=$ketqua->fetch_assoc();
          ?>
          <img src="../<?php echo $kq['avatar']?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['ten_nv']; ?></p>
          <!-- <a href="#"><i class="fa fa-circle text-success"></i> Online</a> -->
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
      <li class="">
          <a href="trangchunhanvien.php">
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
            <i class="fa fa-table"></i> <span>Danh mục</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="danhmucsp.php"><i class="fa fa-edit"></i>Danh sách danh mục</a></li>
          </ul>
        </li>

        <li class=" treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Sản phẩm</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="danhsachsp.php"><i class="fa fa-edit"></i>Danh sách sản phẩm</a></li>
          </ul>
        </li>

        <li class=" treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Nguyên liệu</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="dsnguyenlieu.php"><i class="fa fa-edit"></i>Danh sách nguyên liệu</a></li>
          </ul>
        </li>

        <li class=" treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Đơn nhập hàng</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="dsdonnhaphang.php"><i class="fa fa-edit"></i>Danh sách đơn nhập hàng</a></li>
          </ul>
        </li>

        <li class=" treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Giảm giá sản phẩm</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="danhsachgiamgia.php"><i class="fa fa-edit"></i>Danh sách giảm giá</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Đơn hàng</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="dsdonhang.php"><i class="fa fa-edit"></i>Danh sách đơn hàng</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Bình luận</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="dsbinhluan.php"><i class="fa fa-edit"></i>Danh sách bình luận</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Liên hệ</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="dslienhe.php"><i class="fa fa-edit"></i>Danh sách liên hệ</a></li>
          </ul>
        </li>

        <li class=" treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Shipper</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="danhsachshipper.php"><i class="fa fa-edit"></i>Danh sách shipper</a></li>
          </ul>
        </li>

        <li class=" treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Nhà cung cấp</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="danhsachncc.php"><i class="fa fa-edit"></i>Danh sách nhà cung cấp</a></li>
          </ul>
        </li>

        <li class=" treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Khách hàng</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="dskhachhang.php"><i class="fa fa-edit"></i>Danh sách khách hàng</a></li>
          </ul>
        </li>

        <li class="">
          <a href="phantrangnhanvien/dangxuat.php">
            <i class="fa fa-key"></i> <span>Đăng xuất</span></i>
            </span>
          </a>
        </li>
    </section>
    <!-- /.sidebar -->
  </aside>
