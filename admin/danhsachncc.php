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
                <h1 style="text-align: center; color: red; font-weight: bold;">Danh Sách Nhà Cung Cấp</h1>
                <ol class="breadcrumb">
                    <li>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">
                        Thêm nhà cung cấp
                    </button>
                    </li>
                </ol>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>STT</th>
                  <th>Tên nhà cung cấp</th>
                  <th>Địa chỉ</th>
                  <th>Số điện thoại</th>
                  <th>Tùy chọn</th>
                </tr>
                </thead>
                <tbody>
                <?php
                include('../phantrangfrontend/connect.php');
                $stt = 0;
                $sql="SELECT * FROM nhacungcap";
                $ketqua=$connect->query($sql);
                while ($kq=$ketqua->fetch_assoc()){ 
                    $stt++;
                    ?>
                  <tr>
                  <td><?php echo $stt;?></td>
                  <td><?php echo $kq['ten_n']?></td>
                  <td><?php echo $kq['diachi_n']?></td>
                  <td><?php echo $kq['dienthoai_n']?></td>
                  <td>
                    <a href="xulybackend/xoanhacungcap.php?del_id=<?php echo $kq['id_n']?>" style="padding-right: 20px" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"> Xóa</i></a>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#message<?php echo $kq['id_n'];?>"><i class="fa fa-eye" aria-hidden="true"> Sửa</i></button>
                </td>
                </tr>
                
                <!-- Modal sửa -->
                <div class="modal fade" id="message<?php echo $kq['id_n'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content" style="border-radius: 5px;">
                  <div class="modal-header" style="text-align: center; border-bottom: none;">
                            <h2 class="modal-title" id="exampleModalLongTitle" style="color: red; font-weight: bold;">Sửa Nhà Cung Cấp</h2>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 45px; margin-top: -40px;">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <form role="form" action="xulybackend/xulysuancc.php" method="POST" enctype="multipart/form-data">
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
                    <h2 class="modal-title" id="exampleModalLongTitle" style="color: red; font-weight: bold;">Thêm Nhà Cung cấp</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 45px; margin-top: -40px;">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
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
</body>
</html>
