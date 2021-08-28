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
              <h3 class="box-title">Danh sách bình luận & đánh giá</h3>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>STT</th>
                  <th>Tên Khách Hàng</th>
                  <th>Email Khách Hàng</th>
                  <th>Tên Sản Phẩm</th>
                  <th>Bình Luận</th>
                  <th>Số Sao</th>
                  <th>Tùy Chọn</th>
                </tr>
                </thead>
                <tbody>
                <?php
                include('../phantrangfrontend/connect.php');
                $stt = 0;
                $sql="SELECT * FROM comments c LEFT JOIN products p ON c.idsp = p.id_pro";
                $ketqua=$connect->query($sql);
                while ($kq=$ketqua->fetch_assoc()){
                    $stt ++;
                ?>
                  <tr>
                  <td><?php echo $stt; ?></td>
                  <td><?php echo $kq['name_kh']?></td>
                  <td><?php echo $kq['email_kh']?></td>
                  <td><?php echo $kq['name_pro']?></td>
                  <td><?php echo $kq['review']?></td>
                  <td><?php 
                        $num = $kq['rating']; 
                        for ($i=0; $i < $num; $i++) { ?>
                          <i class="fa fa-star"></i>
                        <?php } ?>
                        <i class="zmdi zmdi-star"></i>
                  </td>
                  <td>
                        <a href="xulybackend/xoabinhluan.php?del_id=<?php echo $kq['id_com']?>"><i class="fa fa-times" aria-hidden="true">Xóa</i></a>
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