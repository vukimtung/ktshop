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
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1 style="text-align: center; color: red; font-weight: bold;">Thêm Sản Phẩm</h1>
      <ol class="breadcrumb">
        <li><a href="adminindex.php"><i class="fa fa-dashboard"></i>Admin</a></li>
        <li class="active">Thêm sản phẩm</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-sm-3">
        </div>
        <div class="col-sm-6">
          <form role="form" action="xulybackend/xulythemsp.php" method="POST" enctype="multipart/form-data">
              <div class="box-body">

                <div class="form-group">
                  <label for="name_pro">Tên sản phẩm</label>
                  <input type="text" class="form-control" id="name_pro" name="name_pro" placeholder="Nhập tên sản phẩm">
                </div>

                <div class="form-group">
                  <label for="price">Giá sản phẩm</label>
                  <input type="text" class="form-control" id="price" name="price" placeholder="Nhập giá sản phẩm">
                </div>

                <div class="form-group">
                  <label>Tính theo</label>
                  <select id="unit" name="tinhtheo">
                    <option value="Hộp">Hộp</option>
                    <option value="Cái">Cái</option>
                  </select>
                </div>

                <div class="form-group">
                  <label for="description">Mô tả sản phẩm</label>
                  <textarea class="form-control" id="description" name="description" rows="10" placeholder="Nhập mô tả sản phẩm"></textarea>
                </div>

                <div class="form-group">
                  <label for="picture">Hình ảnh sản phẩm</label>
                  <input type="file" id="picture" name="file">
                </div>

                <div class="form-group">
                  <label>Danh mục</label>
                  <select id="category" name="category">
                    <?php
                    include('../phantrangfrontend/connect.php');
                    $danhmuc="SELECT * FROM categories";
                    $results=mysqli_query($connect, $danhmuc);
                    while($row=mysqli_fetch_assoc($results)){
                    echo "<option value=".$row['id_cate'].">".$row['name_cate']."</option>";
                    }
                    ?>
                  </select>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer" style="background-color: unset; text-align: center;">
                <button type="submit" class="btn btn-primary">Thêm</button>
              </div>
        </form>
        </div>
        <div class="col-sm-3"></div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php 
  include("phantrangadmin/footer.php");
  ?>
  <script type="text/javascript">
    CKEDITOR.replace('description');
  </script>
</body>
</html>
