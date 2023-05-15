<?php
session_start();
$productID = $_GET['productID'];
$type = $_GET['type'];

if ($type === 'incre') {
  $_SESSION['cart'][$productID]['quantity']++;
}
header('location: http://localhost/web2/ToyKinhDom/index1.php?action=cart');
?>