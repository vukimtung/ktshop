<?php 
include("../../phantrangfrontend/connect.php");

$ptgg=$_POST['ptgg'];

$sql="INSERT INTO giagiam(phantramgiam) VALUES('$ptgg')";

$connect->query($sql);
header('location: ../danhsachgiamgia.php');
?>