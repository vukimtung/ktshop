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
                    <li><a href="themdmsp.php" class="btn btn-success"><i class="fa fa-edit" aria-hidden="true"> Thêm danh mục</i></a></li>
                </ol>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Tên danh mục</th>
                  <th>Tùy chọn</th>
                </tr>
                </thead>
                <tbody>
                <?php
                include('../phantrangfrontend/connect.php');
                $sql="SELECT * FROM categories";
                $ketqua=$connect->query($sql);
                while ($kq=$ketqua->fetch_assoc()){ ?>
                  <tr>
                  <td><?php echo $kq['name_cate']?></td>
                  <td>
                    <a href="xulybackend/xoadanhmuc.php?del_id=<?php echo $kq['id_cate']?>" style="padding-right: 20px" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"> Xóa</i></a>
                  <a href="suadanhmuc.php?up_id=<?php echo $kq['id_cate']?>" class="btn btn-success"><i class="fa fa-edit" aria-hidden="true"> Sửa</i></a>
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
