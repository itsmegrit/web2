<?php 
    if(isset($_GET["function"])=="Xóa"){
        $conn = openConnect();
        $sql = "DELETE FROM Product where id='$_GET[idproduct]'";
        $result = $conn->query($sql);
        if(!$result){
            echo "Xóa không thành công";
        }            
            $conn->close();
        }       
?>