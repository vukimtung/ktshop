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
      <h1 style="text-align: center; color: red; font-weight: bold;">Sửa Sản Phẩm</h1>
      
    </section>
    <section class="content">
      <div class="row">
        <div class="col-sm-3">
        </div>
        <div class="col-sm-6">
          <form role="form" action="xulybackend/xulysuasp.php" method="POST" enctype="multipart/form-data">

            <?php
            $newid=$_GET['up_id'];
            include('../phantrangfrontend/connect.php');
            $sql="SELECT * FROM products WHERE id_pro='$newid'";
            $ketqua=$connect->query($sql);
            $kq=$ketqua->fetch_assoc();
            ?>

              <div class="box-body">
                <div class="form-group">
                  <label for="name_pro">Tên sản phẩm</label>
                  <input type="text" class="form-control" id="name_pro" name="name_pro" value="<?php echo $kq['name_pro']?>">
                </div>
                <div class="form-group">
                  <label for="price">Giá sản phẩm</label>
                  <input type="text" class="form-control" id="price" name="price" value="<?php echo $kq['price']?>">
                </div>

                <div class="form-group">
                  <label>Tính theo</label>
                  <select id="unit" name="tinhtheo">
                    <option 
                      <?php if($kq['unit']=='Hộp'){
                        echo 'selected';
                      ?>
                      value="<?php echo $row['unit'];?>">Hộp</option>
                    <option value="Cái">Cái</option>
                    <?php } else { ?>
                        value="<?php echo $row['unit'];?>">Cái</option>
                    <option value="Hộp">Hộp</option>
                      <?php } ?>
                  </select>
                </div>

                <div class="form-group">
                  <label for="description">Mô tả sản phẩm</label>
                  <textarea class="form-control" id="description" name="description" rows="10"><?php echo $kq['description']?></textarea>
                </div>
                <div class="form-group">
                  <label for="picture">Hình ảnh sản phẩm</label>
                  <input type="file" id="picture" name="file">
                  <img src="../<?php echo $kq['picture']?>" height="100" width="100">
                </div>
                <div class="form-group">
                  <label>Danh mục</label>
                  <select id="category" name="category">
                    <?php
                    $danhmuc="SELECT * FROM categories";
                    $results=mysqli_query($connect, $danhmuc);
                    while($row=mysqli_fetch_assoc($results)){?>
                       <option 
                        <?php if ($row['id_cate']==$kq['category_id']) {
                          echo "selected";
                        } ?>
                       value="<?php echo $row['id_cate'];?>"><?php echo $row['name_cate'];?></option>
                   <?php } ?>
                  </select>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer" style="background-color: unset; text-align: center;">
                <input type="hidden" value="<?php echo $kq['id_pro']?>" name="form_id">
                <button type="submit" class="btn btn-primary" name="sua">Sửa</button>
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
