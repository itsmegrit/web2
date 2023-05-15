<?php 
    if(isset($_GET["function"])=="Xóa"&&isset($_GET["idproduct"])){
        $conn = new Connect();
        $result = $conn->editsql("sanpham","tinhtrang='0'","id='$_GET[idproduct]'");
        if(!$result){
            echo "Xóa không thành công";
        }            
            $conn->closeConnect();
        }       
?>