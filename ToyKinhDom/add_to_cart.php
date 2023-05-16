<?php
session_start();
$productID = $_GET['productID'];
// Giỏ hàng chưa có gì
if (empty($_SESSION['cart'][$productID])) {
  include_once('./config/Connection.php');
  $conn = new Connect();
  $productdetail = $conn->selectsql("sanpham", "*", "where sanpham.masanpham='$_GET[productID]'");
  $row = mysqli_fetch_array($productdetail);
  $_SESSION['cart'][$productID]['name'] = $row['tensanpham'];
  $_SESSION['cart'][$productID]['price'] = $row['giaban'];
  $_SESSION['cart'][$productID]['productImage'] = $row['hinhanh1'];
  $_SESSION['cart'][$productID]['quantity'] = 1;

  // Hiển thị thông báo thành công
  echo "<script>alert('Thêm thành công vào giỏ hàng!');</script>";

  // Chuyển hướng về trang index1.php sau khi người dùng bấm OK
  echo "<script>window.location.href = 'http://localhost/web2/ToyKinhDom/index1.php';</script>";
} else {
  // Đã tồn tại sản phẩm trong giỏ hàng
  $_SESSION['cart'][$productID]['quantity']++;

  // Hiển thị thông báo thành công
  echo "<script>alert('Thêm thành công vào giỏ hàng!');</script>";

  // Chuyển hướng về trang index1.php sau khi người dùng bấm OK
  echo "<script>window.location.href = 'http://localhost/web2/ToyKinhDom/index1.php';</script>";
}
?>