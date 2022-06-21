<h2>Ubah Produk</h2>

<?php
require ('../koneksi.php');

$products = $con->query("SELECT * FROM products WHERE id='$_GET[id]'");
// pecahannya
$product = $products->fetch_assoc();

?>
<pre>
    <?php print_r($product); ?>
</pre>

<link rel="stylesheet" href="../assets/style.css">
<form method="post" enctype="multipart/form-data">
    <div class="form">
        <label>Kode Produk</label>
        <input type="text" name="product_code" class="form-control" value="<?= $product['product_code'] ?>">
    </div>
    <div class="form">
        <label>Nama Produk</label>
        <input type="text" name="name" class="form-control" value="<?= $product['name'] ?>">
    </div>
    <div class="form">
        <label>Harga</label>
        <input type="number" name="price" class="form-control" value="<?= $product['price'] ?>">
    </div>
    <div class="form">
        <label>Asal</label>
        <input type="text" name="origin" class="form-control" value="<?= $product['origin'] ?>">
    </div>
    <div class="form">
        <label>Stock</label>
        <input type="number" name="quantity" class="form-control" value="<?= $product['quantity'] ?>">
    </div>
    <div class="form">
        <img src="../assets/image<?= $product['image'] ?>" width="200">
    </div>
    <div class="form">
        <label>Gambar</label>
        <input type="file" name="image" class="form-control" value="<?= $product['image'] ?>">
    </div>
    <button name="ubah" class="btn next-btn">ubah</button>
</form>

<?php

if (isset($_POST['ubah'])){
    $foto = $_FILES['image']['name'];
    $lokasiFoto = $_FILES['image']['tmp_name'];
    
    if (!empty($lokasiFoto)){
        move_uploaded_file($lokasiFoto, "../assets/image/$foto");
        $con->query("UPDATE products SET product_code='$_POST[product_code]', name='$_POST[name]', origin='$_POST[origin]', price='$_POST[price]', quantity='$_POST[quantity]', image='$foto' WHERE id='$_GET[id]'");
    } else{
        $con->query("UPDATE products SET product_code='$_POST[product_code]', name='$_POST[name]', origin='$_POST[origin]', price='$_POST[price]', quantity='$_POST[quantity]' WHERE id='$_GET[id]'");
    }
    echo "<script>alert('data produk telah diubah');</script>";
    echo "<script>location='index.php';</script>";
}

?>