<?php 
include("../../phantrangfrontend/connect.php");

if (isset($_POST['them'])) {
	$ten_n=$_POST['ten_n'];
    $dienthoai_n=$_POST['dienthoai_n'];
    $diachi_n=$_POST['diachi_n'];

    $sql="INSERT INTO nhacungcap(ten_n, dienthoai_n, diachi_n) VALUES('$ten_n', '$dienthoai_n', '$diachi_n')";
    $connect->query($sql);
    echo "<script>alert('Thêm thành công.');
                history.back();
        </script>";
        }
?>