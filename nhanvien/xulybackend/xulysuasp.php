<?php 
include("../../phantrangfrontend/connect.php");
if (isset($_POST['sua'])) {
	$newid=$_POST['form_id'];
	$name_pro=$_POST['name_pro'];
	$price=$_POST['price'];
	$giamgia1 = $_POST['giamgia1'];
	$description=$_POST['description'];
	$unit=$_POST['unit'];
	$category=$_POST['category'];
	$anh=$_FILES['file']['name'];

	if($anh!=null){
		$target="uploads/products/";
		$file_path=$target.basename($_FILES['file']['name']);
		$file_name=$_FILES['file']['name'];
		$file_tmp=$_FILES['file']['tmp_name'];
		$file_store="../../uploads/products/".$file_name;

		move_uploaded_file($file_tmp, $file_store);
		if($unit!=null) {
			$sql="UPDATE products SET name_pro = '$name_pro', price = '$price', id_giagiam = '$giamgia1', description = '$description', unit = '$unit', picture = '$file_path', category_id = '$category' WHERE id_pro = '$newid'";
		} else {
			$sql="UPDATE products SET name_pro = '$name_pro', price = '$price', id_giagiam = '$giamgia1', description = '$description', picture = '$file_path', category_id = '$category' WHERE id_pro = '$newid'";
		}
		if (mysqli_query($connect, $sql)) {
			echo "<script>alert('Cập nhật thành công.');
						window.location.href='../danhsachsp.php';
				</script>";
		} else {
			
		}
	} else {
		if($unit!=null) {
			$sql="UPDATE products SET name_pro = '$name_pro', price = '$price',id_giagiam = '$giamgia1', description = '$description', unit = '$unit', category_id = '$category' WHERE id_pro = '$newid'";
		} else {
			$sql="UPDATE products SET name_pro = '$name_pro', price = '$price',id_giagiam = '$giamgia1', description = '$description', category_id = '$category' WHERE id_pro = '$newid'";
		}
		if (mysqli_query($connect, $sql)) {
			echo "<script>alert('Cập nhật thành công.');
						window.location.href='../danhsachsp.php';
				</script>";
		} else {
		}
	}
	
	

}

?>