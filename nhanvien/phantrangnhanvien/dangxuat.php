<?php
session_start();
if(isset($_SESSION['email_nv'])){
    unset($_SESSION['email_nv']);
    header('location: ../dangnhapnv.php');
}
?>