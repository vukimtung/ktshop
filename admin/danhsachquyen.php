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
                <h1 style="text-align: center; color: red; font-weight: bold;">Danh Sách Quyền </h1>
                <ol class="breadcrumb">
                    <li>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">
                        Thêm quyền
                    </button>
                    </li>
                </ol>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>STT</th>
                  <th>Tên quyền</th>
                  <th style="width: 250px">Mô tả</th>
                  <th>Tùy chọn</th>
                </tr>
                </thead>
                <tbody>
                <?php
                include('../phantrangfrontend/connect.php');
                $stt = 0;
                $sql="SELECT * FROM roles";
                $ketqua=$connect->query($sql);
                while ($kq=$ketqua->fetch_assoc()){ 
                    $stt++; ?>
                  <tr>
                  <td><?php echo $stt?></td>
                  <td><?php echo $kq['ten_r']?></td>
                  <td><?php echo $kq['mota_r']?></td>
                  <td>
                    <a href="xulybackend/xoaquyen.php?del_id=<?php echo $kq['id_r']?>" style="padding-right: 20px" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"> Xóa</i></a>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#message<?php echo $kq['id_r'];?>"><i class="fa fa-eye" aria-hidden="true"> Sửa</i></button>
                  </td>
                </tr>

                <!-- Modal sửa -->
                <div class="modal fade" id="message<?php echo $kq['id_r'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content" style="border-radius: 5px;">
                  <div class="modal-header" style="text-align: center; border-bottom: none;">
                            <h2 class="modal-title" id="exampleModalLongTitle" style="color: red; font-weight: bold;">Sửa Quyền</h2>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 45px; margin-top: -40px;">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <form role="form" action="xulybackend/xulysuaquyen.php" method="POST" enctype="multipart/form-data">
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
                    <h2 class="modal-title" id="exampleModalLongTitle" style="color: red; font-weight: bold;">Thêm Quyền</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 45px; margin-top: -40px;">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
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
