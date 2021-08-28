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
                    <li><a href="themnhacungcap.php" class="btn btn-success"><i class="fa fa-edit" aria-hidden="true"> Thêm nhà cung cấp</i></a></li>
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
                    <a href="suanhacungcap.php?up_id=<?php echo $kq['id_n']?>" class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"> Sửa</i></a>
                </td>
                </tr>
                
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
