<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>TOY KINHDOM</title>
  <link rel="stylesheet" href="./includes/commonStyle.css">
  <link rel="stylesheet" href="./includes/bootstrap-5.3.0-alpha1/bootstrap-5.3.0-alpha1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="./includes/bootstrap-5.3.0-alpha1/bootstrap-5.3.0-alpha1/dist/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="./includes/bootstrap-5.3.0-alpha1/bootstrap-5.3.0-alpha1/dist/css/bootstrap-utilities.min.css">
  <link rel="stylesheet" href="./includes/bootstrap-5.3.0-alpha1/bootstrap-5.3.0-alpha1/dist/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="./includes/bootstrap-5.3.0-alpha1/bootstrap-5.3.0-alpha1/dist/css/bootstrap.rtl.min.css">
  <link rel="stylesheet" href="./public_html/publicHeader/headerStyle.css">
  <link rel="stylesheet" href="./public_html/publicBody/bodyStyle.css">
  <link rel="stylesheet" href="./public_html/publicFooter/footerStyle.css">
</head>

<body>
  <div id="header">
    <?php
    include('./public_html/publicHeader/header.php')
      ?>
  </div>

  <div id="body">
    <?php
    include('./public_html/publicBody/body.php');
    ?>
  </div>

  <div id="footer">
    <?php
    include('./public_html/publicFooter/footer.php')
      ?>
  </div>
</body>

</html>