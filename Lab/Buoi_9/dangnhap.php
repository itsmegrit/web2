.
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dang nhap</title>
  <link rel="stylesheet" href="./style.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
</head>

<body>
  <div class="container d-flex justify-content-center align-items-center">
    <form action="./php/xulydn.php" method="post" class="border shadow p-3 rounded" style="width: 450px">
      <?php
      if (isset($_GET['error'])) { ?>
        <div class="alert alert-danger" role="alert">
          <?= $_GET['error'] ?>
        </div>
      <?php } ?>

      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input name="username" type="input" class="form-control" id="exampleInputUsername1" aria-describedby="usernameHelp" />
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input name="password" type="password" class="form-control" id="exampleInputPassword1" />
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
</body>

</html>