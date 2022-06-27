<?php
require ('../koneksi.php');
include 'khususAdmin.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style.css">
    <title>Tambah Produk</title>
</head>
<body>
    <form method="post" enctype="multipart/form-data">
        <div class="form">
            <label>Kode Produk</label>
            <input type="text" class="form-control" name="product_code">
        </div>
        <div class="form">
            <label>Nama Barang</label>
            <input type="text" class="form-control" name="name">
        </div>
        <div class="form">
            <label>Harga</label>
            <input type="number" class="form-control" name="price">
        </div>
        <div class="form">
            <label>Asal</label>
            <input type="text" class="form-control" name="origin">
        </div>
        <div class="form">
            <label>Jumlah</label>
            <input type="text" class="form-control" name="quantity">
        </div>
        <div class="form">
            <label>Foto</label>
            <input type="file" class="form-control" name="foto">
        </div>
        <button class="checkout-btn" name="save">Simpan</button>
    </form>

    <?php
        if (isset($_POST['save'])){
            $foto = $_FILES['foto']['name'];
            $lokasi = $_FILES['foto']['tmp_name'];
            move_uploaded_file($lokasi, "../assets/image".$foto);
            $con->query("INSERT INTO products (product_code, name, origin, price, quantity, image) VALUES ('$_POST[product_code]', '$_POST[name]', '$_POST[origin]', '$_POST[price]', '$_POST[quantity]', '$foto')");
            echo "data tersimpan";
            echo "<meta http-equiv='refresh' content='1;url=listProduk.php?halaman=produk'>";
        }
    ?>
    
</body>
</html>