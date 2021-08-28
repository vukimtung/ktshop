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
      <h1 style="text-align: center; color: red; font-weight: bold;">Thêm quyền </h1>
      <ol class="breadcrumb">
        <li><a href="adminindex.php"><i class="fa fa-dashboard"></i>Admin</a></li>
        <li class="active">Thêm quyền</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-sm-3">
        </div>
        <div class="col-sm-6" style="border-radius: 15px; border: 1px solid green; background: #f6f3f3;">
          <form role="form" action="xulybackend/xulythemquyen.php" method="POST">
              <div class="box-body">
                <div class="form-group">
                  <label for="name_cate">Tên quyền</label>
                  <input type="text" class="form-control" id="name_role" name="name_role" placeholder="Nhập tên quyền" required>
                </div>
                <div class="form-group">
                  <label for="description">Mô tả quyền</label>
                  <textarea class="form-control" id="description" name="description" rows="10" placeholder="Nhập mô tả quyền" required></textarea>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer" style="background-color: unset; text-align: center;">
                <button type="submit" class="btn btn-primary">Thêm</button>
              </div>
        </form>
        </div>
        <div class="col-sm-3"></div>
      </div>
    </section>
    <div class="row center-block">
        <div class="col-sm-3" style="margin-bottom: 10px;">
        <button onclick="location.href='danhsachquyen.php'" style="margin-right: 10px; ">Trở lại</button>
        </div>
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php 
  include("phantrangadmin/footer.php");
  ?>
</body>
</html>
