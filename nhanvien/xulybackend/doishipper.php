<?php 
include("../../phantrangfrontend/connect.php");
if (isset($_POST['doi'])) {
	$newid=$_POST['form_id'];
	$id_shipper=$_POST['shipper'];
		$sql="UPDATE orders SET id_shipper = '$id_shipper' WHERE id_order = '$newid'";

		if (mysqli_query($connect, $sql)) {
			echo "<script>alert('Đổi shipper thành công.');
                    window.location.href='../dsdonhang.php';
                </script>";
		} else {
		}
} else {

}

?>