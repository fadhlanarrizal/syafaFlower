<?php
require '../koneksi.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <pre>
        <?php print_r($_SESSION)?>
    </pre>
    <section class="history">
        <div class="container">
            <h3>Riwayat Belanja <?=$_SESSION['users']['full_name']?></h3>

            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Total</th>
                        <th></th>
                    </tr>
                </thead>
                <?php
                    $id_user = $_SESSION['users']['id'];
                    $get = $con->query("SELECT * FROM orders
                    JOIN order_history ON orders.id = order_history.id_user");
                    $array = $get->fetch_assoc();
                    
                    $no=1;
                    foreach ($array as $user) :
                        // foreach ($array2 as $user1) :
                            ?>
                <tbody>
                    <td><?=$no?></td>
                    <td><?=$array['date_of_order']?></td>
                    <td><?=$array['order_status']?></td>
                    <td><?=$array['payment_amount']?></td>
                    <td><a href="detail.php?id=<?=$id_user?>" class="detail">Detail</a></td>


                </tbody>
                <?php $no++ ?>
                <?php endforeach ?>
            </table>
        </div>
    </section>
</body>
</html>