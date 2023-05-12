
<div class="commonLayout">
  <div class="header-container">
    <div class="row">
      <div class="col-sm-2">
        <a href="index1.php"> <img class="img-responsive" src="./public_html/img/logo.png" alt="Chania" id=""></a>
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
    <ul class="navbar-nav menu-nav">
          <?php
          include ("./config/Connection.php");
          $conn=new Connect();
          $productCat=$conn->selectsql("theloai","*");
          while($row = mysqli_fetch_array($productCat)){         
          ?>
      <li class="nav-item">
        <a class="nav-link" href="index1.php?action=quanlisanpham&id=<?php echo $row['matheloai']?>"><?php echo $row['tentheloai']?></a>
      </li>
      <?php
      }
      ?>
    </ul>
  </div>
    </nav>
    </div>
  </div>
</div>
