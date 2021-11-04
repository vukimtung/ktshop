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
            <h1 style="text-align: center; color: red; font-weight: bold;">Danh Sách Nguyên Liệu </h1>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>STT</th>
                  <th>Tên nguyên liệu</th>
                  <th>Số lượng còn trong kho</th>
                  <th>DVT</th>
                  <th>Tùy chọn</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $stt = 0;
                include('../phantrangfrontend/connect.php');
                $sql="SELECT * FROM nguyenlieu";
                $ketqua=$connect->query($sql);
                while ($kq=$ketqua->fetch_assoc()){ 
                    $stt++;
                    if ($kq['sl']==0) {
                  ?>
                        <tr style="background: #f47070;">
                        <td><?php echo $stt;?></td>
                        <td><?php echo $kq['ten_nl']?></td>
                        <td><?php echo $kq['sl']?></td>
                        <td><?php echo $kq['dvt']?></td>
                        <td>
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#message<?php echo $kq['id_nl'];?>"><i class="fa fa-edit" aria-hidden="true"> Cập nhật</i></button>
                        </td>
                        </tr>
                    <?php } else { ?>
                        <tr>
                        <td><?php echo $stt;?></td>
                        <td><?php echo $kq['ten_nl']?></td>
                        <td><?php echo $kq['sl']?></td>
                        <td><?php echo $kq['dvt']?></td>
                        <td>
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#message<?php echo $kq['id_nl'];?>"><i class="fa fa-edit" aria-hidden="true"> Cập nhật</i></button>
                        </td>
                        </tr>
                        <?php } ?>
                <!-- Modal sửa -->
                <div class="modal fade" id="message<?php echo $kq['id_nl'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content" style="border-radius: 5px;">
                  <div class="modal-header" style="text-align: center; border-bottom: none;">
                            <h2 class="modal-title" id="exampleModalLongTitle" style="color: red; font-weight: bold;">Cập Nhật Nguyên Liệu</h2>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 45px; margin-top: -40px;">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <form role="form" action="xulybackend/capnhatnglieu.php" method="POST">
                        <div class="box-body">
                            <div class="form-group">
                            <label for="name_pro">Tên nguyên liệu</label>
                            <input type="text" class="form-control" id="tennl" name="tennl" value="<?php echo $kq['ten_nl']?>">
                            </div>
                            <div class="form-group">
                            <label for="name_pro">Số lượng còn lại trong kho</label>
                            <input type="number" class="form-control" id="sl" name="sl" value="<?php echo $kq['sl']?>">
                            </div>
                            <div class="form-group">
                            <label for="name_pro">Đơn vị tính</label>
                            <input type="text" class="form-control" id="dvt" name="dvt" value="<?php echo $kq['dvt']?>">
                            </div>
                        </div>
                        <div class="box-footer" style="background-color: unset; text-align: center;">
                        <input type="hidden" value="<?php echo $kq['id_nl']?>" name="form_id">
                        <button type="submit" class="btn btn-primary" name="sua">Cập nhật</button>
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
include('phantrangadmin/footer.php')
?>
</body>
</html>
