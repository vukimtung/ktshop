<?php
session_start();
if(isset($_SESSION['email_s'])){
    unset($_SESSION['email_s']);
    header('location: ../shipperlogin.php');
}
?>