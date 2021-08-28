<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../images/icons/anhcv.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['name_ad']; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class=" treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Quản lý danh mục</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="danhmucsp.php"><i class="fa fa-edit"></i>Xem danh mục</a></li>
            <li><a href="themdmsp.php"><i class="fa fa-edit"></i>Thêm danh mục</a></li>
          </ul>
        </li>

        <li class=" treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Quản lý sản phẩm</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="danhsachsp.php"><i class="fa fa-edit"></i>Xem danh sách sản phẩm</a></li>
            <li><a href="themsp.php"><i class="fa fa-edit"></i>Thêm sản phẩm</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Quản lý đơn hàng</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="dsdonhang.php"><i class="fa fa-edit"></i>Xem danh sách đơn hàng</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Quản lý bình luận</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="dsbinhluan.php"><i class="fa fa-edit"></i>Xem danh sách bình luận</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Quản lý liên hệ</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="dslienhe.php"><i class="fa fa-edit"></i>Danh sách liên hệ</a></li>
          </ul>
        </li>

        <li class="">
          <a href="phantrangadmin/dangxuat.php">
            <i class="fa fa-key"></i> <span>Đăng xuất</span></i>
            </span>
          </a>
        </li>
    </section>
    <!-- /.sidebar -->
  </aside>
