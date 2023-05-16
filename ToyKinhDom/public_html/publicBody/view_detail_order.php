<div class="commonLayout">
  <table class="custom-table">
    <tr>
      <th>Tên sản phẩm</th>
      <th>Giá sản phẩm</th>
      <th>Số lượng</th>
      <th>Ghi chú</th>
      <th>Hình ảnh</th>
    </tr>

    <?php
    include_once('./config/Connection.php');
    $conn = new Connect();

    $donhang = $conn->selectsql("donhang, chitietdonhang, sanpham", "chitietdonhang.madonhang, sanpham.tensanpham, chitietdonhang.soluong, chitietdonhang.giasanpham, chitietdonhang.ghichu, sanpham.hinhanh1", "where chitietdonhang.madonhang = donhang.madonhang and chitietdonhang.masanpham=sanpham.masanpham and donhang.madonhang ='$_GET[ordID]'");
    while ($row = mysqli_fetch_array($donhang)) {
      echo '<tr>';
      echo '<td>' . $row['tensanpham'] . '</td>';
      echo '<td>' . number_format($row['giasanpham'], 0, ',', ',') . 'VNĐ' . '</td>';
      echo '<td>' . $row['soluong'] . '</td>';
      echo '<td>' . $row['ghichu'] . '</td>';
      ?>
      <td>
        <img style='height: 72px; width: 72px' src="./public_html/img/<?php echo $row['hinhanh1'] ?>" alt="">
      </td>
      <?php
      echo '</tr>';
    }
    ?>
  </table>
</div>