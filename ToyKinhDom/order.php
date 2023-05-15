<?php
session_start();
$tennguoinhan = $_POST['name'];
$sdt = $_POST['phone'];
$diachi = $_POST['address'];
$email = $_POST['email'];

include_once('./config/Connection.php');
$conn = new Connect();

$cart = $_SESSION['cart'];
$tongtien = 0;

foreach ($cart as $each) {
  $tongtien += $each['quantity'] * $each['price'];
}

$idAccount = $_SESSION['idAccount'];
$user = $conn->selectsql("nguoidung", "*", "where nguoidung.mataikhoan='$idAccount'");
$row = mysqli_fetch_array($user);

$makhachhang = $row['manguoidung'];
$time = time();
$tinhtrang = 0;

echo 'KH ' . $makhachhang . ' - TONG TIEN ';
echo $tongtien;
$idd = $conn->selectsql("donhang");
$madonhang = $idd->num_rows + 1;

$data = $conn->insertsql("donhang(madonhang,thoigiandat, tinhtrang, makhachhang, tongtien, manhanvien)", "values ('$madonhang ','$time','$tinhtrang','$makhachhang','$tongtien', NULL)");

foreach ($cart as $productID => $each) {
  $quantity = $each['quantity'];
  $price = $each['price'];
  $sql = $conn->insertsql("chitietdonhang(madonhang, masanpham, soluong, giasanpham)", "values ('$madonhang','$productID','$quantity','$price')");
}
unset($_SESSION['cart']);
header('location: index1.php');
?>