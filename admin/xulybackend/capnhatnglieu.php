<?php 
include("../../phantrangfrontend/connect.php");
if (isset($_POST['sua'])) {
	$newid=$_POST['form_id'];
	$tennl=$_POST['tennl'];
	$sl=$_POST['sl'];
	$dvt=$_POST['dvt'];
		$sql="UPDATE nguyenlieu SET ten_nl = '$tennl', sl = '$sl', dvt = '$dvt' WHERE id_nl = '$newid'";

		if (mysqli_query($connect, $sql)) {
			echo "<script>alert('Cập nhật thành công.');
                window.location.href='../dsnguyenlieu.php';
            </script>";
		} else {
		}
} else {

}

?>