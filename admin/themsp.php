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
        <div class="col-sm-6" style="border-radius: 15px; border: 1px solid green; background: #f6f3f3;">
          <form role="form" action="xulybackend/xulythemsp.php" method="POST" enctype="multipart/form-data">
              <div class="box-body">

                <div class="form-group">
                  <label for="name_pro">Tên sản phẩm</label>
                  <input type="text" class="form-control" id="name_pro" name="name_pro" placeholder="Nhập tên sản phẩm" required>
                </div>

                <div class="form-group">
                  <label for="price">Giá sản phẩm</label>
                  <input type="text" class="form-control" id="price" name="price" placeholder="Nhập giá sản phẩm" required>
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
                  <textarea class="form-control" id="description" name="description" rows="10" placeholder="Nhập mô tả sản phẩm" required></textarea>
                </div>

                <div class="form-group">
                  <label for="picture">Hình ảnh sản phẩm</label><br>
                  <img id="image" height="100" width="100"/>
                  <input type="file" id="picture" name="file" required>
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
    <div class="row center-block">
        <div class="col-sm-3" style="margin-bottom: 10px;">
        <button onclick="location.href='danhsachsp.php'" style="margin-right: 10px; ">Trở lại</button>
        </div>
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php 
  include("phantrangadmin/footer.php");
  ?>
  <script type="text/javascript">
    CKEDITOR.replace('description');
  </script>
  <script>
    document.getElementById("picture").onchange = function () {
    var reader = new FileReader();

    reader.onload = function (e) {
        // get loaded data and render thumbnail.
        document.getElementById("image").src = e.target.result;
    };

    // read the image file as a data URL.
    reader.readAsDataURL(this.files[0]);
    };
  </script>
</body>
</html>
