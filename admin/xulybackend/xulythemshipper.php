<?php 
include("../../phantrangfrontend/connect.php");

if (isset($_POST['them'])) {
	$ten_s=$_POST['ten_s'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $gioitinh_s=$_POST['gioitinh_s'];
    $ngaysinh_s=$_POST['ngaysinh_s'];
    $a = getdate();
	$year = $a['0']; 
	$ngay = strtotime($ngaysinh_s);
	$tinhtuoi = floor(abs($a['0'] - $ngay) / (60*60*24*365));
    $dienthoai_s=$_POST['dienthoai_s'];
    $diachi_s=$_POST['diachi_s'];

    $target="uploads/shipper/";
    $file_path=$target.basename($_FILES['file']['name']);
    $file_name=$_FILES['file']['name'];
    $file_tmp=$_FILES['file']['tmp_name'];
    $file_store="../../uploads/shipper/".$file_name;

    move_uploaded_file($file_tmp, $file_store);

	$sql1="SELECT * FROM shipper WHERE email_s='$email'";
			$results=$connect->query($sql1);
			$kq1=$results->fetch_assoc();
		
			if(isset($kq1)){
				echo "<script>
						alert('Email đã tồn tại');
						history.back();
					</script>";
			}else{
                if ($tinhtuoi < 15) {
                    echo "<script>alert('Phải lớn hơn 15 tuổi!');
                            history.back();
                        </script>";
                } else {
                    $sql="INSERT INTO shipper(ten_s, password, email_s, gioitinh_s, ngaysinh_s, dienthoai_s, diachi_s, avatar) 
                    VALUES('$ten_s', '$password', '$email', '$gioitinh_s', '$ngaysinh_s', '$dienthoai_s', '$diachi_s', '$file_path')";

					$connect->query($sql);
					echo "<script>alert('Thêm thành công.');
								window.location.href='../danhsachshipper.php';
						</script>";
                }
			}
        }
?>