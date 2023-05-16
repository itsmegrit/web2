<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>TOY KINHDOM</title>
  <link rel="stylesheet" href="./includes/homePage.css">
  <link rel="stylesheet" href="./includes/bootstrap-5.3.0-alpha1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="./includes/bootstrap-5.3.0-alpha1/dist/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="./includes/bootstrap-5.3.0-alpha1/dist/css/bootstrap-utilities.min.css">
  <link rel="stylesheet" href="./includes/bootstrap-5.3.0-alpha1/dist/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="./includes/bootstrap-5.3.0-alpha1/dist/css/bootstrap.rtl.min.css">
  <link rel="stylesheet" type="text/css" href="./public_html/publicHeader/headerStyle.css?<?php echo time() ?>">
  <link rel="stylesheet" type="text/css" href="./public_html/publicBody/bodyStyle.css?<?php echo time() ?>">
  <link rel="stylesheet" type="text/css" href="./public_html/publicFooter/footerStyle.css?<?php echo time() ?>">
  <link rel="stylesheet" type="text/css" href="./public_html/publicBody/productdetail.css?<?php echo time() ?>">
  <link rel="stylesheet" type="text/css" href="./public_html/publicBody/cart.css?<?php echo time() ?>">
  <link rel="stylesheet" type="text/css" href="./public_html/publicBody/view_order.css?<?php echo time() ?>">


  <link rel="stylesheet" href="./includes/fontawesome-free-6.4.0-web/css/fontawesome.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>

  <div id="header">
    <?php

    include('./public_html/publicHeader/header.php')
      ?>
  </div>

  <div id="body">
    <?php
    if (isset($_GET['action'])) {
      $page = $_GET['action'];
      switch ($page) {
        case 'quanlisanpham':
          include('./public_html/publicBody/productlist.php');
          break;
        case 'sanpham':
          include('./public_html/publicBody/productdetail.php');
          break;
        case 'cart':
          include('./public_html/publicBody/cart.php');
          break;
        case 'view_order':
          include('./public_html/publicBody/view_order.php');
          break;
        case 'view_detail_order':
          include('./public_html/publicBody/view_detail_order.php');
          break;
        default:
          include('./public_html/publicBody/body.php');
          break;
      }
    } else {
      include('./public_html/publicBody/body.php');
    }


    ?>
  </div>

  <div id="footer">
    <?php

    include('./public_html/publicFooter/footer.php')
      ?>
  </div>
</body>

</html>