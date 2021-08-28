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
      <h1 style="text-align: center; color: red; font-weight: bold;">Sửa Danh Mục</h1>
      
    </section>
    <section class="content">
      <div class="row">
        <div class="col-sm-3">
        </div>
        <div class="col-sm-6">
          <form role="form" action="xulybackend/xulysuadm.php" method="POST" enctype="multipart/form-data">

            <?php
            $newid=$_GET['up_id'];
            include('../phantrangfrontend/connect.php');
            $sql="SELECT * FROM categories WHERE id_cate='$newid'";
            $ketqua=$connect->query($sql);
            $kq=$ketqua->fetch_assoc();
            ?>

              <div class="box-body">
                <div class="form-group">
                  <label for="name_pro">Tên danh mục sản phẩm</label>
                  <input type="text" class="form-control" id="name_cate" name="name_cate" value="<?php echo $kq['name_cate']?>">
                </div>
              <div class="box-footer" style="background-color: unset; text-align: center;">
                <input type="hidden" value="<?php echo $kq['id_cate']?>" name="form_id">
                <button type="submit" class="btn btn-primary" name="sua">Sửa</button>
              </div>
        </form>
        </div>
        <div class="col-sm-3"></div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php 
  include("phantrangadmin/footer.php");
  ?>
</body>
</html>
