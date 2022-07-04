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
    <title>Order History</title>
</head>

<body>
<section class="cart">
        <div class="container">

            <h1 class="title">Riwayat Belanja</h1>
            <table class="styled-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Total</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1;?>
                    <!-- menampilkan produk yang sedang diperlukan berdasarkan id_produk -->
                    <?php
                        $id_user = $_SESSION['users']['id'];
                        $ambil = $con->query("SELECT orders.id, orders.date_of_order, orders.total, orders.status, order_status.status as status_name FROM `orders` LEFT JOIN order_status ON orders.status = order_status.id
                        WHERE id_user = '$id_user'");
                        // echo "<pre>";
                        // var_dump($pecah3 = $ambil->fetch_assoc());
                        // echo "</pre>";
                        // die;

                        while ($pecah3 = $ambil->fetch_assoc()) : 
                            
                    ?>
                    <tr>
                        <td><?= $no;?></td>
                        <td><?=date($pecah3["date_of_order"]);?></td>
                        <td><?= $pecah3['status_name'] ?></td>
                        <td> Rp. <?=number_format($pecah3['total'], 0, ',', '.');?></td>
                        <td>
                            <div class="padding-btn">
                                <form method="post">
                            <a href="nota.php?id=<?= $pecah3['id']?>" class="checkout-btn">Nota</a>
                            <?php if($pecah3['status'] == 1) : ?>
                            <a class="checkout-btn" href="../payment/payment.php?id=<?=$pecah3['id']?>">Bayar</a>
                            <?php endif; ?>
                            </form>
                            </div>
                        </td>
                    </tr>
                    <?php $no++;?>
                    <?php endwhile;?>
                </tbody>
            </table>
    </section>
    <?php
        // if (isset($_POST["pay"])){
        //     unset($_SESSION['cart']);
        //     $con->query("SELECT * FROM orders WHERE id_order=");
        //     echo "<script>alert('Pembelian Sukses');</script>";
        //     echo "<script>location='payment.php?id=$id_order';</script>";
        // }
    ?>
    <!-- <pre>
        <?//php print_r($_SESSION);?>
    </pre> -->
</body>

</html>