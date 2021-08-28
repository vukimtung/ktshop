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
      <h1 style="text-align: center; color: red; font-weight: bold;">Thông Tin Nhân Viên</h1>
      <ol class="breadcrumb">
        <li><a href="adminindex.php"><i class="fa fa-dashboard"></i>Admin</a></li>
        <li class="active">thông tin nhân viên</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-sm-3">
        </div>
        <div class="col-sm-6" style="border-radius: 15px; border: 1px solid green; background: #f6f3f3;">
          <form role="form" action="xulybackend/xulysuashipper.php" method="POST" enctype="multipart/form-data">
          <?php
            $newid=$_GET['up_id'];
            include('../phantrangfrontend/connect.php');
            $sql="SELECT * FROM shipper WHERE id_s='$newid'";
            $ketqua=$connect->query($sql);
            $kq=$ketqua->fetch_assoc();
            ?>
              <div class="box-body">
                <div class="form-group">
                  <label for="name_pro">Họ Tên</label>
                  <input type="text" class="form-control" id="ten_s" name="ten_s" value="<?php echo $kq['ten_s']?>">
                </div>

                <div class="form-group">
                  <label for="name_pro">Email</label>
                  <input type="email" class="form-control" id="email" name="email" value="<?php echo $kq['email_s']?>">
                </div>

                <div class="form-group">
                  <label for="price">Mật Khẩu Đăng Nhập</label>
                  <input type="text" class="form-control" id="password" name="password" value="<?php echo $kq['password']?>">
                </div>

                <div class="form-group">
                    <label for="">Giới Tính </label><br>
                    <input type="radio" id="nam" name="gioitinh_s" value="Nam" <?php if($kq['gioitinh_s']=="Nam") echo 'checked'?>>
                    <label for="" style="margin-right: 20px;">Nam</label>
                    <input type="radio" id="nu" name="gioitinh_s" value="Nữ" <?php if($kq['gioitinh_s']=="Nữ") echo 'checked'?>>
                    <label for="" style="margin-right: 20px;">Nữ</label>
                    <input type="radio" id="khac" name="gioitinh_s" value="Khác" <?php if($kq['gioitinh_s']=="Khác") echo 'checked'?>>
                    <label for="">Khác</label>
                </div>

                <div class="form-group">
                <label>Ngày Sinh</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                    <input type="date" class="form-control pull-right" id="ngaysinh" name="ngaysinh_s" value="<?php echo $kq['ngaysinh_s']?>">
                  </div>
                </div>

                <div class="form-group">
                  <label for="name_pro">Điện Thoại</label>
                  <input type="text" class="form-control" id="dienthoai_nv" name="dienthoai_s" value="<?php echo $kq['dienthoai_s']?>">
                </div>

                <div class="form-group">
                  <label for="name_pro">Địa chỉ</label>
                  <input type="text" class="form-control" id="diachi_nv" name="diachi_s" value="<?php echo $kq['diachi_s']?>">
                </div>

                <div class="form-group">
                  <label for="picture">Ảnh Đại Diện</label><br>
                  <img src="../<?php echo $kq['avatar']?>" id="image" height="100" width="100"/>
                  <input type="file" id="picture" name="file">
                </div>
              </div>

              <div class="box-footer" style="background-color: unset; text-align: center;">
                <input type="hidden" value="<?php echo $kq['id_s']?>" name="form_id">
                <button type="submit" class="btn btn-primary" name="sua">Cập Nhập</button>
              </div>
        </form>
        </div>
      </div>
    </section>
        <div class="row center-block">
            <div class="col-sm-3" style="margin-bottom: 10px;">
            <button onclick="location.href='danhsachshipper.php'" style="margin-right: 10px; ">Trở lại</button>
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
