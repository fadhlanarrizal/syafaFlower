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
    <link rel="stylesheet" href="../assets/style.css">
    <title>List Produk</title>
</head>

<body>
    <header>
        <nav class="admin-menu">
            <ul>
                <li><a href="../index.php">Halaman Website</a></li>
                <li><a href="index.php">Home</a></li>
                <li><a href="tambahProduk.php">Tambah Produk</a></li>
                <li><a href="users.php">List Produk</a></li>
                <li><a href="listOrder.php">List Order</a></li>
                <li><a href="users.php">List Users</a></li>
                <li><a href="../login/logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <section class="cart">
        <div class="container">
            <h1>List Produk</h1>
            <hr>
            <table class="table">
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
                            <button><a href="hapusProduk.php?halaman=hapusid&id=<?=$product['id'];?>" class="next-btn" onclick="return confirm('Yakin Hapus?')">Hapus</a></button>
                            <button><a href="ubahProduk.php?halaman=ubahproduk&id=<?=$product['id'];?>" class="next-btn">Ubah</a></button>
                        </td>
                    </tr>


                    <?php $no++ ?>
                    <?php endforeach ?>
                </tbody>
        </div>
    </section>
</body>

</html>