<div class="commonLayout">
  <div class="header-container">
    <div class="row">
      <div class="col-sm-2">
        <img class="img-responsive" src="./public_html/img/logo.png" alt="Chania" id="">
      </div>
      <div class="col-sm-5 d-flex align-items-center">
        <div class="header-ml-76px input-group w-75 header-h-32px">
          <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
          <button type="button" class="btn btn-outline-primary">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
      <div class="col-sm-5">
        <div class="row d-flex align-items-center justify-content-between h-100 ">
          <div class="col-sm-3 d-flex justify-content-center align-items-center header-btn h-50">
            <i class="fa-solid fa-receipt header-mr-8px"></i>
            Đơn hàng
          </div>
          <div class="col-sm-3 d-flex justify-content-center align-items-center header-btn h-50">
            <i class="fas fa-shopping-cart header-mr-8px"></i>
            Giỏ hàng
          </div>
          <div class="col-sm-3 d-flex justify-content-center align-items-center header-btn h-50 header-mr-16px">
            <i class="fa-regular fa-user header-mr-8px  "></i>
            Tài khoản
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
          $data = $conn->insertsql("nguoidung", "values ('$count','$fullname','$phone','$address',' $email','002','$_SESSION[idAccount]')");
        }
      }
    }
    // else {
    //   $message = "Cần phải đăng nhập trước khi nhập thông tin ";
    //       echo "<script type='text/javascript'>alert('$message');</script>";
    // }
    ?>
    <div class="modal  " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel">
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