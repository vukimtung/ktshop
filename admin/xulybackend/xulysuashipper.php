<?php 
include("../../phantrangfrontend/connect.php");
if (isset($_POST['sua'])) {
	$newid=$_POST['form_id'];
	$ten_s=$_POST['ten_s'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $gioitinh=$_POST['gioitinh_s'];
    $ngaysinh=$_POST['ngaysinh_s'];
	$a = getdate();
	$year = $a['0']; 
	$ngay = strtotime($ngaysinh);
	$tinhtuoi = floor(abs($a['0'] - $ngay) / (60*60*24*365));
    $dienthoai=$_POST['dienthoai_s'];
    $diachi=$_POST['diachi_s'];
	$anh=$_FILES['file']['name'];

	$sql1="SELECT * FROM shipper WHERE id_s<>$newid";
			$results=$connect->query($sql1);
			$kq1=$results->fetch_assoc();

	if($kq1['email_s']==$email){
		echo "<script>
				alert('Email đã tồn tại');
				history.back();
			</script>";
	}else{
		if ($tinhtuoi < 18) {
			echo "<script>alert('Phải lớn hơn 18 tuổi!');
				window.location.href='../danhsachshipper.php';
				</script>";
		} else {
			if($anh!=null){
				$target="uploads/shipper/";
				$file_path=$target.basename($_FILES['file']['name']);
				$file_name=$_FILES['file']['name'];
				$file_tmp=$_FILES['file']['tmp_name'];
				$file_store="../../uploads/shipper/".$file_name;
		
				move_uploaded_file($file_tmp, $file_store);
				
				$sql="UPDATE shipper SET ten_s = '$ten_s', email_s = '$email', password = '$password', gioitinh_s = '$gioitinh', ngaysinh_s = '$ngaysinh',
						dienthoai_s = '$dienthoai', diachi_s = '$diachi', avatar = '$file_path' WHERE id_s = '$newid'";
				if (mysqli_query($connect, $sql)) {
					echo "<script>alert('Cập nhật thành công.');
								window.location.href='../danhsachshipper.php';
						</script>";
				} else {
		
				}
				} else {
					$sql="UPDATE shipper SET ten_s = '$ten_s', email_s = '$email', password = '$password', gioitinh_s = '$gioitinh', ngaysinh_s = '$ngaysinh',
							dienthoai_s = '$dienthoai', diachi_s = '$diachi' WHERE id_s = '$newid'";
					if (mysqli_query($connect, $sql)) {
						echo "<script>alert('Cập nhật thành công.');
									window.location.href='../danhsachshipper.php';
							</script>";
					} else {
					}
				}
		}
	}
}

?>