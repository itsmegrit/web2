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
      <a href="#" class="btn btn-success">Thanh toán</a>
    </div>
  <?php } else {
    echo 'Giỏ hàng trống';
  }
  ?>
</div>