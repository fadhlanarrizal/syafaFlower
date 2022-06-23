<?php
session_start();
require '../koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style.css">
    <title>List Users</title>
</head>
<body>
<header>
        <nav>
            <ul>
                <li><a href="../index.php">Home</a></li>
                <li><a href="index.php">List Product</a></li>
                <li><a href="../login/logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <section class="cart">
        <div class="container">
            <h1>List Users</h1>
            <hr>
            <table class="table">
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
                            <button><a href="hapusUser.php?halaman=hapusid&id=<?=$user['id'];?>" class="next-btn" onclick="return confirm('Yakin Hapus?')">Hapus</a></button>
                            <button><a href="ubahUser.php?halaman=ubahuser&id=<?=$user['id'];?>" class="next-btn">Ubah</a></button>
                        </td>
                    </tr>
                    <?php $no++ ?>
                    <?php endforeach ?>
                </tbody>
        </div>
    </section>
</body>
</html>