<?php 
include("../../phantrangfrontend/connect.php");
if (isset($_POST['sua'])) {
	$newid=$_POST['form_id'];
	$ptgg1=$_POST['ptgg1'];
		$sql="UPDATE giagiam SET phantramgiam = '$ptgg1' WHERE id_gg = '$newid'";

		if (mysqli_query($connect, $sql)) {
			echo "<script>alert('Cập nhật thành công.');
                window.location.href='../danhsachgiamgia.php';
            </script>";
		} else {
		}
} else {

}

?>