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
                <h1 style="text-align: center; color: red; font-weight: bold;">Danh Sách Đơn Nhập Hàng</h1>
                <ol class="breadcrumb">
                    <li>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">
                        Tạo Đơn
                    </button>
                    </li>
                </ol>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>STT</th>
                  <th>Tên nguyên liệu</th>
                  <th>Đơn giá</th>
                  <th>Số lượng nhập</th>
                  <th>Đơn vị tính</th>
                  <th>Thành tiền</th>
                  <th>Ngày nhập</th>
                  <th>Nhân viên tạo đơn</th>
                  <th>Nhà cung cấp</th>
                  <th>Tùy chọn</th>
                </tr>
                </thead>
                <tbody>
                <?php
                include('../phantrangfrontend/connect.php');
                $stt = 0;
                $sql="SELECT * FROM donnhaphang d LEFT JOIN nhacungcap ncc ON d.id_ncc = ncc.id_n";
                $ketqua=$connect->query($sql);
                $sql1="SELECT * FROM donnhaphang d LEFT JOIN nhanvien nv ON d.id_nvien = nv.id_nv";
                $ketqua1=$connect->query($sql1);
                $sql2="SELECT * FROM chitietdonnhap ctdn LEFT JOIN nguyenlieu nl ON ctdn.id_nglieu = nl.id_nl";
                $ketqua2=$connect->query($sql2);
                
                    while (($kq=$ketqua->fetch_assoc()) && ($kq1=$ketqua1->fetch_assoc()) && ($kq2=$ketqua2->fetch_assoc())){ 
                    $stt++;
                    ?>
                  <tr>
                  <td><?php echo $stt;?></td>
                  <td><?php echo $kq2['ten_nl']?></td>
                  <td><?php echo number_format($kq2['dgia']) . 'đ';?></td>
                  <td><?php echo $kq2['sluong']?></td>
                  <td><?php echo $kq2['dvt']?></td>
                  <td><?php echo number_format($kq['thanhtien']). 'đ';?></td>
                  <td><?php echo $kq['ngaynhap']?></td>
                  <td><?php echo $kq1['ten_nv']?></td>
                  <td><?php echo $kq['ten_n']?></td>
                  <td>
                    <a href="./indonhang/inphieunhap.php?id_dnh=<?php echo $kq['id_donnhap']?>&idctdn=<?php echo $kq2['id_ctdn'];?>" class="btn btn-primary"><i class="fa fa-print" aria-hidden="true"> In</i></a>
                    <a href="xulybackend/xoaphieunhap.php?del_id=<?php echo $kq['id_donnhap']?>" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"> Xóa</i></a>
                    
                </td>
                </tr>

                <?php } ?>
              </table>
            </div>

            <!-- Modal tạo đơn-->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" style="border-radius: 5px;">
                  <div class="modal-header" style="text-align: center; border-bottom: none;">
                    <h2 class="modal-title" id="exampleModalLongTitle" style="color: red; font-weight: bold;">Đơn Nhập Hàng Mới</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 45px; margin-top: -40px;">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form role="form" action="xulybackend/taodonnhaphang.php" method="POST" enctype="multipart/form-data">
                    <div class="box-body">
                      <div class="form-group">
                        <label for="tennl">Tên Nguyên Liệu</label>
                        <input type="text" class="form-control" id="tennl" name="tennl" placeholder="Nhập tên nguyên liệu" required>
                      </div>

                      <div class="form-group">
                        <label for="name_pro">Số Lượng</label>
                        <input type="number" class="form-control" id="sluong"  min="0" name="sluong" placeholder="Nhập số lượng" required>
                      </div>

                      <div class="form-group">
                        <label for="price">Đơn Giá (VND)</label>
                        <input type="number" class="form-control" id="dgia" name="dgia" min="0" placeholder="Nhập đơn giá" required>
                      </div>

                      <div class="form-group">
                          <label for="" style="margin-right: 10px;"> Đơn Vị Tính</label>
                          <select id="dvt" name="dvt">
                            <option value="" >--Chọn DVT--</option>
                            <option value="Kg">Kilogram</option>
                            <!-- <option value="g">Gram</option> -->
                            <option value="Lít">Lít</option>
                            <!-- <option value="ml">Mililit</option> -->
                            <option value="Chai">Chai</option>
                            <option value="Quả">Quả (vd: trứng)</option>
                          </select>
                      </div>

                      <div class="form-group">
                          <label for="" style="margin-right: 10px;">Nhà Cung Cấp</label>
                          <select id="ncc" name="ncc">
                            <option value="">--Chọn nhà cung cấp--</option>
                          <?php
                          include('../phantrangfrontend/connect.php');
                          $sql="SELECT * FROM nhacungcap";
                          $ketqua=mysqli_query($connect, $sql);
                          while($row=mysqli_fetch_assoc($ketqua)){
                          echo "<option value=".$row['id_n'].">".$row['ten_n']."</option>";
                          }
                          ?>
                          </select>
                      </div>

                      
                    </div>

                    <div class="box-footer" style="background-color: unset; text-align: center;">
                      <button type="submit" class="btn btn-primary" name="them">Tạo Đơn</button>
                    </div>
              </form>
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#themnhacungcap" style="margin-left: 300px; margin-top: -210px;">
                        Thêm nhà cung cấp
                    </button>
                </div>
            </div>
            </div>
            <!-- end modal tạo đơn -->

            <!-- Modal thêm nhà cung cấp -->
            <div class="modal fade" id="themnhacungcap" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content" style="border-radius: 5px; margin-left: -20px;">
                <div class="modal-header" style="text-align: center; border-bottom: none;">
                    <h2 class="modal-title" id="exampleModalLongTitle" style="color: red; font-weight: bold;">Thêm Nhà Cung cấp</h2>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 45px; margin-top: -40px;">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <form role="form" action="xulybackend/xulythemncc.php" method="POST" enctype="multipart/form-data">
                    <div class="box-body">
                      <div class="form-group">
                        <label for="name_pro">Tên Nhà Cung Cấp</label>
                        <input type="text" class="form-control" id="ten_n" name="ten_n" placeholder="Nhập tên nhà cung cấp" required>
                      </div>

                      <div class="form-group">
                        <label for="name_pro">Địa Chỉ</label>
                        <input type="text" class="form-control" id="diachi_n" name="diachi_n" placeholder="Nhập địa chỉ" required>
                      </div>

                      <div class="form-group">
                        <label for="price">Số Điện Thoại</label>
                        <input type="text" class="form-control" id="dienthoai_n" name="dienthoai_n" placeholder="Nhập số điện thoại" required>
                      </div>

                    <div class="box-footer" style="background-color: unset; text-align: center;">
                      <button type="submit" class="btn btn-success" name="them">Thêm</button>
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
include('phantrangadmin/footer.php')
?>
</body>
</html>
