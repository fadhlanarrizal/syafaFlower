<?php
require '../koneksi.php';
session_start();
// ini_set('display_errors', 1);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style.css">
    <title>Lengkapi Data Profile</title>
</head>
<body>
    <form method="post" enctype="multipart/form-data">
        <div class="form">
            <label>Nama Lengkap </label>
            <input type="text" class="form-control" name="full_name">
        </div>
        <div class="form">
            <label>Gender </label>
            <input type="text" class="form-control" name="gender">
        </div>
        <div class="form">
            <label>Nomor Telepon </label>
            <input type="number" class="form-control" name="phone_number">
        </div>
        <div class="form">
            <label>Alamat Rumah </label>
            <input type="text" class="form-control" name="address_line">
        </div>
        <button class="checkout-btn" name="save">Simpan</button>
    </form>
    <?php if (isset($_SESSION['users'])) : ?>
            <a href="../login/logout.php">Logout</a>
            <!-- belum login -->
            <?php else : ?>
            <a href="../login/login.php">Login</a>
            <?php endif ?>
    <?php
        if (isset($_POST['save'])){
            $id_user = $_SESSION['users']['id'];
            $con->query("UPDATE users SET full_name='$_POST[full_name]', gender='$_POST[gender]', phone_number='$_POST[phone_number]', address_line='$_POST[address_line]' WHERE id='$id_user'");

            echo "<script>alert('data tersimpan');</script>";
            echo "<meta http-equiv='refresh' content='1;url=profile.php'>";
        }
    ?>
    
</body>
</html>