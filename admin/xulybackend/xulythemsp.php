<?php 
include("../../phantrangfrontend/connect.php");

$name_pro=$_POST['name_pro'];
$price=$_POST['price'];
$giamgia = $_POST['giamgia'];
$description=$_POST['description'];
$category=$_POST['category'];
$unit=$_POST['tinhtheo'];

$target="uploads/products/";
$file_path=$target.basename($_FILES['file']['name']);
$file_name=$_FILES['file']['name'];
$file_tmp=$_FILES['file']['tmp_name'];
$file_store="../../uploads/products/".$file_name;

move_uploaded_file($file_tmp, $file_store);

$sql="INSERT INTO products(name_pro, price, id_giagiam, description, picture, category_id, unit) VALUES('$name_pro', '$price', '$giamgia', '$description', '$file_path','$category', '$unit')";

$connect->query($sql);
echo "<script>alert('Thêm thành công.');
            window.location.href='../danhsachsp.php';
    </script>";
?>