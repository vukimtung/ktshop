<?php 
include("../../phantrangfrontend/connect.php");

$name_cate=$_POST['name_cate'];

$sql="INSERT INTO categories(name_cate) VALUES('$name_cate')";

$connect->query($sql);
header('location: ../danhmucsp.php');
?>