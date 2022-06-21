<?php
session_start();
ini_set('display_errors', 1);
require '../koneksi.php';
if (isset($_SESSION['users'])){
    header('location:../cart/cart.php');
}
if(isset($_POST['signup'])){
    $username = $_POST['txt'];
    $email = $_POST['email'];
    $password = md5($_POST['pswd']);
    $result = $con->query("INSERT INTO users (username, email, pass) VALUES ('$username', '$email', '$password')");

    if ($result){
        echo "<script>alert('registration success');</script>";
        echo "<script>location='profile.php';</script>";
    } else{
        echo "<script>alert('Something wrong went');</script>";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
    <title>Login</title>
</head>

<body>
    <div class="main">
        <input type="checkbox" id="chk" aria-hidden="true">

        <div class="signup">
            <form method="post">
                <label for="chk" aria-hidden="true">Sign up</label>
                <input type="text" name="txt" placeholder="User name" required="">
                <input type="email" name="email" placeholder="Email" required="">
                <input type="password" name="pswd" placeholder="Password" required="">
                <button name="signup">Sign up</button>
            </form>
        </div>

        <div class="login">
            <form method="post">
                <label for="chk" aria-hidden="true">Login</label>
                <input type="email" name="email" placeholder="Email" required="">
                <input type="password" name="pswd" placeholder="Password" required="">
                <button name="login" value="login">Login</button>
            </form>
            <?php
if (isset($_POST["login"])){

    $email = $_POST["email"];
    $password = md5($_POST["pswd"]);
    //  lakukan kueri ngecek akun di tabel users di db
    $get = $con->query("SELECT * FROM users WHERE email='$email' AND pass='$password'");
    // ngitung akun yang terambil 
    $matching_account = $get->num_rows;
    // jika 1 akun yang cocok maka loginkan akun tersebut
    if ($matching_account == 1){
        // berhasil login
        // ambil akun dalam bentuk array
        $acc = $get->fetch_assoc();
        // simpan di session user
        $_SESSION["users"] = $acc;
        if ($_SESSION["users"]["username"] == "admin"){
            echo "<script>alert('Selamat Datang Admin');</script>";
            echo "<script>location='../admin/index.php';</script>";
        }
        if (isset($_SESSION["cart"])){
            echo "<script>alert('login anda berhasil');</script>";
            echo "<script>location='../cart/cart.php';</script>";
        }
        echo "<script>alert('login anda berhasil');</script>";
        echo "<script>location='../index.php';</script>";
    }
    // jika gagal 
    else {
        echo "<script>alert('login anda gagal, silahkan periksa kembali akun anda');</script>";
        echo "<script>location='login.php';</script>";
    }
}
?>

        </div>
    </div>


</body>

</html>