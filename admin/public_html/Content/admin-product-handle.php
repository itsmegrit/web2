<?php 
if(isset($_GET["AdmintxtProductID"])){
    $con=new Connect();
    $productID=$_GET["AdmintxtProductID"];
    $productname=$_GET["AdmintxtProductname"];
    $price=$_GET["AdmintxtPrice"];
    $category=$_GET["AdmintxtProductCategory"];
    $provide=$_GET["AdmintxtProvide"];
    $detail=$_GET["AdmintxtDetail"];
    $quantity=$_GET["AdmintxtQuantity"];
    $hinh1=$_GET["AdmintxtImage1"];
    $hinh2=$_GET["AdmintxtImage2"];
    $hinh3=$_GET["AdmintxtImage3"];
    $hinh4=$_GET["AdmintxtImage4"];
    if(isset($_GET["AdminProductAddDetailSubmit"])){
        $con->insertsql("sanpham","VALUES ('$productID','$productname','$price','$provide','$quantity','$detail','$hinh1','$hinh2','$hinh3','$hinh4',1)");
        foreach($category as $temp => $cate){
            $con->insertsql("chitietsanpham","VALUES ('$productID','$cate')");
        }
    }
    if(isset($_GET["AdminProductEditDetailSubmit"])){
        $con->editsql("sanpham","masanpham='$productID'","tensanpham='$productname',giaban='$price',nhacungcap='$provide',soluongton='$quantity',motachitiet='$detail',hinhanh1='$hinh1',hinhanh2='$hinh2',hinhanh3='$hinh3',hinhanh4='$hinh4'");
        $con->delsql("chitietsanpham","masanpham='$productID'");
        foreach($category as $temp => $cate){
            $con->insertsql("chitietsanpham","VALUES ('$productID','$cate')");
        }
    }
    $con->closeConnect();
    // header("Location:admin.php?id=sp");
}
if(isset($_GET["function"])&&isset($_GET["idproduct"])){
    // if($_GET["function"]=="Khôi phục"){
    //     $con=new Connect();
    //     $con->editsql("sanpham","masanpham='$_GET[idproduct]'","tinhtrang=1");
    //     $con->closeConnect();     
    // }
    if($_GET["function"]=="Xóa"){
        $con=new Connect();
        $con->editsql("sanpham","masanpham='$_GET[idproduct]'","tinhtrang=0"); 
        $con->closeConnect();   
    }    
    header("Location:admin.php?id=sp");   
}
?>