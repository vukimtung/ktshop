<?php 

include("../phantrangfrontend/connect.php");

$email=$_POST['email'];
$msg=$_POST['msg'];

$sql="INSERT INTO contact(email,msg) VALUES('$email','$msg')";

$connect->query($sql);
echo "<script>
	window.location.href='../lienhe.php';
	</script>";
?>