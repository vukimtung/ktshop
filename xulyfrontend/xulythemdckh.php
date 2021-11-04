<?php 
include("../phantrangfrontend/connect.php");

if (isset($_POST['hoanthanh'])) {
	$idkh=$_POST['idkh'];
    $diachi=$_POST['dcnh'];

    $sql="INSERT INTO dc_khachhang(id_kh, diachi_kh) VALUES('$idkh', '$diachi')";
    $connect->query($sql);
    echo "<script>alert('Thêm thành công.');
                history.back();
        </script>";
        }
?>