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
      <h1 style="text-align: center; color: red; font-weight: bold;">Sửa Quyền</h1>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-sm-3">
        </div>
        <div class="col-sm-6" style="border-radius: 15px; border: 1px solid green; background: #f6f3f3;">
          <form role="form" action="xulybackend/xulysuaquyen.php" method="POST" enctype="multipart/form-data">

            <?php
            $newid=$_GET['up_id'];
            include('../phantrangfrontend/connect.php');
            $sql="SELECT * FROM roles WHERE id_r='$newid'";
            $ketqua=$connect->query($sql);
            $kq=$ketqua->fetch_assoc();
            ?>

              <div class="box-body">
                <div class="form-group">
                  <label for="name_pro">Tên quyền</label>
                  <input type="text" class="form-control" id="name_r" name="name_r" value="<?php echo $kq['ten_r']?>">
                </div>
                <div class="form-group">
                  <label for="description">Mô tả quyền</label>
                  <textarea class="form-control" id="description" name="description" rows="10" placeholder="Nhập mô tả quyền" required><?php echo $kq['mota_r']?></textarea>
                </div>
              <div class="box-footer" style="background-color: unset; text-align: center;">
                <input type="hidden" value="<?php echo $kq['id_r']?>" name="form_id">
                <button type="submit" class="btn btn-primary" name="sua">Sửa</button>
              </div>
        </form>
        </div>
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