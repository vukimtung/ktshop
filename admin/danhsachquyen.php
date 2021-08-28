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
                    <li><a href="themquyen.php" class="btn btn-success"><i class="fa fa-edit" aria-hidden="true"> Thêm quyền</i></a></li>
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
                    <a href="suaquyen.php?up_id=<?php echo $kq['id_r']?>" class="btn btn-success"><i class="fa fa-edit" aria-hidden="true"> Sửa</i></a>
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
