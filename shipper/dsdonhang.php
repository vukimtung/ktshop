<!DOCTYPE html>
<html>
<?php 
  include("phantrangshipper/head.php");
  include("phantrangshipper/session.php");
?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php 
  include("phantrangshipper/header.php");
  include("phantrangshipper/aside.php");
  ?>

  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
            <h1 style="text-align: center; color: red; font-weight: bold;">Tất Cả Đơn Hàng Của Tôi </h1>
            </div>
            <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Đơn Hàng Số</th>
                  <th>Tên Khách Hàng</th>
                  <th>Tổng Đơn</th>
                  <th>Trạng Thái</th>
                  <th>Tùy chọn</th>
                </tr>
                </thead>
                <tbody>
                <?php
                include('../phantrangfrontend/connect.php');
                $idship = $_SESSION['id_s'];
                $stt = 0;
                $sql="SELECT * FROM orders o LEFT JOIN customers c ON o.customer_id = c.id_cust WHERE id_shipper = '$idship' ORDER BY date_order DESC ";
                $ketqua=$connect->query($sql);
                while ($kq=$ketqua->fetch_assoc()){ 
                    $stt++;
                  ?>
                  <tr>
                  <td><?php echo $stt?></td>
                  <td><?php echo $kq['name_cust']?></td>
                  <td><?php echo number_format($kq['total']);?> VND</td>
                  <td>
                    <?php 
                      if($kq['status']=='Đã xác nhận'){
                        echo "Đơn mới";
                      } else {
                        echo $kq['status'];
                      }
                    ?>
                  </td>
                  <td>
                    <a href="chitietdon.php?id_dh=<?php echo $kq['id_order']?>" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"> Xem</i></a>
                    <?php 
                      if($kq['status']=='Đã xác nhận'){ ?>
                      <a href="xulybackend/nhandonhang.php?id_dh=<?php echo $kq['id_order']?>" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"> Nhận đơn</i></a>
                      <?php } elseif ($kq['status']=='Đang giao'){?>
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#message<?php echo $kq['id_order'];?>"><i class="fa fa-check-square-o" aria-hidden="true"> Xác nhận giao thành công </i></button>
                        <?php } else {} ?>
                  </td>
                </tr>
                <!-- Modal xác nhận -->
                <div class="modal fade" id="message<?php echo $kq['id_order'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content" style="border-radius: 5px;">
                  <div class="modal-header" style="text-align: center; border-bottom: none;">
                            <h2 class="modal-title" id="exampleModalLongTitle" style="color: red; font-weight: bold;">Xác Nhận Giao Hàng Thành Công</h2>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 45px; margin-top: -40px;">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <form role="form" action="xulybackend/xacnhangiaohang.php" method="POST" enctype="multipart/form-data">
                          <div class="box-body">
                            <div class="form-group">
                              <label for="picture">Hình ảnh xác nhận</label><br>
                              <img id="image1" height="100" width="100"/>
                              <input type="file" name="fileToUpload" id="picture">
                            </div>
                          </div>
                          <div class="box-footer" style="background-color: unset; text-align: center;">
                          <input type="hidden" value="<?php echo $kq['id_order']?>" name="form_id">
                          <button type="submit" class="btn btn-success" name="xacnhan">Xác nhận</button>
                        </div>
                        </form>
                        </div>
                    </div>
                    </div>
                <!-- end modal xác nhận -->
                <?php } ?>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
<?php
include('phantrangshipper/footer.php')
?>
<script>
    document.getElementById("picture").onchange = function () {
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