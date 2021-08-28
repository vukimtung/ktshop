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
      <h1 style="text-align: center; color: red; font-weight: bold;">Thêm Nhà Cung Cấp</h1>
      <ol class="breadcrumb">
        <li><a href="adminindex.php"><i class="fa fa-dashboard"></i>Admin</a></li>
        <li class="active">Thêm nhà cung cấp</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-sm-3">
        </div>
        <div class="col-sm-6" style="border-radius: 15px; border: 1px solid green; background: #f6f3f3;">
          <form role="form" action="xulybackend/xulythemncc.php" method="POST" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="name_pro">Tên Nhà Cung Cấp</label>
                  <input type="text" class="form-control" id="ten_n" name="ten_n" placeholder="Nhập tên nhà cung cấp" required>
                </div>

                <div class="form-group">
                  <label for="name_pro">Địa Chỉ</label>
                  <input type="text" class="form-control" id="diachi_n" name="diachi_n" placeholder="Nhập địa chỉ" required>
                </div>

                <div class="form-group">
                  <label for="price">Số Điện Thoại</label>
                  <input type="text" class="form-control" id="dienthoai_n" name="dienthoai_n" placeholder="Nhập số điện thoại" required>
                </div>

              <div class="box-footer" style="background-color: unset; text-align: center;">
                <button type="submit" class="btn btn-primary" name="them">Thêm</button>
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
  <script type="text/javascript">
    CKEDITOR.replace('description');
  </script>
  <script>
    document.getElementById("picture").onchange = function () {
    var reader = new FileReader();

    reader.onload = function (e) {
        // get loaded data and render thumbnail.
        document.getElementById("image").src = e.target.result;
    };

    // read the image file as a data URL.
    reader.readAsDataURL(this.files[0]);
    };
  </script>
</body>
</html>
