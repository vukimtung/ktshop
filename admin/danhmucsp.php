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
            <h1 style="text-align: center; color: red; font-weight: bold;">Danh Sách Danh Mục </h1>
                <ol class="breadcrumb">
                    <li>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">
                        Thêm danh mục
                    </button>
                    </li>
                </ol>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>STT</th>
                  <th>Tên danh mục</th>
                  <th>Tùy chọn</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $stt = 0;
                include('../phantrangfrontend/connect.php');
                $sql="SELECT * FROM categories";
                $ketqua=$connect->query($sql);
                while ($kq=$ketqua->fetch_assoc()){ 
                    $stt++;
                  ?>
                  <tr>
                  <td><?php echo $stt;?></td>
                  <td><?php echo $kq['name_cate']?></td>
                  <td>
                    <a href="xulybackend/xoadanhmuc.php?del_id=<?php echo $kq['id_cate']?>" style="padding-right: 20px" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"> Xóa</i></a>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#message<?php echo $kq['id_cate'];?>"><i class="fa fa-eye" aria-hidden="true"> Sửa</i></button>
                </td>
                </tr>
                
                <!-- Modal sửa -->
                <div class="modal fade" id="message<?php echo $kq['id_cate'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content" style="border-radius: 20px; background: linear-gradient( -180deg, rgb(212 244 209), rgb(230 168 190));">
                        <div class="modal-header" style="text-align: center;">
                            <h2 class="modal-title" id="exampleModalLongTitle" style="color: red; font-weight: bold;">Sửa Danh Mục</h2>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 45px; margin-top: -40px;">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <form role="form" action="xulybackend/xulysuadm.php" method="POST">
                        <div class="box-body">
                            <div class="form-group">
                            <label for="name_pro">Tên danh mục sản phẩm</label>
                            <input type="text" class="form-control" id="name_cate" name="name_cate" value="<?php echo $kq['name_cate']?>">
                            </div>
                        </div>
                        <div class="box-footer" style="background-color: unset; text-align: center;">
                        <input type="hidden" value="<?php echo $kq['id_cate']?>" name="form_id">
                        <button type="submit" class="btn btn-primary" name="sua">Sửa</button>
                        </div>
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
                <div class="modal-content" style="border-radius: 20px; background: linear-gradient( -180deg, rgb(212 244 209), rgb(230 168 190));">
                <div class="modal-header" style="text-align: center;">
                    <h2 class="modal-title" id="exampleModalLongTitle" style="color: red; font-weight: bold;">Thêm danh mục</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 45px; margin-top: -40px;">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form role="form" action="xulybackend/xulythemdmsp.php" method="POST">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="name_cate">Tên danh mục</label>
                      <input type="text" class="form-control" id="name_cate" name="name_cate" placeholder="Nhập tên danh mục sản phẩm" required>
                    </div>
                  </div>
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
