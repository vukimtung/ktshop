<!DOCTYPE html>
<html>
<?php 
  include("phantrangadmin/head.php");
  include("phantrangadmin/session.php");
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
      <h1 style="text-align: center; color: red; font-weight: bold;">Sửa Nhà Cung Cấp</h1>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-sm-3">
        </div>
        <div class="col-sm-6" style="border-radius: 15px; border: 1px solid green; background: #f6f3f3;">
          <form role="form" action="xulybackend/xulysuancc.php" method="POST" enctype="multipart/form-data">

            <?php
            $newid=$_GET['up_id'];
            include('../phantrangfrontend/connect.php');
            $sql="SELECT * FROM nhacungcap WHERE id_n='$newid'";
            $ketqua=$connect->query($sql);
            $kq=$ketqua->fetch_assoc();
            ?>

              <div class="box-body">
                <div class="form-group">
                  <label for="name_pro">Tên Nhà Cung Cấp</label>
                  <input type="text" class="form-control" id="ten_n" name="ten_n" value="<?php echo $kq['ten_n']?>">
                </div>
                <div class="form-group">
                  <label for="name_pro">Địa Chỉ</label>
                  <input type="text" class="form-control" id="diachi_n" name="diachi_n" value="<?php echo $kq['diachi_n']?>">
                </div>
                <div class="form-group">
                  <label for="name_pro">Số Điện Thoại</label>
                  <input type="text" class="form-control" id="dienthoai_n" name="dienthoai_n" value="<?php echo $kq['dienthoai_n']?>">
                </div>
              <div class="box-footer" style="background-color: unset; text-align: center;">
                <input type="hidden" value="<?php echo $kq['id_n']?>" name="form_id">
                <button type="submit" class="btn btn-primary" name="sua">Sửa</button>
              </div>
        </form>
        </div>
      </div>
    </section>
    <div class="row center-block">
        <div class="col-sm-3" style="margin-bottom: 10px;">
        <button onclick="location.href='danhsachncc.php'" style="margin-right: 10px; ">Trở lại</button>
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
