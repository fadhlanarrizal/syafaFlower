<?php
require 'koneksi.php';
// $sql = "SELECT * from products";

// $value_tnn = mysqli_query($con, $sql); // cara ambil data dr sql
// $products = mysqli_fetch_all($value_tnn, MYSQLI_ASSOC); //merubah data sql jadi array
$products = $con->query("SELECT * FROM products");
$product = $products->fetch_all();

// var_dump($products);
// die('asdasd');
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;700;800&family=Roboto:wght@300;400&display=swap"
        rel="stylesheet">
    <!-- useage icon -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://unpkg.com/swiper/swiper-bundle.min.css" rel="stylesheet">
    <title>Syafa Flowers</title>
</head>

<body>


    <!-- header start -->
    
    <?php include '_partials/header.php';?>

    <!-- header end -->


    <!-- Home start -->

    <?php include '_partials/home.php';?>

    <!-- Home end -->

    <!-- service start -->

    <?php include '_partials/service.php';?>

    <!-- service end -->

    <!-- banner start -->

    <?php include '_partials/banner.php';?>

    <!-- banner end -->


    <!-- product start -->

    <?php include '_partials/product.php';?>

    <!-- product end -->


    <!-- testi start -->

    <?php include '_partials/testimoni.php';?>

    <!-- testi end -->


    <!-- contact start -->

    <?php include '_partials/contact.php';?>

    <!-- contact end -->


    <!-- footer start -->

    <?php include '_partials/footer.php';?>

    <!-- footer end -->

    <!-- JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha384-vtXRMe3mGCbOeY7l30aIg8H9p3GdeSe4IFlP6G8JMa7o7lXvnz3GFKzPxzJdPfGK" crossorigin="anonymous">
    </script>
    <script src="script/script.js"></script>
</body>

</html>