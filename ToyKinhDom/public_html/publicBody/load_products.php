<?php
include_once('..\..\\config/Connection.php');
$conn = new Connect();

$soSanPhamTrenTrang = 8; // Số lượng sản phẩm trên mỗi trang

$currentPage = isset($_POST['page']) ? $_POST['page'] : 1; // Trang hiện tại, mặc định là trang 1 nếu không có tham số trên URL

$startIndex = ($currentPage - 1) * $soSanPhamTrenTrang; // Vị trí bắt đầu của sản phẩm trên trang hiện tại
$endIndex = $startIndex + $soSanPhamTrenTrang - 1; // Vị trí kết thúc của sản phẩm trên trang hiện tại

$product = $conn->selectsql("theloai,chitietsanpham,sanpham", "*", "where theloai.matheloai=chitietsanpham.matheloai AND chitietsanpham.matheloai='$_POST[id]' AND sanpham.masanpham = chitietsanpham.masanpham LIMIT $startIndex, $soSanPhamTrenTrang");

$output = '';

while ($row = mysqli_fetch_array($product)) {
  $output .= '
    <div class="col-md-3 col-sm-6">
        <a href="index1.php?action=sanpham&id=' . $row['masanpham'] . '">
            <div class="product-grid">
                <div class="product-image">
                    <img class="img-1" src="./public_html/img/' . $row['hinhanh1'] . '">
                    <img class="img-2" src="./public_html/img/' . $row['hinhanh2'] . '">
                </div>
                <div class="product-content">
                    <ul class="rating">
                        <li class="fas fa-star"></li>
                        <li class="fas fa-star"></li>
                        <li class="fas fa-star"></li>
                        <li class="fas fa-star"></li>
                        <li class="fas fa-star disable"></li>
                        <li class="disable"></li>
                    </ul>
                    <h3 class="title">
                        <a href="index1.php?action=sanpham&id=' . $row['masanpham'] . '">' . $row['tensanpham'] . '</a>
                    </h3>
                    <div class="price">' . number_format($row['giaban'], 0, ',', ',') . 'VNĐ</div>
                </div>
            </div>
        </a>
    </div>
    ';
}

echo $output;
?>