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
                        $ambil = $con->query("SELECT * FROM orders WHERE id_user = '$id_user'");

                        while ($pecah3 = $ambil->fetch_assoc()) : 
                            
                    ?>
                    <tr>
                        <td><?= $no;?></td>
                        <td><?=date($pecah3["date_of_order"]);?></td>
                        <td><?php if ($pecah3['status'] == 1){
                                echo "Not paid yet";
                            } elseif($pecah3['status'] == 2){
                                echo "Paid";
                            } elseif($pecah3['status'] == 3){
                                echo "Delivering";
                            } elseif($pecah3['status'] == 4){
                                echo "Received";
                            };?></td>
                        <td> Rp. <?=number_format($pecah3['total'], 0, ',', '.');?></td>
                        <td>
                            <div class="padding-btn">
                            <a href="nota.php?id=<?= $pecah3['id']?>" class="checkout-btn">Nota</a>
                            <?php if($pecah3['status'] == 1) : ?>
                            <a href="../payment/payment.php" class="checkout-btn">Bayar</a>
                            <?php endif; ?>
                            </div>
                        </td>
                    </tr>
                    <?php $no++;?>
                    <?php endwhile;?>

                </tbody>
                    <?php       
                        $get = $con->query("SELECT * FROM orders WHERE id_user=$id_user ORDER BY id DESC");
                        $pecah = $get->fetch_assoc();
                        $total_order = $pecah['total'];
                    ?>
            </table>
    </section>
    <?php
        if (isset($_POST["pay"])){
            unset($_SESSION['cart']);
            $con->query("SELECT * FROM orders WHERE id_order=");
            echo "<script>alert('Pembelian Sukses');</script>";
            echo "<script>location='payment.php?id=$id_order';</script>";
        }
    ?>
    <!-- <pre>
        <?//php print_r($_SESSION);?>
    </pre> -->
</body>

</html>