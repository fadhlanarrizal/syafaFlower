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
    <title>Profile</title>
</head>

<body>


    <section class="dataProfile">
        <div class="bungkus">
            <a href="../index.php" class="back">back to shop</a>
        </div>
        <div class="bungkus">
            <a href="logout.php" class="back">log Out</a>
        </div>
        <div class="bungkus">
            <a href="lengkapiDataUser.php" class="back">lengkapi Data Profile</a>
        </div>
    </section>
    <div>
    <h1 class="greeting"><?php echo "Halo " . $_SESSION['users']['username'];?></h1>
    </div>
</body>

</html>