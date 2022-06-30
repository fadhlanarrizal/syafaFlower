<?php
require '../koneksi.php';
session_start();
ini_set('display_errors', 1);
?>

<link
  href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;700;800&family=Roboto:wght@300;400&display=swap"
  rel="stylesheet">
<link rel="stylesheet" href="../assets/style.css">


<section class="cart">
        <div class="container">

            <h1 class="title">Nota</h1>
            <table class="styled-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Produk</th>
                        <th>Harga Produk</th>
                        <th>Jumlah</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1;?>
                    <?php
                        $id_user = $_SESSION['users']['id'];
                        $id_order = $_GET['id'];
                        $products = $con->query("SELECT * FROM orders INNER JOIN order_items ON orders.id=order_items.id_order INNER JOIN products ON products.id=order_items.id_product INNER JOIN shipping_cost ON orders.id_ongkir=shipping_cost.id WHERE orders.id=$id_order");
                        $product = $products->fetch_assoc();
                        foreach ($products as $product) :
                        $subtotal = $product["price"]*$product['order_quantity'];
                        ?>
                    <tr>
                        <td><?= $no;?></td>
                        <td><?php echo $product['name'] ?></td>
                        <td><?php echo number_format($product['price'], 0, ',', '.')?></td>
                        <td><?php echo $product['order_quantity'] ?></td>
                        <td>Rp. <?= number_format($subtotal, 0, ',', '.');?></td>
                    </tr>
                    <?php $no++;?>
                    <?php endforeach ;?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Ongkir</th>
                        <th colspan="3"></th>
                        <th><?=number_format($product['fare'], 0, ',', '.');?></th>
                    </tr>
                        <th>Total Belanja</th>
                        <th colspan="3"></th>
                        <th><?=number_format($product['total'], 0, ',', '.');?></th>
                    </tr>
                </tfoot>
            </table>
            <?php
                $users = $con->query("SELECT * FROM users WHERE id='$id_user'");
                $user = $users->fetch_assoc();
            ?>
            <div class="konten">
                <div class="bio">
                    <h3 class="name"><?=$user['full_name']?></h3>
                    <p class="biodata"><?=$user['phone_number']?></p>
                   <p class="biodata"><?=$user['email']?></p>
                </div>
                
                <div class="bio-margin">
                    <h3 class="name"> Total : Rp. <?=number_format($product['total'], 0, ',', '.');?></h3>
                   <p class="biodata"><?=$user['address_line']?></p>
                </div>
            </div>
    </section>


