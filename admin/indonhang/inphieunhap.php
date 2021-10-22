<!DOCTYPE html>
<html lang="en">
<?php 
  include("../phantrangadmin/session.php");
?>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="index.css">
  <title>In Phiếu Nhập</title>
  <link rel="SHORTCUT ICON" href="https://www.facebook.com/images/emoji.php/v9/f64/1/16/1f370.png">
</head>

<body onload="window.print();">
  <div id="page" class="page">
    <div class="header">
      <div class="logo"><img src="https://www.facebook.com/images/emoji.php/v9/f64/1/16/1f370.png" style="width: 25px; height: 25px"> KT-Cake</div>
      <!-- <div class="company">Cửa Hàng Bánh KT-Cake</div> -->
    </div>
    <br />
    <div class="title">
      Phiếu Nhập Nguyên Liệu
      <br />
      -------oOo-------
    </div>
    <br />
    <br />
    <div class="info">
    <?php
      include('../../phantrangfrontend/connect.php');
      $id_don = $_GET['id_dnh'];
        $sql="SELECT * FROM donnhaphang d LEFT JOIN nhacungcap ncc ON d.id_ncc = ncc.id_n WHERE id_donnhap = '$id_don'";
        $ketqua=$connect->query($sql);
        $sql1="SELECT * FROM donnhaphang d LEFT JOIN nhanvien nv ON d.id_nvien = nv.id_nv WHERE id_donnhap = '$id_don'";
        $ketqua1=$connect->query($sql1);
      while (($kq=$ketqua->fetch_assoc()) && ($kq1=$ketqua1->fetch_assoc())){ ?>
      <label for=""><strong>Tên nhà cung cấp: </strong><?php echo $kq['ten_n']?></label><br/>
      <label for=""><strong>Số điện thoại: </strong><?php echo $kq['dienthoai_n']?></label><br/>
      <label for=""><strong>Địa chỉ: </strong><?php echo $kq['diachi_n']?></label><br/><br/>
    </div>
    <table class="TableData">
      <tr>
        <th>STT</th>
        <th>Tên nguyên liệu</th>
        <th>Đơn giá</th>
        <th>Số lượng</th>
        <th>Đơn vị tính</th>
      </tr>
      <?php
        $stt = 0;
        $id_ctdn = $_GET['idctdn'];
        $sql2="SELECT * FROM chitietdonnhap ctdn LEFT JOIN nguyenlieu nl ON ctdn.id_nglieu = nl.id_nl WHERE id_ctdn = '$id_ctdn' ORDER BY id_ctdn DESC";
        $ketqua2=$connect->query($sql2);
        while ($kq2=$ketqua2->fetch_assoc()){ 
          $stt ++;?>
      <tr>
        <td class="cotSTT"><?php echo $stt;?></td>
        <td class="cotTenSanPham"><?php echo $kq2['ten_nl']?></td>
        <td class="cotGia"><?php echo number_format($kq2['dgia']) . 'đ';?></td>
        <td class="cotGiagiam"><?php echo $kq2['sluong']?></td>
        <td class="cotSoLuong"><?php echo $kq2['dvt']?></td>
      </tr>
      <?php } ?>
      <tr>
        <td colspan="4" class="tong">Thành tiền</td>
        <td class="cottt"><?php echo number_format($kq['thanhtien']). 'đ';?></td>
      </tr>
    </table><br/><br/>
    <div class="row">
        <!-- /.col -->
        <div class="col-xs-6">
          <label for=""><strong>Ngày lập phiếu: </strong><?php echo $kq['ngaynhap']?></label><br>
        </div>
        <!-- /.col -->
      </div>
    <div class="footer-right"> <strong>Nhân viên lập</strong><br />
    <?php echo $kq1['ten_nv']?>
    </div>
  </div>
  <?php } ?>
</body>

</html>