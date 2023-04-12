<?php 
    if(isset($_GET["function"])=="Xóa"&&isset($_GET["idaccount"])){
        if($_GET["idaccount"]=="001"){
            echo "<script>alert('Không thể xóa quyền admin')</script>";
        }
        else{
            $conn = new Connect();
            $result = $conn->editsql("taikhoan","mataikhoan='$_GET[idaccount]'","trangthai='0'");
            echo "<script>alert('Xóa thành công')</script>";        
            $conn->closeConnect();
        }
    }
?>