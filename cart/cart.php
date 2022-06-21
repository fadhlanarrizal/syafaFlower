<?php
session_start();

// echo "<pre>";
// print_r($_SESSION['cart']);
// echo "</pre>";

require '../koneksi.php';
if ($_SESSION["users"]["username"] == "admin"){
    echo htmlspecialchars("<script>alert('Selamat Datang Admin');</script>");
    // header ('Location:../cart/checkout.php');
    echo "<script>location='../admin/index.php';</script>";
}
if (empty($_SESSION['cart']) OR !isset($_SESSION['cart'])){
    echo "<script>alert('keranjang kosong, silahkan belanja dulu');</script>";
    echo "<script>location='../index.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;700;800&family=Roboto:wght@300;400&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="../assets/style.css">
    <title>Keranjang | SyafaFlowers</title>
</head>

<body>

    <nav class="navbar navbar-cart">
        <div class="icons">
            <a href="../index.php">Home</a>
            <a href="../login/profile.php">Profile</a>
            <!-- jika sudah login(ada sesion user) -->
            <?php if (isset($_SESSION['users'])) : ?>
                <a href="../login/logout.php">Logout</a>                
                <!-- belum login -->
                <?php else : ?>
                    <a href="../login/login.php">Login</a>
            <?php endif ?>
        </div>
    </nav>
    <section class="cart section-margin">
        <div class="container">

            <h1>Keranjang Belanja</h1>
            <hr>
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Produk</th>
                        <th>Harga Produk</th>
                        <th>Jumlah</th>
                        <th>Subtotal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1;?>
                    <?php foreach ($_SESSION['cart'] as $id_product => $quantity) : ?>
                    <!-- menampilkan produk yang sedang diperlukan berdasarkan id_produk -->
                    <?php
                        $get = $con->query("SELECT * FROM products WHERE id = '$id_product'");
                        $product = $get->fetch_assoc();
                        $subtotal = $product["price"]*$quantity;
                        $total += $subtotal;
                        // echo "<pre>";
                        // print_r($product);
                        // echo "</pre>";
                        ?>
                    <tr>
                        <td><?= $no;?></td>
                        <td><?=$product["name"];?></td>
                        <td><?= number_format($product["price"], 0, ',', '.');?></td>
                        <td><?=$quantity;?></td>
                        <td><?= number_format($subtotal, 0, ',', '.');?></td>
                        <td>
                            <a href="deleteCart.php?id=<?=$id_product?>" class="delete">delete</a>
                        </td>
                    </tr>
                    <?php $no++;?>
                    <?php endforeach ?>
                </tbody>
            </table>
            <div class="btn">
                <a href="/plantShop/index.php" class="checkout-btn">Lanjutkan Belanja</a>
                <a href="checkout.php" class="checkout-btn">Check Out</a>
            </div>
        </div>
    </section>
</body>

</html>