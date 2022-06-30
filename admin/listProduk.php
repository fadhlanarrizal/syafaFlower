<?php
session_start();
require ('../koneksi.php');

include 'khususAdmin.php';

// if (isset($_GET['halaman'])){
//     if ($_GET['halaman'] == "hapusid"){
//         include 'hapusProduk.php';
//     }
// } else {
//     include 'index.php';
// }
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include '../assets/link.php'; ?>
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="../assets/style.css">
    <title>List Produk</title>
</head>

<body>
    <header>
        <?php include'navbar.php'; ?>
    </header>
    <section class="cart">
        <div class="container">
            <h1 class="title">List Produk</h1>
            <table class="styled-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Produk</th>
                        <th>Produk</th>
                        <th>Harga Produk</th>
                        <th>Jumlah</th>
                        <th>Operasi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1;?>
                    <?php $products = $con->query("SELECT * FROM products");?>
                    <?php foreach ($products as $product) : ?>
                    <tr>
                        <td><?php echo $no;?></td>
                        <td><?php echo $product['product_code'];?></td>
                        <td><?=$product['name'];?></td>
                        <td><?=$product['price'];?></td>
                        <td><?=$product['quantity'];?></td>
                        <td>
                            <div class="padding-btn">
                                <a href="hapusProduk.php?halaman=hapusid&id=<?=$product['id'];?>" class="checkout-btn" onclick="return confirm('Yakin Hapus?')">Hapus</a>
                                <a href="ubahProduk.php?halaman=ubahproduk&id=<?=$product['id'];?>" class="checkout-btn">Ubah</a>
                            </div>
                        </td>
                    </tr>


                    <?php $no++ ?>
                    <?php endforeach ?>
                </tbody>
        </div>
    </section>
</body>

</html>