<?php 

include("../phantrangfrontend/connect.php");

$name=$_POST['name'];
$email=$_POST['email'];
$review=$_POST['review'];
$rating=$_POST['rating'];
$idsp=$_POST['idsp'];

$sql="INSERT INTO comments(idsp, name_kh, email_kh, review, rating) VALUES('$idsp','$name', '$email', '$review', '$rating')";

$connect->query($sql);
echo "<script>
	history.back();
	</script>";
?>