
<div class="commonLayout">
  <div class="header-container">
    <div class="row">
      <div class="col-sm-2">
        <img class="img-responsive" src="./public_html/img/logo.png" alt="Chania" id="">
      </div>
      <div class="input-group col-sm-5">
        <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
        <button type="button" class="btn btn-outline-primary">
          <i class="fas fa-search"></i>
        </button>
      </div>
      <div class="col-sm-5">
        <div class="row d-flex align-items-center h-100">
          <div class="col-sm-4 d-flex justify-content-end align-items-center">
            <i class="fa-solid fa-receipt"></i>
            Tra cứu đơn hàng
          </div>
          <div class="col-sm-4 d-flex justify-content-end align-items-center">
            <i class="fas fa-shopping-cart"></i>
            Giỏ hàng
          </div>
          
          <div class="col-sm-4 d-flex justify-content-end align-items-center">
            <p class="fa-regular fa-user"></p>
            <p><a href="login.php"> <?php session_start();
            if(isset($_SESSION['loggedIN'])){
              echo $_SESSION['loggedIN'];
            }else {
              echo "Tài khoản";
            }
            ?></a></p>
          </div>
        </div>
      </div>
    </div>
    <div class ="row">
    <nav class="navbar navbar-expand-sm bg-info">
    <div class="container-fluid">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="#">LEGO</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Xe đua</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">/a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link 3</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link 3</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link 3</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Link 3</a>
      </li>
    </ul>
  </div>
    </nav>
    </div>
  </div>
</div>
