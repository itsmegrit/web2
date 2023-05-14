<div class="commonLayout">
  <?php
  if (!empty($_SESSION['cart'])) {
    ?>
    <div class="container">
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
          <?php foreach ($_SESSION['cart'] as $productID => $each): ?>
            <tr>
              <td>
                <img style='height: 72px; width: 72px' src="./public_html/img/<?php echo $each['productImage'] ?>" alt="">
              </td>
              <td>
                <?php echo $each['name'] ?>
              </td>
              <td>
                <?php echo $each['price'] ?>
              </td>
              <td>
                <a href=""></a>
                <?php echo $each['quantity'] ?>
              </td>
              <td>
                <?php echo $each['price'] * $each['quantity'] ?>
              </td>
            </tr>
          <?php endforeach ?>
        </tbody>
        <tfoot>
          <tr class="total">
            <td colspan="3">Tổng cộng:</td>
            <td id="total-price"></td>
          </tr>
        </tfoot>
      </table>
      <a href="#" class="btn">Thanh toán</a>
    </div>
  <?php } else {
    echo 'Giỏ hàng trống';
  }
  ?>
</div>