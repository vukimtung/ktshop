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
            <h1 style="text-align: center; color: red; font-weight: bold;">Danh Sách Đơn Hàng </h1>
            </div>
            <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Đơn Hàng Số</th>
                  <th>Tên Khách Hàng</th>
                  <th>Tổng Đơn</th>
                  <th>Hình Thức Thanh Toán</th>
                  <th>Ngày Đặt</th>
                  <th>Trạng Thái</th>
                  <th>Shipper</th>
                  <th>Tùy chọn</th>
                </tr>
                </thead>
                <tbody>
                <?php
                include('../phantrangfrontend/connect.php');
                $stt = 0;
                $sql="SELECT * FROM orders o LEFT JOIN customers c ON o.customer_id = c.id_cust ORDER BY date_order DESC";
                $ketqua=$connect->query($sql);
                while ($kq=$ketqua->fetch_assoc()){ 
                    $stt++;
                  ?>
                  <tr>
                  <td><?php echo $stt?></td>
                  <td><?php echo $kq['name_cust']?></td>
                  <td><?php echo number_format($kq['total']);?> VND</td>
                  <td><?php echo $kq['payment']?></td>
                  <td><?php echo $kq['date_order']?></td>
                  <td><?php echo $kq['status']?></td>
                  <td>
                    <?php
                      if(($kq['id_shipper']=='0') && ($kq['status']!='Đơn hàng mới')){ ?>
                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#message<?php echo $kq['id_order'];?>">Chọn shipper</button>
                      <?php } else if($kq['status']=='Đơn hàng mới') { 
                        echo '';
                      } else if(($kq['id_shipper']!='0') && ($kq['status']=='Đã xác nhận')){ 
                        $ids = $kq['id_shipper'];
                        $sql1="SELECT * FROM shipper WHERE id_s = '$ids'";
                        $ketqua1=$connect->query($sql1);
                        $kq1=$ketqua1->fetch_assoc();
                        echo $kq1['ten_s'].'&nbsp;';
                        echo '<button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#doishipper'.$kq['id_order'].'"><i class="fa fa-refresh"></i>Đổi</button>';
                      } else {
                        // $sql1="SELECT * FROM orders o LEFT JOIN shipper s ON o.id_shipper = s.id_s ORDER BY id_shipper DESC";
                        $ids = $kq['id_shipper'];
                        $sql1="SELECT * FROM shipper WHERE id_s = '$ids'";
                        $ketqua1=$connect->query($sql1);
                        $kq1=$ketqua1->fetch_assoc();
                        echo $kq1['ten_s'];
                      }
                    ?>
                  </td>
                  <td>
                  <?php
                      $id_q = $_SESSION['id_quyen'];
                      $sql1="SELECT * FROM roles WHERE id_r = '$id_q'";
                      $ketqua1=$connect->query($sql1);
                      $kq1=$ketqua1->fetch_assoc();
                      if(($kq1['ten_r']=='Toàn quyền') || ($kq1['ten_r']=='Xóa')){
                    ?>
                      <a href="chitietdonhang.php?id_dh=<?php echo $kq['id_order']?>" style="padding-right: 20px" class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"> Xem</i></a>
                      <a href="xulybackend/xoadonhang.php?id_dh=<?php echo $kq['id_order']?>" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"> Xóa</i></a>
                      <a href="./indonhang/indonhang.php?id_dh=<?php echo $kq['id_order']?>" class="btn btn-primary"><i class="fa fa-print" aria-hidden="true"> In</i></a>
                   <?php } elseif(($kq1['ten_r']=='Sửa') || ($kq1['ten_r']=='Xem')){?>
                    <a href="chitietdonhang.php?id_dh=<?php echo $kq['id_order']?>" style="padding-right: 20px" class="btn btn-success"><i class="fa fa-eye" aria-hidden="true"> Xem</i></a>
                    <a href="./indonhang/indonhang.php?id_dh=<?php echo $kq['id_order']?>" class="btn btn-primary"><i class="fa fa-print" aria-hidden="true"> In</i></a>
                     <?php } else {}?>
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

                <!-- Modal đổi shipper -->
                <div class="modal fade" id="doishipper<?php echo $kq['id_order'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content" style="border-radius: 5px;">
                  <div class="modal-header" style="text-align: center; border-bottom: none;">
                            <h2 class="modal-title" id="exampleModalLongTitle" style="color: red; font-weight: bold;">Thay đổi shipper</h2>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 45px; margin-top: -40px;">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <form role="form" action="xulybackend/doishipper.php" method="POST">
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
                        <button type="submit" class="btn btn-primary" name="doi">Chọn</button>
                        </div>
                        </div>
                        </form>
                        </div>
                    </div>
                    </div>
                <!-- end modal đổi shipper -->
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