<?php
include('../phantrangfrontend/connect.php');
session_start();
	if (isset($_GET['idkh']) ) {
		$cus_id=$_GET['idkh'];
		$total = $_GET['gia'];
		$diachi=$_SESSION['address'];
		$sdt=$_SESSION['phone'];
		$paypal=$_SESSION['payment'];
		$tinhtrang=$_SESSION['status'];

		$sql = "INSERT INTO orders(customer_id, address, phone, total, payment, status) 
			VALUES('$cus_id','$diachi','$sdt', '$total', '$paypal', '$tinhtrang')";
		$connect->query($sql);

		$sql2 = "SELECT id_order FROM orders order by id_order DESC limit 1";
		$ketqua = $connect->query($sql2);
		$kq = $ketqua->fetch_assoc();
		$orderid = $kq['id_order'];

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
		}
?>
