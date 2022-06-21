<?php
require ('../koneksi.php');

$products = $con->query("SELECT * FROM products WHERE id='$_GET[id]'");
$product = $products->fetch_assoc();
$foto_produk = $product['image'];
if (file_exists("../assets/image/$foto_produk")) {
    unlink("../assets/image/$foto_produk");
}
    $con->query("DELETE FROM products WHERE id='$_GET[id]'");

    echo "<script>alert('produk dihapus');</script>";
    echo "<script>location='index.php';</script>";

?>