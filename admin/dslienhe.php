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
              <h1 style="text-align: center; color: red; font-weight: bold;">Danh Sách Liên Hệ </h1>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>STT</th>
                  <th>Email</th>
                  <th>Tin nhắn</th>
                  <th>Tùy chọn</th>
                </tr>
                </thead>
                <tbody>
                <?php
                include('../phantrangfrontend/connect.php');
                $stt = 0;
                $sql="SELECT * FROM contact";
                $ketqua=$connect->query($sql);
                while ($kq=$ketqua->fetch_assoc()){ 
                  $stt ++;
                ?>
                  <tr>
                    <td><?php echo $stt;?></td>
                    <td><?php echo $kq['email']?></td>
                    <td><?php echo $kq['msg']?></td>
                    <td>
                      <a href="xulybackend/xoalienhe.php?del_id=<?php echo $kq['id_contact']?>" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"> Xóa</i></a>
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
