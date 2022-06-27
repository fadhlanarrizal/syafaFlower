<?php 
require '../koneksi.php';
session_start();
if($_SESSION['users']['username'] !== "admin"){
    echo "<script>alert('Maaf anda bukan admin');</script>";
    echo "<script>location='../index.php';</script>";
}
?>