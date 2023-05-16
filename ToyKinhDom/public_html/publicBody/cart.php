<div class="commonLayout">
  <?php
  if (!empty($_SESSION['cart'])) {
    ?>
    <div class="container cart-container">
      <h1>Giỏ hàng</h1>
      <table class="table-cart">
        <thead>
          <tr>
            <th>Ảnh</th>
            <th>Tên sản phẩm</th>
            <th>Giá</th>
            <th>Số lượng</th>
            <th>Tổng giá</th>
          </tr>
        </thead>
        <tbody id="cart-items">
          <?php
          $totalPrice = 0;
          foreach ($_SESSION['cart'] as $productID => $each): ?>
            <tr>
              <td>
                <img style='height: 72px; width: 72px' src="./public_html/img/<?php echo $each['productImage'] ?>" alt="">
              </td>
              <td>
                <?php echo $each['name'] ?>
              </td>
              <td>
                <?php echo number_format($each['price'], 0, ',', ',') . 'VNĐ' ?>
              </td>
              <td>
                <a class="btn btn-secondary btn-sm" href="./public_html/publicBody/cart_decre.php?productID=<?php echo $productID ?>&type=decre">-</a>
                <?php echo $each['quantity'] ?>
                <a class="btn btn-primary btn-sm" href="./public_html/publicBody/cart_incre.php?productID=<?php echo $productID ?>&type=incre">+</a>
              </td>
              <td>
                <?php
                $totalPrice += $each['price'] * $each['quantity'];
                echo number_format($each['price'] * $each['quantity'], 0, ',', ',') . 'VNĐ' ?>
              </td>
            </tr>
          <?php endforeach ?>
        </tbody>
        <tfoot>
          <tr class="total">
            <td colspan="1">Tổng cộng:</td>

            <td id="total-price">
              <?php echo number_format($totalPrice, 0, ',', ',') . 'VNĐ' ?>
            </td>
          </tr>
        </tfoot>
      </table>
      <div class='row'>

        <div class='col-sm-6'>
          <h4>Thông tin người đặt</h4>
          <?php
          include_once('./config/Connection.php');
          $conn = new Connect();
          $idAccount = $_SESSION['idAccount'];
          $user = $conn->selectsql("nguoidung", "*", "where nguoidung.mataikhoan='$idAccount'");
          $row = mysqli_fetch_array($user);
          ?>
          <script>
            function validateForm() {
              // Lấy giá trị từ các trường input
              var name = document.getElementById('name').value;
              var phone = document.getElementById('phone').value;
              var email = document.getElementById('email').value;
              var address = document.getElementById('address').value;

              // Kiểm tra điều kiện của từng trường
              if (name === '') {
                alert('Vui lòng nhập tên người nhận.');
                return false;
              }

              if (phone === '') {
                alert('Vui lòng nhập số điện thoại.');
                return false;
              }

              // Sử dụng biểu thức chính quy để kiểm tra định dạng số điện thoại
              var phonePattern = /^[0-9]{10}$/;
              if (!phonePattern.test(phone)) {
                alert('Số điện thoại không hợp lệ. Vui lòng nhập 10 chữ số.');
                return false;
              }

              if (email === '') {
                alert('Vui lòng nhập email.');
                return false;
              }

              // Sử dụng biểu thức chính quy để kiểm tra định dạng email
              var emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
              if (!emailPattern.test(email)) {
                alert('Email không hợp lệ. Vui lòng kiểm tra lại.');
                return false;
              }

              if (address === '') {
                alert('Vui lòng nhập địa chỉ nhận hàng.');
                return false;
              }

              // Nếu tất cả trường hợp validate đều pass, cho phép submit form
              return true;
            }
          </script>

          <form method="POST" action="./order.php" class="order-form" onsubmit="return validateForm()">
            <?php
            if (!$user->num_rows > 0) {
              $nguoinhan = "";
              $sdt = "";
              $email = "";
              $diachi = "";
            } else {
              $nguoinhan = $row['tennguoidung'];
              $sdt = $row['sodienthoai'];
              $email = $row['email'];
              $diachi = $row['diachi'];
            }
            ?>
            <div>
              <label for="name"><span>Tên người nhận:</span></label>
              <input type="text" id="name" name="name" value="<?php echo $nguoinhan ?>" required>
            </div>
            <div>
              <label for="phone"><span>Số điện thoại:</span></label>
              <input type="tel" id="phone" name="phone" value="<?php echo $sdt ?>" required>
            </div>
            <div>
              <label for="email"><span>Email:</span></label>
              <input type="email" id="email" name="email" value="<?php echo $email ?>" required>
            </div>
            <div>
              <label for="address"><span>Địa chỉ nhận hàng:</span></label>
              <input type="text" id="address" name="address" value="<?php echo $diachi ?>" required>
            </div>
            <button type="submit" class="btn btn-success">Xác nhận</button>
          </form>

        </div>
        <div class='col-sm-6'>
        </div>
      </div>
    </div>
  <?php } else {
    echo 'Giỏ hàng trống';
  }
  ?>
</div>