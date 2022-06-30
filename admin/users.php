<?php
session_start();
require '../koneksi.php';
// ini_set('display_errors', 1);
include 'khususAdmin.php';

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
    <title>List Users</title>
</head>
<body>
<header>
    <?php include 'navbar.php' ?>
    </header>
    <section class="cart">
        <div class="container">
            <h1 class="title">List Users</h1>
            <table class="styled-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>Phone Number</th>
                        <th>Addres Line</th>
                        <th>Operation</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1;?>
                    <?php $users = $con->query("SELECT * FROM users");?>
                    <?php foreach ($users as $user) : ?>
                    <tr>
                        <td><?php echo $no;?></td>
                        <td><?php echo $user['username'];?></td>
                        <td><?=$user['full_name'];?></td>
                        <td><?=$user['email'];?></td>
                        <td><?=$user['gender'];?></td>
                        <td><?=$user['phone_number'];?></td>
                        <td><?=$user['address_line'];?></td>
                        <td>
                            <div class="padding-btn">
                                <a href="hapusUser.php?halaman=hapusid&id=<?=$user['id'];?>" class="checkout-btn" onclick="return confirm('Yakin Hapus?')">Hapus</a>
                                <a href="ubahUser.php?halaman=ubahuser&id=<?=$user['id'];?>" class="checkout-btn">Ubah</a>
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