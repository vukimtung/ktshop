<?php
session_start();

$soluong=$_POST['quantity'];


if (isset($_POST['capnhat'])) {
	foreach ($_SESSION['cart'] as $key => $value) {
		if ($value['item_name']==$_POST['item_name']) {
			$_SESSION['cart'][$key]['quantity'] = $soluong;
			echo "
				<script>
					alert('Sản phẩm đã được cập nhật.');
					window.location.href='../giohang.php';
				</script>

			";
		}
	}
}

?>