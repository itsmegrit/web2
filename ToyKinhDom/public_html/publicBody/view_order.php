<div class="commonLayout">
  <?php
  include_once('./config/Connection.php');
  $conn = new Connect();
  $idAccount = $_SESSION['idAccount'];
  $user = $conn->selectsql("nguoidung", "*", "where nguoidung.mataikhoan='$idAccount'");
  $row = mysqli_fetch_array($user);

  $makhachhang = $row['manguoidung'];
  $donhang = $conn->selectsql("donhang", "*", "where donhang.makhachhang='$makhachhang'");

  ?>
  <div class="container">
    <table class="custom-table">
      <tr>
        <th>Mã đơn hàng</th>
        <th>Thời gian đặt</th>
        <th>Tình trạng</th>
        <th>Tổng tiền</th>
        <th></th>
      </tr>
      <?php while ($row = mysqli_fetch_array($donhang)) {
        ?>
        <tr>
          <td>
            <?php echo $row['madonhang'] ?>
          </td>
          <td>
            <?php echo $row['thoigiandat'] ?>
          </td>
          <td>
            <?php echo $row['tinhtrang'] ?>
          </td>
          <td>
            <?php echo number_format($row['tongtien'], 0, ',', ',') . 'VNĐ' ?>
          </td>
          <td>
            <a href="index1.php?action=view_detail_order&ordID=<?php echo $row['madonhang'] ?>">Xem</a>
          </td>
        </tr>
        <?php
      }
      ?>
    </table>
  </div>
</div>