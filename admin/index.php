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
    <?php include '../assets/link.php'; ?>
    <link rel="stylesheet" href="navbar.css">
    <title>Home</title>
</head>

<body>
    <header>
        <?php include 'navbar.php'; ?>
    </header>
    <section class="cart">
        <div class="container">
            <h1 class="title">Pendapatan bulan ini</h1>
            <hr>
            <table class="styled-table">
                <thead>
                    <tr>
                        <th>Bulan</th>
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
                        // hitung omset
                        $omsets = $con->query("SELECT date_format(date_of_order,'%M'), sum(total)
                        from orders WHERE MONTH(date_of_order) = MONTH(CURRENT_DATE ()) AND YEAR(date_of_order) = YEAR(CURRENT_DATE())");
                        foreach ($omsets as $omset) {
                            $omset_permonth = $omset['sum(total)'];
                            $month = $omset["date_format(date_of_order,'%M')"];
                        }
                        // hitung profit
                        $profits = $con->query("SELECT orders.id, orders.date_of_order, orders.total, order_items.id_product, order_items.id_order, order_items.order_quantity, products.id, products.price, products.ori_price FROM orders INNER JOIN order_items ON orders.id=order_items.id_order INNER JOIN products ON products.id=order_items.id_product WHERE MONTH(date_of_order) = MONTH(CURRENT_DATE ()) AND YEAR(date_of_order) = YEAR(CURRENT_DATE())");
                        foreach ($profits as $value) {
                            $laba = ($value['price'] - $value['ori_price']) * $value['order_quantity'];
                            $profit += $laba;
                        }

                    ?>
                    <tr>
                        <td><?=$month?></td>
                        <td><?php echo $total_produk;?></td>
                        <td><?php echo number_format($omset_permonth, 0, ',', '.');?></td>
                        <td><?=number_format($profit, 0, ',', '.');?></td>
                    </tr>


                </tbody>
        </div>
    </section>
</body>

</html>