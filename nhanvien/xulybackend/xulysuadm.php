<?php 
include("../../phantrangfrontend/connect.php");
if (isset($_POST['sua'])) {
	$newid=$_POST['form_id'];
	$name_cate=$_POST['name_cate'];
		$sql="UPDATE categories SET name_cate = '$name_cate' WHERE id_cate = '$newid'";

		if (mysqli_query($connect, $sql)) {
			echo "<script>alert('Cập nhật thành công.');
                window.location.href='../danhmucsp.php';
            </script>";
		} else {
		}
} else {

}

?>