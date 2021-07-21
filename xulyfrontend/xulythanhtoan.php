<?php
session_start();
include('../phantrangfrontend/connect.php');



$total = $_POST['total'];
$diachi = $_POST['address'];
$sdt = $_POST['phone'];
$hinhthuctt = $_POST['hinhthuctt'];
$tinhtrang = 'Đơn hàng mới';
$ngaydat = date("d/m/Y");


if ($hinhthuctt=="Tiền mặt") {

	if (!empty($_SESSION['customer_id'])) {
		$customer_id = $_SESSION['customer_id'];
	} else {
		$email_kh = $_SESSION['user_email_address'];
		$sql = "SELECT * FROM customers WHERE email_cust = '$email_kh'";
		$ketqua1 = $connect->query($sql);
		$kq1 = $ketqua1->fetch_assoc();
		$customer_id = $kq1['id_cust'];
	}

$sql1 = "INSERT INTO orders(customer_id, address, phone, total, payment, date_order, status) VALUES('$customer_id','$diachi','$sdt', '$total', '$hinhthuctt', '$ngaydat', '$tinhtrang')";
$connect->query($sql1);

$sql2 = "SELECT id_order FROM orders order by id_order DESC limit 1";
$ketqua2 = $connect->query($sql2);
$kq2 = $ketqua2->fetch_assoc();
$orderid = $kq2['id_order'];

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


// Gửi mail đặt hàng





?>