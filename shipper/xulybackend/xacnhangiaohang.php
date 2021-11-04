<?php 
include("../../phantrangfrontend/connect.php");

if (isset($_POST['xacnhan'])) {
	$newid=$_POST['form_id'];
	$anh=$_FILES['fileToUpload']['name'];
    $ngaygiao = date('Y-m-d H:i:s');
    $tt = 'Đã giao';


	if($anh!=null){
		$target="uploads/imgconfirm/";
		$file_path=$target.basename($_FILES['fileToUpload']['name']);
		$file_name=$_FILES['fileToUpload']['name'];
		$file_tmp=$_FILES['fileToUpload']['tmp_name'];
		$file_store="../../uploads/imgconfirm/".$file_name;

		move_uploaded_file($file_tmp, $file_store);
        $sql="UPDATE orders SET delivery_date = '$ngaygiao', img_confirm = '$file_path', status = '$tt' WHERE id_order = '$newid'";
		if (mysqli_query($connect, $sql)) {
			echo "<script>alert('Giao hàng thành công.');
                history.back();
        </script>";
		} else {
			
		}
	} else {
        $sql="UPDATE orders SET delivery_date = '$ngaygiao', status = '$tt' WHERE id_order = '$newid'";
		if (mysqli_query($connect, $sql)) {
            echo "<script>alert('Giao hàng thành công.');
                history.back();
        </script>";
		} else {
		}
	}
	
	

}

?>