<?php
session_start();
if(empty($_SESSION['email_nv'] AND $_SESSION['password_nv'])){
	header('location: dangnhapnv.php');
}
?>