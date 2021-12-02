<?php 
include("../../phantrangfrontend/connect.php");

if (isset($_POST['them'])) {
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

    $target="uploads/nhanvien/";
    $file_path=$target.basename($_FILES['file']['name']);
    $file_name=$_FILES['file']['name'];
    $file_tmp=$_FILES['file']['tmp_name'];
    $file_store="../../uploads/nhanvien/".$file_name;

    move_uploaded_file($file_tmp, $file_store);

	$sql1="SELECT * FROM nhanvien WHERE email_nv='$email'";
			$results=$connect->query($sql1);
			$kq1=$results->fetch_assoc();
		
			if(isset($kq1)){
				echo "<script>
						alert('Email đã tồn tại');
						history.back();
					</script>";
			}else{
                if ($tinhtuoi < 18) {
                    echo "<script>alert('Phải lớn hơn 18 tuổi!');
                            history.back();
                        </script>";
                } else {
                    $sql="INSERT INTO nhanvien(ten_nv, password, email_nv, gioitinh, ngaysinh, dienthoai_nv, diachi_nv, avatar, id_quyen) VALUES('$ten_nv', '$password', '$email', '$gioitinh', '$ngaysinh', '$dienthoai', '$diachi', '$file_path', '$quyen')";

					$connect->query($sql);
					echo "<script>alert('Thêm thành công.');
								window.location.href='../danhsachnhanvien.php';
						</script>";
                }
			}
        }
?>