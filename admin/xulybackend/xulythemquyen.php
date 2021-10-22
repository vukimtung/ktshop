<?php 
include("../../phantrangfrontend/connect.php");

$name_role=$_POST['name_role'];
$description=$_POST['description'];

$sql="INSERT INTO roles(ten_r, mota_r) VALUES('$name_role', '$description')";

$connect->query($sql);
echo "<script>alert('Thêm thành công.');
            window.location.href='../danhsachquyen.php';
    </script>";
?>