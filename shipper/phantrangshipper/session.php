<?php
session_start();
if(empty($_SESSION['email_s'] AND $_SESSION['password_s'])){
	header('location: shipperlogin.php');
}
?>