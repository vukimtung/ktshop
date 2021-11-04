<!DOCTYPE html>
<html lang="en">
<?php 
  include("../phantrangnhanvien/session.php");
?>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="index.css">
  <title>In Hóa Đơn</title>
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
      HÓA ĐƠN THANH TOÁN
      <br />
      -------oOo-------
    </div>
    <br />
    <br />
    <div class="info">
    <?php
      include('../../phantrangfrontend/connect.php');
      $id_don = $_GET['id_dh'];
      $sql="SELECT * FROM orders o LEFT JOIN customers c ON o.customer_id = c.id_cust WHERE id_order = '$id_don'";
      $ketqua=$connect->query($sql);
      while ($kq=$ketqua->fetch_assoc()){ ?>
      <label for=""><strong>Tên khách hàng: </strong><?php echo $kq['name_cust']?></label><br/>
      <label for=""><strong>Số điện thoại giao hàng: </strong><?php echo $kq['phone']?></label><br/>
      <label for=""><strong>Địa chỉ giao hàng: </strong><?php echo $kq['address']?></label><br/><br/>
    </div>
    <table class="TableData">
      <tr>
        <th>STT</th>
        <th>Sản phẩm</th>
        <th>Đơn giá</th>
        <th>Giá giảm</th>
        <th>Số lượng</th>
        <th>Thành tiền</th>
      </tr>
      <?php
        $stt = 0;
        $sql1="SELECT * FROM order_details o LEFT JOIN products p ON o.product_id = p.id_pro WHERE order_id = '$id_don'";
        $ketqua1=$connect->query($sql1);
        while ($kq1=$ketqua1->fetch_assoc()){ 
          $stt ++;?>
      <tr>
        <td class="cotSTT"><?php echo $stt;?></td>
        <td class="cotTenSanPham"><?php echo $kq1['name_pro']?></td>
        <td class="cotGia"><?php echo number_format($kq1['price'])?> VND</td>
        <td class="cotGiagiam"><?php echo number_format($kq1['unitprice'])?> VND</td>
        <td class="cotSoLuong"><?php echo $kq1['quantity']?></td>
        <td class="cotSo"><?php 
        $t = $kq1['unitprice'] * $kq1['quantity'];
        echo number_format($t);?> VND</td>
      </tr>
      <?php } ?>
      <tr>
        <td colspan="5" class="tong">Tổng cộng</td>
        <td class="cottt"><?php echo number_format($kq['total'])?> VND</td>
      </tr>
    </table><br/><br/>
    <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
          <strong>Hình thức thanh toán: </strong>
          <?php
            if($kq['payment']=='Tiền mặt'){
              echo "Tiền mặt khi nhận hàng";
            } else { ?>
          <br/><img src="../dist/img/credit/paypal2.png" alt="Paypal">
           <?php }?>
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
          <label for=""><strong>Ngày đặt: </strong><?php echo $kq['date_order']?></label><br>
          <label for=""><strong>Ngày giao: </strong><?php echo $kq['delivery_date']?></label><br>
        </div>
        <!-- /.col -->
        <?php
          $id_don = $_GET['id_dh'];
          $sql2="SELECT * FROM orders o LEFT JOIN shipper s ON o.id_shipper = s.id_s WHERE id_order = '$id_don'";
          $ketqua2=$connect->query($sql2);
          $kq2=$ketqua2->fetch_assoc();
          if(isset($kq2['id_s'])){?>
        <div class="col-xs-6">
          <br><strong>Thông tin shipper</strong><br>
          <label for=""><strong>Họ Tên: </strong><?php echo $kq2['ten_s']?></label><br>
          <label for=""><strong>SĐT: </strong><?php echo $kq2['dienthoai_s']?></label><br>
          <label for=""><strong>Email: </strong><?php echo $kq2['email_s']?></label><br>
        </div>
        <?php } else {} ?>
        <!-- /.col -->
      </div>
    <div class="footer-right"> <strong>Nhân viên</strong><br />
      <?php
        $sql2="SELECT * FROM orders o LEFT JOIN nhanvien n ON o.id_nvien = n.id_nv WHERE id_order = '$id_don'";
        $ketqua2 = $connect->query($sql2);
        while ($kq2=$ketqua2->fetch_assoc()){ 
          echo $kq2['ten_nv'];
        }
        ?>
    </div>
  </div>
  <?php } ?>
</body>

</html>