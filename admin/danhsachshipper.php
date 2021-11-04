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

  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
                <h1 style="text-align: center; color: red; font-weight: bold;">Danh Sách Shipper</h1>
                <ol class="breadcrumb">
                    <li>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">
                        Thêm Shipper
                    </button>
                    </li>
                </ol>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>STT</th>
                  <th>Họ tên</th>
                  <th>Email</th>
                  <th>Số điện thoại</th>
                  <th>Ngày sinh</th>
                  <th>Giới tính</th>
                  <th>Địa chỉ</th>
                  <th>Tùy chọn</th>
                </tr>
                </thead>
                <tbody>
                <?php
                include('../phantrangfrontend/connect.php');
                $stt = 0;
                $sql="SELECT * FROM shipper";
                $ketqua=$connect->query($sql);
                while ($kq=$ketqua->fetch_assoc()){ 
                    $stt++;
                    ?>
                  <tr>
                  <td><?php echo $stt;?></td>
                  <td><?php echo $kq['ten_s']?></td>
                  <td><?php echo $kq['email_s']?></td>
                  <td><?php echo $kq['dienthoai_s']?></td>
                  <td><?php echo $kq['ngaysinh_s']?></td>
                  <td><?php echo $kq['gioitinh_s']?></td>
                  <td><?php echo $kq['diachi_s']?></td>
                  <td>
                    <a href="xulybackend/xoashipper.php?del_id=<?php echo $kq['id_s']?>" style="padding-right: 20px" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"> Xóa</i></a>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#message<?php echo $kq['id_s'];?>"><i class="fa fa-eye" aria-hidden="true"> Sửa</i></button>
                </td>
                </tr>
                <!-- Modal sửa -->
                <div class="modal fade" id="message<?php echo $kq['id_s'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content" style="border-radius: 5px;">
                  <div class="modal-header" style="text-align: center; border-bottom: none;">
                            <h2 class="modal-title" id="exampleModalLongTitle" style="color: red; font-weight: bold;">Sửa Thông Tin Shipper</h2>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 45px; margin-top: -40px;">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <form role="form" name="myForm" action="xulybackend/xulysuashipper.php" method="POST" enctype="multipart/form-data">
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
                                  <input type="number" class="form-control" id="dienthoai_nv" name="dienthoai_s" value="<?php echo $kq['dienthoai_s']?>">
                                </div>

                                <div class="form-group">
                                  <label for="name_pro">Địa chỉ</label>
                                  <input type="text" class="form-control" id="diachi_nv" name="diachi_s" value="<?php echo $kq['diachi_s']?>">
                                </div>

                                <div class="form-group">
                                  <label for="picture">Ảnh Đại Diện</label><br>
                                  <img src="../<?php echo $kq['avatar']?>" id="image1" height="100" width="100"/>
                                  <input type="file" id="picture1" name="file">
                                </div>
                              </div>

                              <div class="box-footer" style="background-color: unset; text-align: center;">
                                <input type="hidden" value="<?php echo $kq['id_s']?>" name="form_id">
                                <button type="submit" class="btn btn-primary" name="sua">Cập Nhập</button>
                              </div>
                        </form>
                        </div>
                    </div>
                    </div>
                <!-- end modal sửa -->
                <?php } ?>
              </table>
            </div>

            <!-- Modal thêm -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" style="border-radius: 5px;">
                  <div class="modal-header" style="text-align: center; border-bottom: none;">
                    <h2 class="modal-title" id="exampleModalLongTitle" style="color: red; font-weight: bold;">Thêm Shipper</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 45px; margin-top: -40px;">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form role="form" action="xulybackend/xulythemshipper.php" method="POST" enctype="multipart/form-data">
                    <div class="box-body">
                      <div class="form-group">
                        <label for="name_pro">Họ Tên</label>
                        <input type="text" class="form-control" id="ten_s" name="ten_s" placeholder="Nhập họ tên" required>
                      </div>

                      <div class="form-group">
                        <label for="name_pro">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Nhập Email" required>
                      </div>

                      <div class="form-group">
                        <label for="price">Mật Khẩu Đăng Nhập</label>
                        <input type="text" class="form-control" id="password" name="password" placeholder="Nhập mật khẩu đăng nhập" required>
                      </div>

                      <div class="form-group">
                          <label for="">Giới Tính </label><br>
                          <input type="radio" id="nam" name="gioitinh_s" value="Nam">
                          <label for="" style="margin-right: 20px;">Nam</label>
                          <input type="radio" id="nu" name="gioitinh_s" value="Nữ">
                          <label for="" style="margin-right: 20px;">Nữ</label>
                          <input type="radio" id="khac" name="gioitinh_s" value="Khác">
                          <label for="">Khác</label>
                      </div>

                      <div class="form-group">
                      <label>Ngày Sinh</label>
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                          <input type="date" class="form-control pull-right" id="ngaysinh_s" name="ngaysinh_s" onfocusout="formValidate()">
                          <label for="" id="thongbao"></label>
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="">Điện Thoại</label>
                        <input type="number" class="form-control" id="dienthoai_s" name="dienthoai_s" placeholder="Nhập số điện thoại" required>
                      </div>

                      <div class="form-group">
                        <label for="">Địa chỉ</label>
                        <input type="text" class="form-control" id="diachi_s" name="diachi_s" placeholder="Nhập địa chỉ" required>
                      </div>

                      <div class="form-group">
                        <label for="picture">Ảnh Đại Diện</label><br>
                        <img id="image" height="100" width="100"/>
                        <input type="file" id="picture" name="file" required>
                      </div>
                    </div>

                    <div class="box-footer" style="background-color: unset; text-align: center;">
                      <button type="submit" class="btn btn-primary" name="them">Thêm</button>
                    </div>
              </form>
                </div>
            </div>
            </div>
            <!-- end modal thêm -->

          </div>
        </div>
      </div>
    </section>
  </div>
<?php
include('phantrangadmin/footer.php')
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
