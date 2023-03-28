<?php

$username = "customer";
$password = "toykinhdom";
$host = ":3307";
$dbname = "web2lab";

$connect = mysqli_connect($host, $username, $password, $dbname);
if ($connect->connect_error) {
  die("Không kết nối :" . $connect->connect_error);
  exit();
} else {
  echo "Thanh cong";
}

$sql = "SELECT maNhomQuyen, tenNhomQUyen FROM nhomQuyen";
$result = $connect->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while ($row = $result->fetch_assoc()) {
    echo "maNhomQuyen: " . $row["maNhomQuyen"] . " - tenNhomQuyen: " . $row["tenNhomQUyen"] . "<br>";
  }
} else {
  echo "0 results";
}

$connect->close();
?>