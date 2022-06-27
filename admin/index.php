<?php
require '../koneksi.php';
session_start();
include 'khususAdmin.php';
// ini_set('display_errors', 1);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style.css">
    <title>Home</title>
</head>
<body>
<header>
        <nav class="admin-menu">
            <ul>
                <li><a href="../index.php">Halaman Website</a></li>
                <li><a href="tambahProduk.php">Tambah Produk</a></li>
                <li><a href="users.php">List Produk</a></li>
                <li><a href="listOrder.php">List Order</a></li>
                <li><a href="users.php">List Users</a></li>
                <li><a href="../login/logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <section class="cart">
        <div class="container">
            <h1>Dashboard Home</h1>
            <hr>
            <table class="table">
                <thead>
                    <tr>
                        <th>Total Produk</th>
                        <th>Omset</th>
                        <th>Laba</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $products = $con->query("SELECT * FROM products");?>
                    <?php foreach ($products as $product) : ?>
                        <?php $total_produk += $product['quantity'];?>
                    <?php endforeach ?>
                    <?php
                        $orders = $con->query("SELECT * FROM orders");
                        
                        foreach ($orders as $order) {
                            $omset += $order['total'];
                        }

                        $hitung_laba = $con->query("SELECT orders.id, orders.date_of_order, orders.total, order_items.id_product, order_items.id_order, order_items.order_quantity, products.id, products.price, products.ori_price FROM orders INNER JOIN order_items ON orders.id=order_items.id_order INNER JOIN products ON products.id=order_items.id_product");
                        // $id_product = $con->query("SELECT * FROM products JOIN order_items  WHERE order_items.id_product=products.id AND ");
                        foreach ($hitung_laba as $value) {
                            // print_r($value);
                            // foreach ($id_product as $produk) {
                                $laba = ($value['price'] - $value['ori_price']) * $value['order_quantity'];
                            // }
                            // print_r($laba);
                            $profit += $laba;
                        }
                        
                    ?>
                        <tr>
                        <td><?php echo $total_produk;?></td>
                        <td><?php echo $omset;?></td>
                        <td><?=$profit;?></td>
                    </tr>


                </tbody>
        </div>
    </section>
</body>
</html>