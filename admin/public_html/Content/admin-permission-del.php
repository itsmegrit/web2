<?php 
    if(isset($_GET["function"])=="Xóa"&&isset($_GET["idpermission"])){
        if($_GET["idpermission"]=="001"){
            header("Location:admin.php?id=q");
        }
        else{
            $conn = new Connect();
            $result = $conn->editsql("quyen","maquyen='$_GET[idpermission]'","tinhtrang='0'");   
            $conn->closeConnect();
            header("Location:admin.php?id=q");
            echo "<script type='text/javascript'>
            window.onload=function(){
                alert('xóa thành công')
            }
            </script>";   
        }
    }
?>