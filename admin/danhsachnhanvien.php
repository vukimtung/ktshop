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
                <h1 style="text-align: center; color: red; font-weight: bold;">Danh Sách Nhân Viên</h1>
                <ol class="breadcrumb">
                    <li>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">
                        Thêm nhân viên
                    </button>
                    </li>
                </ol>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>STT</th>
                  <th>Tên nhân viên</th>
                  <th>Ngày sinh</th>
                  <th>Giới tính</th>
                  <th>Email</th>
                  <th>Số điện thoại</th>
                  <th>Địa chỉ</th>
                  <th>Tùy chọn</th>
                </tr>
                </thead>
                <tbody>
                <?php
                include('../phantrangfrontend/connect.php');
                $stt = 0;
                $sql="SELECT * FROM nhanvien";
                $ketqua=$connect->query($sql);
                while ($kq=$ketqua->fetch_assoc()){ 
                    $stt++;
                    ?>
                  <tr>
                  <td><?php echo $stt;?></td>
                  <td><?php echo $kq['ten_nv']?></td>
                  <td><?php echo $kq['ngaysinh']?></td>
                  <td><?php echo $kq['gioitinh']?></td>
                  <td><?php echo $kq['email_nv']?></td>
                  <td><?php echo $kq['dienthoai_nv']?></td>
                  <td><?php echo $kq['diachi_nv']?></td>
                  <td>
                    <a href="xulybackend/xoanhanvien.php?del_id=<?php echo $kq['id_nv']?>" style="padding-right: 20px" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"> Xóa</i></a>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#message<?php echo $kq['id_nv'];?>"><i class="fa fa-eye" aria-hidden="true"> Sửa</i></button>
                </td>
                </tr>
                <!-- Modal sửa -->
                <div class="modal fade" id="message<?php echo $kq['id_nv'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content" style="border-radius: 5px;">
                  <div class="modal-header" style="text-align: center; border-bottom: none;">
                            <h2 class="modal-title" id="exampleModalLongTitle" style="color: red; font-weight: bold;">Sửa Thông Tin Nhân Viên</h2>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 45px; margin-top: -40px;">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
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
                            <img src="../<?php echo $kq['avatar']?>" id="image1" height="100" width="100"/>
                            <input type="file" id="picture1" name="file">
                          </div>

                          <div class="form-group">
                              <label for="" style="margin-right: 10px;"> Quyền Nhân Viên</label>
                              <select id="role" name="role">
                              <?php
                              $danhmuc="SELECT * FROM roles";
                              $results=mysqli_query($connect, $danhmuc);
                              while($row=mysqli_fetch_assoc($results)){?>
                                <option 
                                  <?php if ($row['id_r']==$kq['id_quyen']) {
                                    echo "selected";
                                  } ?>
                                value="<?php echo $row['id_r'];?>"><?php echo $row['ten_r'];?></option>
                            <?php } ?>
                              </select>
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
              </table>
            </div>

            <!-- Modal thêm -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" style="border-radius: 5px;">
                  <div class="modal-header" style="text-align: center; border-bottom: none;">
                    <h2 class="modal-title" id="exampleModalLongTitle" style="color: red; font-weight: bold;">Thêm Nhân Viên</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 45px; margin-top: -40px;">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form role="form" action="xulybackend/xulythemnv.php" method="POST" enctype="multipart/form-data">
                    <div class="box-body">
                      <div class="form-group">
                        <label for="name_pro">Họ Tên</label>
                        <input type="text" class="form-control" id="ten_nv" name="ten_nv" placeholder="Nhập tên nhân viên" required>
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
                          <input type="radio" id="nam" name="gioitinh" value="Nam">
                          <label for="" style="margin-right: 20px;">Nam</label>
                          <input type="radio" id="nu" name="gioitinh" value="Nữ">
                          <label for="" style="margin-right: 20px;">Nữ</label>
                          <input type="radio" id="khac" name="gioitinh" value="Khác">
                          <label for="">Khác</label>
                      </div>

                      <div class="form-group">
                      <label>Ngày Sinh</label>
                      <div class="input-group date">
                        <div class="input-group-addon">
                          <i class="fa fa-calendar"></i>
                        </div>
                          <input type="date" class="form-control pull-right" id="ngaysinh" name="ngaysinh">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="name_pro">Điện Thoại</label>
                        <input type="number" class="form-control" id="dienthoai_nv" name="dienthoai_nv" placeholder="Nhập số điện thoại" required>
                      </div>

                      <div class="form-group">
                        <label for="name_pro">Địa chỉ</label>
                        <input type="text" class="form-control" id="diachi_nv" name="diachi_nv" placeholder="Nhập địa chỉ" required>
                      </div>

                      <div class="form-group">
                        <label for="picture">Ảnh Đại Diện</label><br>
                        <img id="image" height="100" width="100"/>
                        <input type="file" id="picture" name="file" required>
                      </div>

                      <div class="form-group">
                          <label for="" style="margin-right: 10px;"> Quyền Nhân Viên</label>
                          <select id="role" name="role">
                          <?php
                          include('../phantrangfrontend/connect.php');
                          $sql="SELECT * FROM roles";
                          $ketqua=mysqli_query($connect, $sql);
                          while($row=mysqli_fetch_assoc($ketqua)){
                          echo "<option value=".$row['id_r'].">".$row['ten_r']."</option>";
                          }
                          ?>
                          </select>
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
