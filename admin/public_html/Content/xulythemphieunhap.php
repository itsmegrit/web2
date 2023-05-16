<?php
    include '..\\config/Connect.php';
   $maphieunhap = $_POST["maphieunhap"];
   $manhanvien = $_POST["manhanvien"];
   $date =$_POST["date"];
   $nhacungcap =$_POST["nhacungcap"];
    $datachitiet = $_POST['datachitiet'];
    // Chuyển đổi chuỗi JSON thành một mảng PHP
    $datachitiet_arr = json_decode($datachitiet, true);
    $tongtien =$_POST["tongtien"];
    $conn = new Connect();
    $result = $con->insertsql("phieunhap","VALUES ('$maphieunhap','$date','$nhacungcap','$manhanvien','$tongtien')");
    if(!$result){
        echo "Thêm thất bại";
    }            
        $conn->closeConnect();

?>