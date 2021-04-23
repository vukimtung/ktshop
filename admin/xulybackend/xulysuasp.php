<?php 
include("../../phantrangfrontend/connect.php");
if (isset($_POST['sua'])) {
	$newid=$_POST['form_id'];
	$name_pro=$_POST['name_pro'];
	$price=$_POST['price'];
	$description=$_POST['description'];
	$unit=$_POST['tinhtheo'];
	$category=$_POST['category'];
	$anh=$_FILES['file']['name'];

	if($anh!=null){
		$target="uploads/";
		$file_path=$target.basename($_FILES['file']['name']);
		$file_name=$_FILES['file']['name'];
		$file_tmp=$_FILES['file']['tmp_name'];
		$file_store="../../uploads/".$file_name;

		move_uploaded_file($file_tmp, $file_store);
		$sql="UPDATE products SET name_pro = '$name_pro', price = '$price', description = '$description', unit = '$unit', picture = '$file_path', category_id = '$category' WHERE id_pro = '$newid'";

		if (mysqli_query($connect, $sql)) {
			header('location: ../danhsachsp.php');
		} else {
			header('location: ../suasanpham.php');
		}
	} else {

		$sql="UPDATE products SET name_pro = '$name_pro', price = '$price', description = '$description', unit = '$unit', category_id = '$category' WHERE id_pro = '$newid'";

		if (mysqli_query($connect, $sql)) {
			header('location: ../danhsachsp.php');
		} else {
			header('location: ../suasanpham.php');
		}
	}
	
	

}

?>