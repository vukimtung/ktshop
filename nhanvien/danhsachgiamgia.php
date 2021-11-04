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
                <h1 style="text-align: center; color: red; font-weight: bold;">Danh Sách giảm giá</h1>
                <ol class="breadcrumb">
                    <li>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">
                        Thêm mã giảm
                    </button>
                    </li>
                </ol>
            </div>

        <!-- Button trigger modal -->
        

        <!-- Modal thêm -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="border-radius: 5px;">
                  <div class="modal-header" style="text-align: center; border-bottom: none;">
                <h2 class="modal-title" id="exampleModalLongTitle" style="color: red; font-weight: bold;">Thêm mã giảm</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 45px; margin-top: -40px;">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form role="form" action="xulybackend/xulythemgg.php" method="POST">
              <div class="box-body">
                <div class="form-group">
                  <label for="ptgg">Phần trăm giảm (%)</label>
                  <input type="number" class="form-control" id="ptgg" name="ptgg" placeholder="Nhập phần trăm giảm giá" required>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer" style="background-color: unset; text-align: center;">
                <button type="submit" class="btn btn-primary">Thêm</button>
              </div>
            </div>
            </form>
            </div>
        </div>
        </div>
        <!-- end modal thêm -->


            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>STT</th>
                  <th>Phần trăm giảm</th>
                  <th>Tùy chọn</th>
                </tr>
                </thead>
                <tbody>
                <?php
                include('../phantrangfrontend/connect.php');
                $stt = 0;
                $sql="SELECT * FROM giagiam";
                $ketqua=$connect->query($sql);
                while ($kq=$ketqua->fetch_assoc()){ 
                    $stt++;
                    ?>
                  <tr>
                  <td><?php echo $stt;?></td>
                  <td><?php echo $kq['phantramgiam']?> %</td>
                  <td>
                  <?php
                      $id_q = $_SESSION['id_quyen'];
                      $sql1="SELECT * FROM roles WHERE id_r = '$id_q'";
                      $ketqua1=$connect->query($sql1);
                      $kq1=$ketqua1->fetch_assoc();
                      if($kq1['ten_r']=='Toàn quyền'){
                    ?>
                      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#message<?php echo $kq['id_gg'];?>"><i class="fa fa-eye" aria-hidden="true"> Sửa</i></button>
                      <a href="xulybackend/xoagiamgia.php?del_id=<?php echo $kq['id_gg']?>" style="padding-right: 20px" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"> Xóa</i></a>
                   <?php } elseif($kq1['ten_r']=='Sửa'){?>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#message<?php echo $kq['id_gg'];?>"><i class="fa fa-eye" aria-hidden="true"> Sửa</i></button>
                     <?php } elseif($kq1['ten_r']=='Xóa'){?>
                      <a href="xulybackend/xoagiamgia.php?del_id=<?php echo $kq['id_gg']?>" style="padding-right: 20px" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"> Xóa</i></a>
                      <?php } else {}?>
               </td>
                </tr>
                

                <!-- Modal sửa -->
                    <div class="modal fade" id="message<?php echo $kq['id_gg'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content" style="border-radius: 5px;">
                        <div class="modal-header" style="text-align: center; border-bottom: none;">
                                <h2 class="modal-title" id="exampleModalLongTitle" style="color: red; font-weight: bold;">Sửa mã giảm</h2>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 45px; margin-top: -40px;">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            <form role="form" action="xulybackend/xulysuagg.php" method="POST">
                            <div class="box-body">
                                <div class="form-group">
                                <label for="ptgg">Phần trăm giảm (%)</label>
                                <input type="number" class="form-control" id="ptgg1" name="ptgg1" value="<?php echo $kq['phantramgiam']?>">
                                </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer" style="background-color: unset; text-align: center;">
                            <input type="hidden" value="<?php echo $kq['id_gg']?>" name="form_id">
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


          </div>
        </div>
      </div>
    </section>
  </div>
<?php
include('phantrangnhanvien/footer.php')
?>
</body>
</html>
