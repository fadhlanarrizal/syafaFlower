<?php
require '../koneksi.php';
ini_set('display_errors', 1);
include 'khususAdmin.php';

// get update id and status

if (isset($_GET['id']) && isset($_GET['status'])){
    $id= $_GET['id'];
    $status = $_GET['status'];
    $con->query("UPDATE orders SET status='$status' WHERE id='$id'");
    header("location:listOrder.php");
    die();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../assets/style.css">
    <title>List Order</title>
</head>

<body>
    <header>
        <nav class="admin-menu">
            <ul>
                <li><a href="../index.php">Halaman Website</a></li>
                <li><a href="index.php">Home</a></li>
                <li><a href="users.php">List Users</a></li>
                <li><a href="listProduk.php">List Produk</a></li>
                <li><a href="../login/logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <section class="cart">
        <div class="container">
            <h1>List Order</h1>
            <hr>
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID User</th>
                        <th>ID Ongkir</th>
                        <th>Tanggal Order</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Operasi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1;?>
                    <?php
                    $get = $con->query("SELECT * FROM orders");
                    $get_order_status = $get->fetch_assoc();
                    $count_data = $get->num_rows;
                    if ($count_data > 0){
                        foreach ($get as $order) : 
                    ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?php echo $order['id_user'];?></td>
                        <td><?=$order['id_ongkir'];?></td>
                        <td><?=$order['date_of_order'];?></td>
                        <td><?=$order['total'];?></td>
                        <td><?php
                            if ($order['status'] == 1){
                                echo "Not paid yet";
                            } elseif($order['status'] == 2){
                                echo "Paid";
                            } elseif($order['status'] == 3){
                                echo "Delivering";
                            } elseif($order['status'] == 4){
                                echo "Received";
                            }
                        ?></td>
                        <td>
                            <select onchange="status_update(this.options[this.selectedIndex].value,'<?=$order['id']?>')">
                                <option value="">status</option>
                                <option value="1">Not paid yet</option>
                                <option value="2">Paid</option>
                                <option value="3">Delivering</option>
                                <option value="4">Received</option>
                            </select>
                        </td>
                    </tr>
                    <?php $no++ ?>
                    <?php endforeach ?>
                    <?php } ?>
                </tbody>
        </div>
    </section>
<script type="text/javascript">
    function status_update(value, id) {
        // alert(id);
        let url = "http://localhost/syafaFlower/admin/listOrder.php";
        window.location.href=url+"?id="+id+"&status="+value;
}
</script>
</body>

</html>