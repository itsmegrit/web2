<?php
include_once '..\..\\config/Connection.php';
$conn = new Connect();
$slsp = 8;
$sotrang = $_POST["soTrang"];
$xuly=$_POST['xuly'];
$start = $slsp * $sotrang - $slsp;
$result = $conn->selectsql("sanpham,chitietsanpham","*","$xuly.limit $start,$slsp");
$conn->closeConnect();
?>
<?php
if ($result->num_rows > 0) {
  while ($row = mysqli_fetch_array($result)) { ?>
    <div class="col-md-3 col-sm-6">
      <a href="index1.php?action=sanpham&id=<?php echo $row['masanpham'] ?>">
        <div class="product-grid">
          <div class="product-image">
            <img class="img-1" src="./public_html/img/<?php echo $row['hinhanh1'] ?>">
            <img class="img-2" src="./public_html/img/<?php echo $row['hinhanh2'] ?>">
          </div>
          <div class="product-content">
            <h3 class="title"><a href="index1.php?action=sanpham&id=<?php echo $row['masanpham'] ?>"><?php echo $row['tensanpham'] ?></a></h3>
            <div class="price">
              <?php echo number_format($row['giaban'], 0, ',', ',') . 'VNĐ' ?>
            </div>
          </div>
        </div>
      </a>
    </div>
    <?php
  }
}
?>
   <div class="row ">
      <?php
      $soTrang = floor(($result->num_rows -1) / 8) + 1;
      ?>
      <nav aria-label="Page navigation example">
        <ul class="pagination">
          <?php for ($i = 1; $i <= $soTrang; $i++) { ?>
            <li  xuly="<?php echo $xuly?>"soTrang="<?php echo $i ?>" class="page-item"><a class="page-link" href="">
                <?php echo $i ?>
              </a></li>
          <?php } ?>
        </ul>
      </nav>
    </div>
