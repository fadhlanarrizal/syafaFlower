<?php
session_start();
// mendapat code product dari URL
if ($_SESSION["users"]["username"] == "admin"){
    echo htmlspecialchars("<script>alert('Selamat Datang Admin');</script>");
    // header ('Location:../cart/checkout.php');
    echo "<script>location='../admin/index.php';</script>";
}
$id_product = $_GET["id"];

// jika sudah ada produk di cart, maka produk itu jumlahnya di +1

if (isset($_SESSION['cart'][$id_product])) {
    $_SESSION['cart'][$id_product]+=1;
} 
    // jika selain itu(belum ada di keranjang) maka produk itu dianggap dibeli 1
else {
    $_SESSION['cart'][$id_product] = 1;
}

// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";

// larikan ke page cart

echo "<script>alert('produk telah masuk ke keranjang belanja');</script>";
echo "<script>location='cart.php';</script>";

?>