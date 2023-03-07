<?php
$a = $_GET["soA"];
$b = $_GET["soB"];
$pt = $_GET["phepTinh"];
if (!isset($a) || !isset($b) || !isset($pt) || $a == "" || $b == "" || $pt == "") {
  echo 'Cần nhập đầy đủ thông tin';
} else {
  if ($pt == "Cong") {
    $kq = $a + $b;
  }
  if ($pt == "Tru") {
    $kq = $a - $b;
  }
  if ($pt == "Nhan") {
    $kq = $a * $b;
  }
  if ($pt == "Chia") {
    if ($b == 0) {
      echo "Số b phải khác 0";
    }
    $kq = $a / $b;
  }
  echo "Kết quả = " . $kq;
}
