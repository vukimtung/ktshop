<?php 

include("../phantrangfrontend/connect.php");

$id_khach=$_POST['id_khach'];
$review=$_POST['review'];
$rating=$_POST['rating'];
$idsp=$_POST['idsp'];

$sql="INSERT INTO comments(idsp,id_kh, review, rating) VALUES('$idsp','$id_khach', '$review', '$rating')";

$connect->query($sql);
echo "<script>
	history.back();
	</script>";
?>