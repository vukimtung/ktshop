<?php
session_start();
if (isset($_POST['xoa'])) {
	foreach ($_SESSION['cart'] as $key => $value) {
		if ($value['item_name']==$_POST['item_name']) {
			unset($_SESSION['cart'][$key]);
			$_SESSION['cart']=array_values($_SESSION['cart']);
			echo "
				<script>
					alert('Đã xóa sản phẩm ra khỏi giỏ hàng của bạn.');
					window.location.href='../giohang.php';
				</script>

			";
		}
	}
}

?>