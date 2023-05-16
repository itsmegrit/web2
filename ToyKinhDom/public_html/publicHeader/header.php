<?php session_start(); ?>
<div class="commonLayout">
  <div class="header-container">
    <div class="row">
      <div class="col-sm-2">
        <a href="index1.php"><img class="img-responsive" src="./public_html/img/logo.png" alt="Chania" id=""></a>
      </div>
      <div class="col-sm-5 d-flex align-items-center">
        <div class="header-ml-76px input-group  header-h-32px">
          <select class="form-select w-15" id="theloai">
            <option value="0" selected>Tất cả (Thể loại)</option>
            <option value="1">Lego</option>
            <option value="2">Siêu anh hùng</option>
            <option value="3">Bé trai</option>
            <option value="4">Bé gái</option>
            <option value="5">Xe điều khiển</option>
            <option value="6">Thú bông</option>
            <option value="7">Búp bê</option>
          </select>
          <select class="form-select w-15" id="giatien">
            <option value="0" selected>Tất cả (Giá tiền)</option>
            <option value="0 and 500000">0-500,000</option>
            <option value="500000 and 1000000">500,000-1tr</option>
            <option value="1000000">1tr trở lên</option>
          </select>
          <input type="search" class="form-control rounded w-30" placeholder="Search" id="txtSearch" aria-label="Search" aria-describedby="search-addon" />
          <button class="btn btn-outline-primary" id="search">
            <i class="fas fa-search"></i>
          </button>
        </div>

      </div>
      <div class="col-sm-5">
        <div class="row d-flex align-items-center justify-content-between h-100 ">
          <div class="col-sm-3 d-flex justify-content-center align-items-center header-btn h-50">
            <a href="./index1.php?action=view_order" class='header-account-link account-btn'>
              <i class="fa-solid fa-receipt header-mr-8px"></i>
              Đơn hàng
            </a>
          </div>
          <div class="col-sm-3 d-flex justify-content-center align-items-center header-btn h-50">
            <a href="./index1.php?action=cart" class='header-account-link account-btn'>
              <i class="fas fa-shopping-cart header-mr-8px"></i>
              Giỏ hàng
            </a>
          </div>
          <div class="dropdown col-sm-3 header-mr-16px ">
            <p class="fa-regular fa-user header-mr-8px mb-0"></p>
            <a href="login.php" class='header-account-link account-btn'>
              <?php
              if (isset($_SESSION['loggedIN'])) {
                echo $_SESSION['loggedIN'];
              } else {
                echo "Login";
              }
              ?>

            </a>
            <ul class="dropdown-menu account-dropdown extended-dropdown">
              <li><a href="index1.php?action=tk&id=1" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal">Thông tin cá nhân</a>
              </li>
              <?php
              // ADMIN
              if (isset($_SESSION['loggedIN'])) {
                if (!($_SESSION['quyen'] == 'User')) {
                  echo "<li><a href='..\\admin/public_html/admin.php' class='dropdown-item' >Quản lí</a>
                  </li>";
                }
              }
              ?>
              <li><a class="dropdown-item" href="logout.php"> Đăng xuất </a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <nav class="navbar navbar-expand-sm bg-info">
        <div class="container-fluid">
          <ul class="navbar-nav menu-nav">
            <?php
            include("./config/Connection.php");
            $conn = new Connect();
            $productCat = $conn->selectsql("theloai", "*");
            while ($row = mysqli_fetch_array($productCat)) {
              ?>
              <li class="nav-item">
                <a class="nav-link" href="index1.php?action=quanlisanpham&id=<?php echo $row['matheloai'] ?>"><?php echo $row['tentheloai'] ?></a>
              </li>
              <?php
            }
            ?>
          </ul>
        </div>
      </nav>
    </div>
    <?php
    if (isset($_SESSION['loggedIN'])) {
      if (isset($_POST['infor'])) {
        include_once("./config/Connection.php");
        $conn = new Connect();
        $fullname = $_POST['textName'];
        $phone = $_POST['textPhone'];
        $address = $_POST['textAddress'];
        $email = $_POST['textEmail'];
        $user = $conn->selectsql("nguoidung", "manguoidung", "where tennguoidung='$fullname'");
        if ($user->num_rows < 0 || $user->num_rows == 0) {
          $count = $conn->selectsql("nguoidung");
          $count = $count->num_rows + 1;
          if ($_SESSION['quyen'] == 'User') {
            $data = $conn->insertsql("nguoidung", "values ('$count','$fullname','$phone','$address',' $email','002','$_SESSION[idAccount]')");
          } else {
            $data = $conn->insertsql("nguoidung", "values ('$count','$fullname','$phone','$address',' $email','001','$_SESSION[idAccount]')");
          }
        }
      }
    }

    // else {
    //   $message = "Cần phải đăng nhập trước khi nhập thông tin ";
    //       echo "<script type='text/javascript'>alert('$message');</script>";
    // }
    ?>
    <div class="modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Thông tin cá nhân</h5>
            <button type="button" class="btn-close mx-2" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <form method="post" action="index1.php" name="form1">
            <div class="modal-body">


              <div class="form-floating mb-4">
                <input type="text" class="form-control " id="floatingUsername" placeholder="FullName" name="textName">
                <label for="floatingInputUsername">Họ và tên</label>
              </div>
              <div class="form-floating mb-4">
                <input type="text" class="form-control " id="floatingPhone" placeholder="Phone" name="textPhone">
                <label for="floatingInputUsername">Số điện thoại</label>
              </div>
              <div class="form-floating mb-4">
                <input type="text" class="form-control " id="floatingAddress" placeholder="Address" name="textAddress">
                <label for="floatingInputUsername">Địa chỉ</label>
              </div>
              <div class="form-floating mb-2">
                <input type="text" class="form-control " id="floatingEmail" placeholder="Email" name="textEmail">
                <label for="floatingInputUsername">Email</label>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
              <input class="btn  btn-primary btn-login " id="infor" name="infor" type="submit" value="Lưu">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous">
</script>
<script type="text/javascript">
  $(document).ready(function () {
    $("#infor").on('click', function () {
      var fullname = $("#floatingUsername").val();

      var phone = $("#floatingPhone").val();

      var address = $("#floatingAddress").val();

      var email = $("#floatingEmail").val();

      var vnf_regex = /((09|03|07|08|05)+([0-9]{8})\b)/g;
      var vnf_regex1 = /^[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?$/;
      if (fullname == "" || fullname.length == 0) {
        alert("vui lòng nhập họ tên");
        document.form1.textName.focus();
      }
      else if (phone == "" || phone.length == 0) {
        alert("vui lòng nhập số điện thoại");
        document.form1.textPhone.focus();
      }
      else if (vnf_regex.test(phone) == false) {
        alert('Số điện thoại của bạn không đúng định dạng!');
        document.form1.textPhone.focus();
      }
      else if (address == "" || address.length == 0) {
        alert("vui lòng nhập địa chỉ");
        document.form1.textAddress.focus();
      }
      else if (vnf_regex1.test(email) == false) {
        alert('Email của bạn không đúng định dạng!');
        document.form1.textEmail.focus();
      }
      else if (email = "" || email.length == 0) {
        alert("vui lòng nhập địa chỉ email");
        document.form1.textEmail.focus();
      }
    });
  });
</script>
<script type="text/javascript">
  $(document).ready(function () {
    $("#search").on(('click'), function () {
      var searchdata = $('#txtSearch').val();
      var theloai = $('#theloai').val();
      var giatien = $('#giatien').val();
      if (searchdata == "" || searchdata.length == 0) {
        alert("Vui lòng nhập sản phẩm cần tìm");
      }
      else {
        $.ajax({
          url: 'public_html/publicHeader/ajax-search.php',
          method: 'POST',
          data: {
            searchPHP: searchdata,
            CatPHP: theloai,
            PricePHP: giatien,
          },
          success: function (data) {
            $('#search-product').html(data);
            // console.log("thành công");

          },
          dataType: 'text'
        });
      }
    });
  });
</script>