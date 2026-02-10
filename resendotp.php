<?php
session_start();
include("db_conn.php");

if(!isset($_SESSION['email'])){
    header("Location: otp.php");
    exit();
}

$email = $_SESSION['email'];

$otp = rand(1000,9999);

$sql = "UPDATE otpver SET otp='$otp', status='Pending' WHERE email='$email'";
mysqli_query($conn, $sql);

$_SESSION['otp'] = $otp;

header("Location: otp.php");
exit();
?>
