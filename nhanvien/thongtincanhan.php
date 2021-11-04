<!DOCTYPE html>
<html>
<?php 
  include("phantrangnhanvien/head.php");
  include("phantrangnhanvien/session.php");
?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php 
  include("phantrangnhanvien/header.php");
  include("phantrangnhanvien/aside.php");
  ?>

  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
                <h1 style="text-align: center; color: red; font-weight: bold;">Thông Tin Cá Nhân</h1>
            </div>
            <div class="box-body">
                <?php
                include('../phantrangfrontend/connect.php');
                $idnv = $_SESSION['id_nv'];
                $sql="SELECT * FROM nhanvien WHERE id_nv = '$idnv'";
                $ketqua=$connect->query($sql);
                while ($kq=$ketqua->fetch_assoc()){ 
                    ?>
                <!-- Modal sửa -->
                <div class="" id="message<?php echo $kq['id_nv'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-body" style="border: 1px solid;border-radius: 5px;">
                        <form role="form" action="xulybackend/xulysuanv.php" method="POST" enctype="multipart/form-data">
                        <div class="box-body">
                          <div class="form-group">
                            <label for="name_pro">Họ Tên</label>
                            <input type="text" class="form-control" id="ten_nv" name="ten_nv" value="<?php echo $kq['ten_nv']?>">
                          </div>

                          <div class="form-group">
                            <label for="name_pro">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo $kq['email_nv']?>">
                          </div>

                          <div class="form-group">
                            <label for="price">Mật Khẩu Đăng Nhập</label>
                            <input type="text" class="form-control" id="password" name="password" value="<?php echo $kq['password']?>">
                          </div>

                          <div class="form-group">
                              <label for="">Giới Tính </label><br>
                              <input type="radio" id="nam" name="gioitinh" value="Nam" <?php if($kq['gioitinh']=="Nam") echo 'checked'?>>
                              <label for="" style="margin-right: 20px;">Nam</label>
                              <input type="radio" id="nu" name="gioitinh" value="Nữ" <?php if($kq['gioitinh']=="Nữ") echo 'checked'?>>
                              <label for="" style="margin-right: 20px;">Nữ</label>
                              <input type="radio" id="khac" name="gioitinh" value="Khác" <?php if($kq['gioitinh']=="Khác") echo 'checked'?>>
                              <label for="">Khác</label>
                          </div>

                          <div class="form-group">
                          <label>Ngày Sinh</label>
                          <div class="input-group date">
                            <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                            </div>
                              <input type="date" class="form-control pull-right" id="ngaysinh" name="ngaysinh" value="<?php echo $kq['ngaysinh']?>">
                            </div>
                          </div>

                          <div class="form-group">
                            <label for="name_pro">Điện Thoại</label>
                            <input type="number" class="form-control" id="dienthoai_nv" name="dienthoai_nv" value="<?php echo $kq['dienthoai_nv']?>">
                          </div>

                          <div class="form-group">
                            <label for="name_pro">Địa chỉ</label>
                            <input type="text" class="form-control" id="diachi_nv" name="diachi_nv" value="<?php echo $kq['diachi_nv']?>">
                          </div>

                          <div class="form-group">
                            <label for="picture">Ảnh Đại Diện</label><br>
                            <img src="../<?php echo $kq['avatar']?>" id="image" height="100" width="100"/>
                            <input type="file" id="picture" name="file">
                          </div>

                          <div class="form-group">
                            <label for="name_pro">Quyền nhân viên: </label>
                              <?php
                              $idquyen = $kq['id_quyen'];
                                $sql1="SELECT * FROM roles WHERE id_r = '$idquyen'";
                                $ketqua1=mysqli_query($connect, $sql1);
                                while($row=mysqli_fetch_assoc($ketqua1)){
                                echo $row['ten_r'];
                                }
                              ?>
                          </div>
                        </div>

                        <div class="box-footer" style="background-color: unset; text-align: center;">
                          <input type="hidden" value="<?php echo $kq['id_nv']?>" name="form_id">
                          <button type="submit" class="btn btn-primary" name="sua">Cập Nhập</button>
                        </div>
                  </form>
                        </div>
                    </div>
                    </div>
                <!-- end modal sửa -->
                <?php } ?>
            </div>

          </div>
        </div>
      </div>
    </section>
  </div>
<?php
include('phantrangnhanvien/footer.php')
?>
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
