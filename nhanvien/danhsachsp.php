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
            <h1 style="text-align: center; color: red; font-weight: bold;">Danh Sách Sản Phẩm</h1>
                <ol class="breadcrumb">
                    <li>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">
                        Thêm sản phẩm
                    </button>
                    </li>
                </ol>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Tên sản phẩm</th>
                  <th>Giá</th>
                  <th>Giá giảm</th>
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
                $sql1="SELECT * FROM products p LEFT JOIN giagiam g ON p.id_giagiam = g.id_gg";
                $ketqua1=$connect->query($sql1);
                while (($kq=$ketqua->fetch_assoc()) && ($kq1=$ketqua1->fetch_assoc())){ ?>
                  <tr>
                  <td><?php echo $kq['name_pro']?></td>
                  <td><?php echo number_format($kq['price']). ' đ';?></td>
                  <td><?php 
                  $idg = $kq1['id_giagiam'];
                  $g="SELECT * FROM giagiam WHERE id_gg = $idg";
                  $ketqua2=$connect->query($g);
								  $kq2=$ketqua2->fetch_assoc();
                  echo number_format($kq['price'] - (($kq['price'] * $kq2['phantramgiam']) / 100)). ' đ (-' . $kq2['phantramgiam'].'%)';?></td>
                  <td><img src="../<?php echo $kq['picture']?>" alt="hình ảnh sản phẩm" style="height: 120px; width: 120px; object-fit: cover;"></td>
                  <td><?php echo $kq['description']?></td>
                  <td><?php echo $kq['unit']?></td>
                  <td><?php echo $kq['name_cate']?></td>
                  <td>
                  <?php
                      $id_q = $_SESSION['id_quyen'];
                      $sql2="SELECT * FROM roles WHERE id_r = '$id_q'";
                      $ketqua2=$connect->query($sql2);
                      $kq2=$ketqua2->fetch_assoc();
                      if($kq2['ten_r']=='Toàn quyền'){
                    ?>
                      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#message<?php echo $kq['id_pro'];?>"><i class="fa fa-eye" aria-hidden="true"> Sửa</i></button>
                      <a href="xulybackend/xoasanpham.php?del_id=<?php echo $kq['id_pro']?>" style="padding-right: 20px" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"> Xóa</i></a>
                    <?php } elseif($kq2['ten_r']=='Sửa'){?>
                      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#message<?php echo $kq['id_pro'];?>"><i class="fa fa-eye" aria-hidden="true"> Sửa</i></button>
                      <?php } elseif($kq2['ten_r']=='Xóa'){?>
                      <a href="xulybackend/xoasanpham.php?del_id=<?php echo $kq['id_pro']?>" style="padding-right: 20px" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"> Xóa</i></a>
                        <?php } else {}?>
                  </td>
                </tr>

                <!-- Modal sửa -->
                <div class="modal fade" id="message<?php echo $kq['id_pro'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content" style="border-radius: 5px;">
                    <div class="modal-header" style="text-align: center; border-bottom: none;">
                            <h2 class="modal-title" id="exampleModalLongTitle" style="color: red; font-weight: bold;">Sửa Sản Phẩm</h2>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 45px; margin-top: -40px;">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <form role="form" action="xulybackend/xulysuasp.php" method="POST" enctype="multipart/form-data">
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
                              <label>Giảm giá</label>&ensp;
                                <select id="giamgia1" name="giamgia1">
                                  <?php
                                  $giamgia="SELECT * FROM giagiam";
                                  $results=mysqli_query($connect, $giamgia);
                                  while($row=mysqli_fetch_assoc($results)){?>
                                    <option 
                                      <?php if ($row['id_gg']==$kq1['id_giagiam']) {
                                        echo "selected";
                                      } ?>
                                    value="<?php echo $row['id_gg'];?>"><?php echo $row['phantramgiam'];?> %</option>
                                <?php } ?>
                                </select>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                                <label>Tính theo</label>&ensp;
                                <select id="unit" name="unit">
                                    <?php if($kq['unit']=='Hộp'){?>
                                    <option selected value="Hộp">Hộp</option>
                                    <option value="Cái">Cái</option>
                                    <?php } else { ?>
                                    <option value="Cái" selected>Cái</option>
                                    <option value="Hộp">Hộp</option>
                                    <?php } ?>
                                </select>
                              </div>

                              <div class="form-group">
                                <label for="description">Mô tả sản phẩm</label>
                                <textarea class="form-control" id="description" name="description" rows="10"><?php echo $kq['description']?></textarea>
                              </div>
                              <div class="form-group">
                                <label for="picture">Hình ảnh sản phẩm</label><br>
                                <img src="../<?php echo $kq['picture']?>" height="100" width="100" id="image">
                                <input type="file" id="picture" name="file">
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
                            <div class="box-footer" style="background-color: unset; text-align: center;">
                              <input type="hidden" value="<?php echo $kq['id_pro']?>" name="form_id">
                              <button type="submit" class="btn btn-primary" name="sua">Sửa</button>
                            </div>
                      </form>
                        </div>
                    </div>
                    </div>
                <!-- end modal sửa -->

                <?php } ?>
              </table>
            </div>

            <!-- Modal thêm -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" style="border-radius: 5px;">
                  <div class="modal-header" style="text-align: center; border-bottom: none;">
                    <h2 class="modal-title" id="exampleModalLongTitle" style="color: red; font-weight: bold;">Thêm sản phẩm</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 45px; margin-top: -40px;">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
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
                  <label>Giảm giá</label>&ensp;
                  <select id="giamgia" name="giamgia">
                    <?php
                    include('../phantrangfrontend/connect.php');
                    $danhmuc="SELECT * FROM giagiam";
                    $results=mysqli_query($connect, $danhmuc);
                    while($row=mysqli_fetch_assoc($results)){
                    echo "<option value=".$row['id_gg'].">".$row['phantramgiam']." % </option>";
                    }
                    ?>
                  </select>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                  <label>Tính theo</label>&ensp;
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
                  <img id="image1" height="100" width="100"/>
                  <input type="file" id="picture1" name="file" required>
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
            </div>
            </div>
            <!-- end modal thêm -->

          </div>
        </div>
      </div>
    </section>
  </div>
<?php
include('phantrangnhanvien/footer.php')
?>

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

<script>
    document.getElementById("picture1").onchange = function () {
    var reader = new FileReader();

    reader.onload = function (e) {
        // get loaded data and render thumbnail.
        document.getElementById("image1").src = e.target.result;
    };

    // read the image file as a data URL.
    reader.readAsDataURL(this.files[0]);
    };
  </script>
</body>
</html>
