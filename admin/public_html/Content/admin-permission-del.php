<?php 
    if(isset($_GET["function"])=="Xóa"&&isset($_GET["idpermission"])){
        if($_GET["idpermission"]=="001"){
            echo "<script>alert('Không thể xóa quyền admin')</script>";
        }
        else{
            $conn = new Connect();
            $result = $conn->editsql("quyen","maquyen='$_GET[idpermission]'","tinhtrang='0'");
            echo "<script>alert('Xóa thành công')</script>";
        }
        $conn->closeConnect();
    }
?>