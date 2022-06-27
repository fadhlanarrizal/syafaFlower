<?php
require '../koneksi.php';
// ini_set('display_errors', 1);
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style.css">
    <title>Checkout</title>
</head>

<body>
<section class="cart section-margin">
        <div class="container ">

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
                        if($total = 0){
                            $total = $subtotal;
                        } else {
                            $total += $subtotal;
                        }
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
                    <?php       
                        $id_user = $_SESSION['users']['id'];
                        $get = $con->query("SELECT * FROM orders WHERE id_user=$id_user ORDER BY id DESC");
                        $pecah = $get->fetch_assoc();
                        $total_order = $pecah['total'];
                    ?>
                <tfoot>
                    <tr>
                        <th>Ongkir</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <?php
                            $get2 = $con->query("SELECT * FROM shipping_cost WHERE id='$pecah[id_ongkir]'");
                            $pecah2 = $get2->fetch_assoc();
                        ?>
                        <th>Rp. <?=number_format($pecah2['fare'], 0, ',', '.') ;?></th>
                    </tr>
                        <th>Total Belanja</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th>Rp. <?=number_format($total_order, 0, ',', '.') ;?></th>
                    </tr>
                </tfoot>
            </table>
            <div class="konten">
                <div class="bio">
                    <h3 class="name"><?=$_SESSION['users']['full_name']?></h3>
                    <p class="biodata"><?=$_SESSION['users']['phone_number']?></p>
                   <p class="biodata"><?=$_SESSION['users']['email']?></p>
                </div>
                
                <div class="bio-margin">
                    <h3 class="name"> Total : Rp.<?=number_format($pecah['total'], 0, ',', '.');?></h3>
                   <p class="biodata"><?=$_SESSION['users']['address_line']?></p>
                </div>
                <form method="post">
                    <button name="pay" class="btn-bayar next-btn flex">Bayar</button>
                </form>
        </div>
    </section>
    <?php
        if (isset($_POST["pay"])){
            unset($_SESSION['cart']);
            echo "<script>alert('Pembelian Sukses');</script>";
            echo "<script>location='payment.php?id=$id_order';</script>";
        }
    ?>
</body>

</html>