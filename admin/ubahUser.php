<h2>Ubah User</h2>

<?php
require ('../koneksi.php');

$users = $con->query("SELECT * FROM users WHERE id='$_GET[id]'");
// pecahannya
$user = $users->fetch_assoc();
include 'khususAdmin.php';

?>
<pre>
    <?php print_r($user); ?>
</pre>

<link rel="stylesheet" href="../assets/style.css">
<form method="post" enctype="multipart/form-data">
    <div class="form">
        <label>Username</label>
        <input type="text" name="username" class="form-control" value="<?= $product['username'] ?>">
    </div>
    <div class="form">
        <label>Full Name</label>
        <input type="text" name="full_name" class="form-control" value="<?= $product['full_name'] ?>">
    </div>
    <div class="form">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="<?= $product['email'] ?>">
    </div>
    <div class="form">
        <label>Gende</label>
        <input type="text" name="gender" class="form-control" value="<?= $product['gender'] ?>">
    </div>
    <div class="form">
        <label>Phone Number</label>
        <input type="number" name="phone_number" class="form-control" value="<?= $product['phone_number'] ?>">
    </div>
    <div class="form">
        <label>Address Line</label>
        <input type="text" name="address_line" class="form-control" value="<?= $product['address_line'] ?>">
    </div>
    <button name="ubah" class="btn next-btn" onclick="return confirm('Yakin Diubah?')">ubah</button>
</form>

<?php

if (isset($_POST['ubah'])){

    $con->query("UPDATE users SET username='$_POST[username]', full_name='$_POST[full_name]', email='$_POST[email]', gender='$_POST[gender]', phone_number='$_POST[phone_number]', address_line='$_POST[address_line]' WHERE id='$_GET[id]'");
    
    echo "<script>alert('data user telah diubah');</script>";
    echo "<script>location='users.php';</script>";
}

?>