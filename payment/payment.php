<?php
session_start();
require '../koneksi.php';
// ini_set('display_errors', 1);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
</head>
<body>
<?php
        $telah_bayar = 2;
        $id_order = $_GET["id"];  
        if (isset($_GET)){
            $con->query("UPDATE orders SET status='$telah_bayar' WHERE id='$id_order'");

    echo "<script>alert('pembayran berhasil');</script>";
    echo "<script>location='../cart/historyOrder.php';</script>";
}
?>
</body>
</html>