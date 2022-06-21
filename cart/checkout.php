<?php
session_start();
require '../koneksi.php';

// jika tidak ada session pelanggan(belum login)
if (!isset($_SESSION["users"])){
    echo "<script>alert('mohon login terlebih dahulu');</script>";
    echo "<script>location='../login/login.php';</script>";
    // header('location:../login/login.php');
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
    <title>Checkout</title>
</head>

<body>
    <nav class="navbar navbar-checkout">
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
                        ?>
                    <tr>
                        <td><?= $no;?></td>
                        <td><?=$product["name"];?></td>
                        <td><?= number_format($product["price"], 0, ',', '.');?></td>
                        <td><?=$quantity;?></td>
                        <td>Rp. <?= number_format($subtotal, 0, ',', '.');?></td>
                    </tr>
                    <?php $no++;?>
                    <?php endforeach ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Total Belanja</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th>Rp. <?=number_format($total, 0, ',', '.') ;?></th>
                    </tr>
                </tfoot>
            </table>
            <form method="post" class="form">
                <input type="text" readonly value="username : <?= $_SESSION['users']['username'];?>" class="form-user">

                <select class="form-user" name="id_ongkir">
                    <option value="">Pilih Ongkos Kirim</option>
                    <?php
                    $ongkirs = $con->query("SELECT * FROM ongkir");
                    foreach ($ongkirs as $ongkir) :
                    ?>
                    <option value="<?= $ongkir['id_ongkir']?>">
                        <?=$ongkir['kota']?> -
                        Rp.<?=number_format($ongkir['tarif'], 0, ',', '.')?>
                    <?php endforeach ?>
                </select>
                    <button name="checkout" class="checkout-btn">Check Out</button>
            </form>
                    </option>

            <?php
                if (isset($_POST["checkout"])){
                    $id_user = $_SESSION['users']['id'];
                    $id_ongkir = $_POST['id_ongkir'];
                    
                    $date_of_buying = date("Y-m-d");
                    
                    $get = $con->query("SELECT * FROM ongkir WHERE id_ongkir='$id_ongkir'");
                    // $array = mysqli_fetch($con, $get);
                    $ongkirs = $get->fetch_assoc();
                    $tarif = $ongkirs['tarif'];
                    $total_buying = $total + $tarif;

                    // menyimpan data ke tabel pembelian
                    $con->query("INSERT INTO buying (id_user, id_ongkir, date_of_buying, total)
                    VALUES ('$id_user', '$id_ongkir', '$date_of_buying', '$total_buying')");

                    // mendapat id pembelian barusan terjadi
                    $id_pembelian_baru = $con->insert_id;
                    foreach ($_SESSION['cart'] as $id_product => $quantity) {
                        $con->query("INSERT INTO product_buying (id_buying, id_product, quantity) VALUES ('$id_pembelian_baru', '$id_product', '$quantity')");
                    }
                    unset($_SESSION['cart']);

                    echo "<script>alert('Pembelian Sukses');</script>";
                    echo "<script>location='nota.php?id=$id_pembelian_baru';</script>";
                }
            ?>
        </div>
    </section>

    <pre>
        <?php
            // print_r($_SESSION['users']);
            // print_r($_SESSION['cart']);
            // print_r($arrayOngkir);
        ?>
    </pre>
</body>

</html>