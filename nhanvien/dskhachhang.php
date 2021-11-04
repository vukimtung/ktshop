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
                <h1 style="text-align: center; color: red; font-weight: bold;">Danh Sách Khách Hàng</h1>
                
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>STT</th>
                  <th>Tên khách hàng</th>
                  <th>Email</th>
                  <th>Số điện thoại</th>
                  <th>Tùy chọn</th>
                </tr>
                </thead>
                <tbody>
                <?php
                include('../phantrangfrontend/connect.php');
                $stt = 0;
                $sql="SELECT * FROM customers";
                $ketqua=$connect->query($sql);
                while ($kq=$ketqua->fetch_assoc()){ 
                    $stt++;
                    ?>
                  <tr>
                  <td><?php echo $stt;?></td>
                  <td><?php echo $kq['name_cust']?></td>
                  <td><?php echo $kq['email_cust']?></td>
                  <td><?php echo $kq['phone_cust']?></td>
                  <td>
                  <?php
                      $id_q = $_SESSION['id_quyen'];
                      $sql1="SELECT * FROM roles WHERE id_r = '$id_q'";
                      $ketqua1=$connect->query($sql1);
                      $kq1=$ketqua1->fetch_assoc();
                      if(($kq1['ten_r']=='Toàn quyền') || ($kq1['ten_r']=='Xóa')){
                    ?>
                    <a href="xulybackend/xoakhachhang.php?del_id=<?php echo $kq['id_cust']?>" style="padding-right: 20px" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"> Xóa</i></a>
                        <?php } else {} ?>
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
include('phantrangnhanvien/footer.php')
?>
</body>
</html>
