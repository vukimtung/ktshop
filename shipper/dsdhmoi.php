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
            <h1 style="text-align: center; color: red; font-weight: bold;">Danh Sách Đơn Hàng Mới</h1>
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
                $sql="SELECT * FROM orders o LEFT JOIN customers c ON o.customer_id = c.id_cust WHERE id_shipper = '$idship' AND status='Đã xác nhận' ORDER BY date_order DESC ";
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
                      <?php } ?>
                  </td>
                </tr>
                <!-- Modal sửa -->
                <div class="modal fade" id="message<?php echo $kq['id_order'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content" style="border-radius: 5px;">
                  <div class="modal-header" style="text-align: center; border-bottom: none;">
                            <h2 class="modal-title" id="exampleModalLongTitle" style="color: red; font-weight: bold;">Chọn shipper</h2>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 45px; margin-top: -40px;">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <form role="form" action="xulybackend/chonshipper.php" method="POST">
                        <div class="box-body">
                            <div class="form-group">
                            <label>Danh sách shipper:</label>&ensp;
                                <select id="shipper" name="shipper">
                                <?php
                                  $sql2="SELECT * FROM shipper";
                                  $ketqua2=$connect->query($sql2);
                                  while ($kq2=$ketqua2->fetch_assoc()){ ?>
                                    <option value="<?php echo $kq2['id_s']?>"><?php echo $kq2['ten_s'];?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="box-footer" style="background-color: unset; text-align: center;">
                        <input type="hidden" value="<?php echo $kq['id_order']?>" name="form_id">
                        <button type="submit" class="btn btn-primary" name="sua">Chọn</button>
                        </div>
                        </div>
                        </form>
                        </div>
                    </div>
                    </div>
                <!-- end modal sửa -->
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
</body>
</html>