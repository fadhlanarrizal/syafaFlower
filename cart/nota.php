<?php
require '../koneksi.php';

?>

<link
  href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;700;800&family=Roboto:wght@300;400&display=swap"
  rel="stylesheet">
<link rel="stylesheet" href="../assets/style.css">
<?php
  $get = $con->query("SELECT * FROM product_buying WHERE id_buying='$_GET[id]'");
  $detail = $get->fetch_assoc();
?>



