<?php
require ('../koneksi.php');

$con->query("DELETE FROM users WHERE id='$_GET[id]'");

    echo "<script>alert('user telah dihapus');</script>";
    echo "<script>location='users.php';</script>";

?>