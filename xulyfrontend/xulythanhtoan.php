<?php
session_start();
include('../phantrangfrontend/connect.php');


$total = $_POST['total'];
$diachi = $_POST['address'];
$sdt = $_POST['phone'];
$hinhthuctt = $_POST['hinhthuctt'];
$tinhtrang = 'Đơn hàng mới';
$ngaydat = date("d/m/Y");
$customer_id = $_SESSION['customer_id'];

if ($hinhthuctt=="Tiền mặt") {

$sql = "INSERT INTO orders(customer_id, address, phone, total, payment, date_order, status) VALUES('$customer_id','$diachi','$sdt', '$total', '$hinhthuctt', '$ngaydat', '$tinhtrang')";
$connect->query($sql);

$sql2 = "SELECT id_order FROM orders order by id_order DESC limit 1";
$ketqua = $connect->query($sql2);
$kq = $ketqua->fetch_assoc();
$orderid = $kq['id_order'];

foreach ($_SESSION['cart'] as $key => $value) {
	$idsp=$value['item_id'];
	$soluong=$value['quantity'];

	$sql3="INSERT INTO order_details(order_id, product_id, quantity) VALUES('$orderid', '$idsp', '$soluong')";

	$connect->query($sql3);
}
		echo "<script>
					alert('Đặt hàng thành công');
					window.location.href='../thongtintk.php';
				</script>";
} else {
	
}

if (isset($_POST['ttonline'])) {
	$_SESSION['total']=$total * 0.000044;
	$_SESSION['address']=$diachi;
	$_SESSION['phone']=$sdt;
	$_SESSION['payment']="palpay";
	$_SESSION['status']=$tinhtrang;
	header('location: ../phantrangfrontend/paypal.php');
	}
	

		if (isset($_POST['thanhtoan'])) {
			unset($_SESSION['cart']);
		}

		

?>