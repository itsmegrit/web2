<?php 
    if(isset($_GET["function"])=="Xóa"){
        $conn = new Connect();
        //Chỉnh sửa tình trạng của sản phẩm để lưu lại dữ liệu được xóa
        $sql = "DELETE FROM Product where id='$_GET[idproduct]'";
        $result = $conn->delsql("Product","$_GET[idproduct]");
        if(!$result){
            echo "Xóa không thành công";
        }            
            $conn->closeConnect();
        }       
?>