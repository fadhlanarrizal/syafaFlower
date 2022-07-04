<?php
session_start();
require '../koneksi.php';
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
    <link rel="stylesheet" href="../assets/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">

    <title>Profile</title>
</head>

<body>

    <section class="greeting-card">
        <div class="back">
            <div class="back-link">
                <a href="../index.php"><i class="fa-solid fa-arrow-left"></i></a>
            </div>
        </div>
        <h1 class="greeting"><?php echo "Halo " . ucwords($_SESSION['users']['username']);?></h1>
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
                                        <a class="checkout-btn"
                                            href="../payment/payment.php?id=<?=$pecah3['id']?>">Bayar</a>
                                        <?php endif; ?>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        <?php $no++;?>
                        <?php endwhile;?>
                    </tbody>
                </div>
                </table>
        </section>
    </section>


    <section class="profile">
        <aside>
            <div class="header-profile">
                <div class="img-profile">
                    <img src="../assets/image/foto-profil/20210102_174202 (1).jpg" alt="foto-profil">
                </div>
                <div class="biodata-profile">
                    <h3 class="name"><?= ucwords($_SESSION['users']['full_name'])?></h3>
                    <p class="status"><span class='dot'></span>active now</p>
                    <div class="btn-edit"><a href="lengkapiDataUser.php">edit</a></div>
                </div>
            </div>
            <section class="body-profile">
                <div class="teks-profile">
                    <p><?= ucwords($_SESSION['users']['full_name'])?></p>
                </div>
                <div class="teks-profile">
                    <p><?=$_SESSION['users']['email']?></p>
                </div>
                <div class="teks-profile">
                    <p><?=$_SESSION['users']['phone_number']?></p>
                </div>
                <div class="teks-profile">
                    <p><?=$_SESSION['users']['address_line']?></p>
                </div>
                <div class="teks-profile">
                    <p><?=$_SESSION['users']['gender']?></p>
                </div>
            </section>

            <section class="footer-profile">
                <div class="teks-profile logout">
                    <a href="../login/logout.php">Logout</a>
                </div>
            </section>
        </aside>
    </section>
    <!-- <section class="dataProfile">
        <div class="bungkus">
            <a href="../index.php" class="back">back to shop</a>
        </div>
        <div class="bungkus">
            <a href="../login/logout.php" class="back">log Out</a>
        </div>
        <div class="bungkus">
            <a href="lengkapiDataUser.php" class="back">lengkapi Data Profile</a>
        </div>
        <div class="bungkus">
            <a href="../cart/historyOrder.php" class="back">Riwayat Pembelian</a>
        </div>
    </section> -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"
        integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>