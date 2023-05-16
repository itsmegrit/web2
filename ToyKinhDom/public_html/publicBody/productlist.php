<?php
include_once('./config/Connection.php');
$conn = new Connect();

$soSanPhamTrenTrang = 8; // Số lượng sản phẩm trên mỗi trang

// Lấy title thể loại
$product1 = $conn->selectsql("theloai,chitietsanpham", "*", "where theloai.matheloai=chitietsanpham.matheloai AND chitietsanpham.matheloai='$_GET[id]'");
$row_title = mysqli_fetch_array($product1);

$soLuongSanPham = $conn->countRows("theloai,chitietsanpham,sanpham", "where theloai.matheloai=chitietsanpham.matheloai AND chitietsanpham.matheloai='$_GET[id]' AND sanpham.masanpham = chitietsanpham.masanpham");
$soTrang = ceil($soLuongSanPham / $soSanPhamTrenTrang); // Số trang

$currentPage = isset($_GET['page']) ? $_GET['page'] : 1; // Trang hiện tại, mặc định là trang 1 nếu không có tham số trên URL

$startIndex = ($currentPage - 1) * $soSanPhamTrenTrang; // Vị trí bắt đầu của sản phẩm trên trang hiện tại
$endIndex = $startIndex + $soSanPhamTrenTrang - 1; // Vị trí kết thúc của sản phẩm trên trang hiện tại

$product = $conn->selectsql("theloai,chitietsanpham,sanpham", "*", "where theloai.matheloai=chitietsanpham.matheloai AND chitietsanpham.matheloai='$_GET[id]' AND sanpham.masanpham = chitietsanpham.masanpham LIMIT $startIndex, $soSanPhamTrenTrang");
?>

<div class="commonLayout body">
  <div class="container">
    <div class="row mt-6">
      <div class="row">
        <h2>
          <?php echo $row_title['tentheloai'] ?>
        </h2>
      </div>
    </div>
    <div class="row" id="product-list">
      <?php
      while ($row = mysqli_fetch_array($product)) {
        ?>
        <div class="col-md-3 col-sm-6">
          <a href="index1.php?action=sanpham&id=<?php echo $row['masanpham'] ?>">
            <div class="product-grid">
              <div class="product-image">
                <img class="img-1" src="./public_html/img/<?php echo $row['hinhanh1'] ?>">
                <img class="img-2" src="./public_html/img/<?php echo $row['hinhanh2'] ?>">
              </div>
              <div class="product-content">
                <ul class="rating">
                  <li class="fas fa-star"></li>
                  <li class="fas fa-star"></li>
                  <li class="fas fa-star"></li>
                  <li class="fas fa-star"></li>
                  <li class="fas fa-star
disable"></li>
                  <li class="disable"></li>
                </ul>
                <h3 class="title">
                  <a href="index1.php?action=sanpham&id=<?php echo $row['masanpham'] ?>">
                    <?php echo $row['tensanpham'] ?>
                  </a>
                </h3>
                <div class="price">
                  <?php echo number_format($row['giaban'], 0, ',', ',') . 'VNĐ' ?>
                </div>
              </div>
            </div>
          </a>
        </div>
        <?php
      }
      ?>
    </div>
    <div class="row">
      <nav aria-label="Page navigation example">
        <ul class="pagination">
          <?php for ($i = 1; $i <= $soTrang; $i++) { ?>
            <li class="page-item <?php echo ($i == $currentPage) ? 'active' : ''; ?>">
              <a class="page-link" href="#" data-page="<?php echo $i; ?>"><?php echo $i; ?></a>
            </li>
          <?php } ?>
        </ul>
      </nav>
    </div>
  </div>
</div>

<script>
  $(document).ready(function () {
    var currentPage = <?php echo $currentPage; ?>;
    var totalPages = <?php echo $soTrang; ?>;
    var id = <?php echo $_GET['id']; ?>;

    function loadProducts(page) {
      $.ajax({
        url: './public_html/publicBody/load_products.php',
        method: 'POST',
        data: { page: page, id: id },
        beforeSend: function () {
          $('#product-list').html('<div class="loading">Loading...</div>');
        },
        success: function (response) {
          $('#product-list').html(response);
        },
        error: function (e) {
          console.log(e);
        }
      });
    }

    loadProducts(currentPage);

    $(document).on('click', '.pagination .page-link', function (e) {
      e.preventDefault();
      var page = $(this).data('page');
      loadProducts(page);
    });
  });
</script>