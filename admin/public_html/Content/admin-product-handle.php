<?php 
    if(isset($_GET["AdmintxtProductName"])){
    $con=new Connect();
    $productname=$_GET["AdmintxtProductName"];
    $price=$_GET["AdmintxtPrice"];
    $category=$_GET["AdmintxtProductCategory"];
    $provide=$_GET["AdmintxtProvide"];
    $unitproduce=$_GET["AdmintxtUnitProduce"];
    $detail=$_GET["AdmintxtDetail"];
    $quantity=$_GET["AdmintxtQuantity"];
    if($_GET["AdminpermissionAddDetailSubmit"]=="Thêm"){
        $con->insertsql("sanpham","VALUES ('$productname','$price','$category','$provide','$unitproduce','$detail','$quantity')");
    }
    if($_GET["AdminpermissionEditDetailSubmit"]=="Chỉnh Sửa"){
    }
    $con->closeConnect();
    header("Location:admin.php?id=tk");
}
if(isset($_GET["function"])&&isset($_GET["idaccount"])){
    $con=new Connect();
if($_GET["function"]=="Khôi phục"){
    $con->editsql("sanpham","mataikhoan='$_GET[idproduct]'","trangthai='1'");     
    }
if($_GET["function"]=="Xoá"){
    $con->editsql("sanpham","mataikhoan='$_GET[idproduct]'","trangthai='0'");     
}
    $con->closeConnect();
    header("Location:admin.php?id=tk");
}
?>