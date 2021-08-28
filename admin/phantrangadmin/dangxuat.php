<?php
session_start();
if(isset($_SESSION['email_ad'])){
    unset($_SESSION['email_ad']);
    header('location: ../adminlogin.php');
}
?>