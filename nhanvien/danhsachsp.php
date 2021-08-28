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
              <h3 class="box-title">Danh sách sản phẩm</h3>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Tên sản phẩm</th>
                  <th>Giá</th>
                  <th>Hình ảnh</th>
                  <th style="width: 250px">Mô tả</th>
                  <th>Tính theo</th>
                  <th>Danh mục</th>
                  <th>Tùy chọn</th>
                </tr>
                </thead>
                <tbody>
                <?php
                include('../phantrangfrontend/connect.php');
                $sql="SELECT * FROM products p LEFT JOIN categories c ON p.category_id = c.id_cate";
                $ketqua=$connect->query($sql);
                while ($kq=$ketqua->fetch_assoc()){ ?>
                  <tr>
                  <td><?php echo $kq['name_pro']?></td>
                  <td><?php echo number_format($kq['price']). '  VND';?></td>
                  <td><img src="../<?php echo $kq['picture']?>" alt="hình ảnh sản phẩm" style="height: 120px; width: 120px; object-fit: cover;"></td>
                  <td><?php echo $kq['description']?></td>
                  <td><?php echo $kq['unit']?></td>
                  <td><?php echo $kq['name_cate']?></td>
                  <td>
                    <a href="xulybackend/xoasanpham.php?del_id=<?php echo $kq['id_pro']?>" style="padding-right: 20px"><i class="fa fa-times" aria-hidden="true">Xóa</i></a>
                  <a href="suasanpham.php?up_id=<?php echo $kq['id_pro']?>"><i class="fa fa-edit" aria-hidden="true">Sửa</i></a>
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
