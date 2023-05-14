<?php 
if(isset($_POST["AdmintxtProductID"])){
    $con=new Connect();
    $productID=$_POST["AdmintxtProductID"];
    $productname=$_POST["AdmintxtProductname"];
    $price=$_POST["AdmintxtPrice"];
    $category=$_POST["AdmintxtProductCategory"];
    $provide=$_POST["AdmintxtProvide"];
    $detail=$_POST["AdmintxtDetail"];
    $quantity=$_POST["AdmintxtQuantity"];
    $hinh1=$_POST["AdmintxtImage1"];
    $hinh2=$_POST["AdmintxtImage2"];
    $hinh3=$_POST["AdmintxtImage3"];
    $hinh4=$_POST["AdmintxtImage4"];
    if(isset($_POST["AdminProductAddDetailSubmit"])){
        $result=$con->insertsql("sanpham","VALUES ('$productID','$productname','$price','$provide','$quantity','$detail','$hinh1','$hinh2','$hinh3','$hinh4',1)");
        if($result){
            echo "Thêm thành công";
        }
        else{
            echo "Thêm thất bại do hệ thống có mã sản phẩm : $productID";
        }
        foreach($category as $temp => $cate){
            $con->insertsql("chitietsanpham","VALUES ('$productID','$cate')");
        }
    }
    if(isset($_POST["AdminProductEditDetailSubmit"])){
        $con->editsql("sanpham","masanpham='$productID'","tensanpham='$productname',giaban='$price',nhacungcap='$provide',soluongton='$quantity',motachitiet='$detail',hinhanh1='$hinh1',hinhanh2='$hinh2',hinhanh3='$hinh3',hinhanh4='$hinh4'");
        $con->delsql("chitietsanpham","masanpham='$productID'");
        foreach($category as $temp => $cate){
            $con->insertsql("chitietsanpham","VALUES ('$productID','$cate')");
        }
    }
    $con->closeConnect();
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