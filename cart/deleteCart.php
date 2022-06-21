<?php
session_start();

$id_product = $_GET["id"];
unset($_SESSION['cart'][$id_product]);

echo "<script>alert('produk dihapus dari keranjang');</script>";
echo "<script>location='cart.php';</script>";
// header('location:cart.php');

?>