<?php 
include("../../phantrangfrontend/connect.php");
if (isset($_POST['sua'])) {
	$newid=$_POST['form_id'];
	$ten_nv=$_POST['ten_nv'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $gioitinh=$_POST['gioitinh'];
    $ngaysinh=$_POST['ngaysinh'];
	$a = getdate();
	$year = $a['0']; 
	$ngay = strtotime($ngaysinh);
	$tinhtuoi = floor(abs($a['0'] - $ngay) / (60*60*24*365));
    $dienthoai=$_POST['dienthoai_nv'];
    $diachi=$_POST['diachi_nv'];
    $quyen = $_POST['role'];
	$anh=$_FILES['file']['name'];

	$sql1="SELECT * FROM nhanvien WHERE id_nv <> $newid ";
			$results=$connect->query($sql1);
			$kq1=$results->fetch_assoc();

	if($kq1['email_nv']==$email){
		echo "<script>
				alert('Email đã tồn tại');
				history.back();
			</script>";
	}else{
		if ($tinhtuoi < 18) {
			echo "<script>alert('Phải lớn hơn 18 tuổi!');
					window.location.href='../danhsachnhanvien.php';
				</script>";
		} else {
			if($anh!=null){
				$target="uploads/nhanvien/";
				$file_path=$target.basename($_FILES['file']['name']);
				$file_name=$_FILES['file']['name'];
				$file_tmp=$_FILES['file']['tmp_name'];
				$file_store="../../uploads/nhanvien/".$file_name;
		
				move_uploaded_file($file_tmp, $file_store);
				
				if($quyen!=null) {
					$sql="UPDATE nhanvien SET ten_nv = '$ten_nv', email_nv = '$email', password = '$password', gioitinh = '$gioitinh', ngaysinh = '$ngaysinh',
						dienthoai_nv = '$dienthoai', diachi_nv = '$diachi', avatar = '$file_path', id_quyen = '$quyen' WHERE id_nv = '$newid'";
				} else {
					$sql="UPDATE nhanvien SET ten_nv = '$ten_nv', email_nv = '$email', password = '$password', gioitinh = '$gioitinh', ngaysinh = '$ngaysinh',
						dienthoai_nv = '$dienthoai', diachi_nv = '$diachi', avatar = '$file_path' WHERE id_nv = '$newid'";
				}
				if (mysqli_query($connect, $sql)) {
					echo "<script>alert('Cập nhật thành công.');
								window.location.href='../danhsachnhanvien.php';
						</script>";
				} else {
				}
			} else {
				if($quyen!=null) {
					$sql="UPDATE nhanvien SET ten_nv = '$ten_nv', email_nv = '$email', password = '$password', gioitinh = '$gioitinh', ngaysinh = '$ngaysinh',
						dienthoai_nv = '$dienthoai', diachi_nv = '$diachi',  id_quyen = '$quyen' WHERE id_nv = '$newid'";
				} else {
					$sql="UPDATE nhanvien SET ten_nv = '$ten_nv', email_nv = '$email', password = '$password', gioitinh = '$gioitinh', ngaysinh = '$ngaysinh',
						dienthoai_nv = '$dienthoai', diachi_nv = '$diachi', id_quyen = '$quyen' WHERE id_nv = '$newid'";
				}
				if (mysqli_query($connect, $sql)) {
					echo "<script>alert('Cập nhật thành công.');
								window.location.href='../danhsachnhanvien.php';
						</script>";
				} else {
				}
			}
		}
	}
}

?>