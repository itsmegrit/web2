<?php
session_start();
$productID = $_GET['productID'];
$type = $_GET['type'];

if ($type === 'decre') {
  if ($_SESSION['cart'][$productID]['quantity'] > 1) {
    $_SESSION['cart'][$productID]['quantity']--;
  } else {
    unset($_SESSION['cart'][$productID]);
  }
}

header('location: http://localhost/web2/ToyKinhDom/index1.php?action=cart');
?>