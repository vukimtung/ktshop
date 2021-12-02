<?php 
include("../../phantrangfrontend/connect.php");

$name_cate=$_POST['name_cate'];

$sql="INSERT INTO categories(name_cate) VALUES('$name_cate')";

$connect->query($sql);
echo "<script>alert('Thêm thành công.');
            window.location.href='../danhmucsp.php';
    </script>";
?>