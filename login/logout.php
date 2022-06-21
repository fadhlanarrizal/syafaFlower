<?php
session_start();

session_destroy();
echo "<script>alert('anda telah logout');</script>";
// header('location:../index.php');
echo "<script>location='../index.php';</script>";
?>