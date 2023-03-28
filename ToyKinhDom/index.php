<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>TOY KINHDOM</title>
  <link rel="stylesheet" href="./includes/commonStyle.css">
  <link rel="stylesheet" href="./public_html/header/headerStyle.css">
  <link rel="stylesheet" href="./public_html/body/bodyStyle.css">
  <link rel="stylesheet" href="./public_html/footer/footerStyle.css">
  <link rel="stylesheet" type="text/css" href="./includes/bootstrap-5.3.0-alpha1/bootstrap-5.3.0-alpha1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="./includes/bootstrap-5.3.0-alpha1/bootstrap-5.3.0-alpha1/dist/css/bootstrap-grid.min.css">
  <link rel="stylesheet" type="text/css" href="./includes/bootstrap-5.3.0-alpha1/bootstrap-5.3.0-alpha1/dist/css/bootstrap-utilities.min.css">
  <link rel="stylesheet" type="text/css" href="./includes/bootstrap-5.3.0-alpha1/bootstrap-5.3.0-alpha1/dist/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" type="text/css" href="./includes/bootstrap-5.3.0-alpha1/bootstrap-5.3.0-alpha1/dist/css/bootstrap.rtl.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body>
  <div id="header">
    <?php
    include('./public_html/header/header.php')
      ?>
  </div>

  <div id="body">
    <?php
    include('./public_html/body/body.php');
    ?>
  </div>

  <div id="footer">
    <?php
    include('./public_html/footer/footer.php')
      ?>
  </div>
</body>

</html>