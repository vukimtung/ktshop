<?php
session_start();
if (isset($_SESSION['cart'])) {
	$check=array_column($_SESSION['cart'], 'item_name');
	if(in_array($_GET['cart_name'], $check)){
		echo "<script>
			alert('Sản phẩm này đã tồn tại trong giỏ hàng của bạn.');
			history.back();
		</script>";
	}else{
		$count=count($_SESSION['cart']);
		$_SESSION['cart'][$count]=array('item_id' => $_GET['cart_id'], 'item_name'=>$_GET['cart_name'], 'item_price'=>$_GET['cart_price'], 'item_picture'=>$_GET['cart_picture'], 'quantity'=>1);
		echo "<script>alert('Sản phẩm đã được thêm vào giỏ hàng.');
		history.back();
		</script>";
	}
	
} else {
	$_SESSION['cart'][0] = array('item_id' => $_GET['cart_id'], 'item_name'=>$_GET['cart_name'], 'item_price'=>$_GET['cart_price'], 'item_picture'=>$_GET['cart_picture'], 'quantity'=>1);
	echo "<script>alert('Sản phẩm đã được thêm vào giỏ hàng.');
	history.back();
	</script>";
}
?>