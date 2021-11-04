<?php
session_start();
include('../phantrangfrontend/connect.php');



$total = $_POST['total'];
$iddc = $_POST['address'];
$sdt = $_POST['phone'];
$hinhthuctt = "Tiền mặt";
$tinhtrang = 'Đơn hàng mới';

$sql3 = "SELECT * FROM dc_khachhang WHERE id_dc = '$iddc'";
		$ketqua3 = $connect->query($sql3);
		$kq3 = $ketqua3->fetch_assoc();
		$diachi = $kq3['diachi_kh'];


if (isset($_POST['thanhtoan'])) {

	if (!empty($_SESSION['customer_id'])) {
		$customer_id = $_SESSION['customer_id'];
	} else {
		$email_kh = $_SESSION['user_email_address'];
		$sql = "SELECT * FROM customers WHERE email_cust = '$email_kh'";
		$ketqua1 = $connect->query($sql);
		$kq1 = $ketqua1->fetch_assoc();
		$customer_id = $kq1['id_cust'];
	}

		$sql1 = "INSERT INTO orders(customer_id, address, phone, total, payment, status) 
				VALUES('$customer_id','$diachi','$sdt', '$total', '$hinhthuctt', '$tinhtrang')";
		$connect->query($sql1);

		$sql2 = "SELECT id_order FROM orders order by id_order DESC limit 1";
		$ketqua2 = $connect->query($sql2);
		$kq2 = $ketqua2->fetch_assoc();
		$orderid = $kq2['id_order'];

foreach ($_SESSION['cart'] as $key => $value) {
	$idsp=$value['item_id'];
	$soluong=$value['quantity'];
	$dongia = $value['item_price'];

	$sql3="INSERT INTO order_details(order_id, product_id, quantity, unitprice) VALUES('$orderid', '$idsp', '$soluong', '$dongia')";

	$connect->query($sql3);
}
		echo "<script>
				alert('Đặt hàng thành công');
				window.location.href='../thongtintk.php';
			</script>";
		unset($_SESSION['cart']);
		
} else {
	
}

if (isset($_POST['ttonline'])) {
	$_SESSION['total']=$total;
	$_SESSION['address']=$diachi;
	$_SESSION['phone']=$sdt;
	$_SESSION['payment']="Paypal";
	$_SESSION['status']=$tinhtrang;
	header('location: ../phantrangfrontend/paypal.php');
	}

?>