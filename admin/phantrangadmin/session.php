<?php
session_start();
if(empty($_SESSION['email_ad'] AND $_SESSION['password_ad'])){
	header('location: adminlogin.php');
}
?>