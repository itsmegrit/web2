<?php 
    if(isset($_GET["AdmintxtPassword"])){
    $con=new Connect();
    $password=$_GET["AdmintxtPassword"];
    $perac=$_GET['AdmintxtPermissionAccount'];
    if(isset($_GET["AdminAccountAddDetailSubmit"])){
        $result=$con->selectsql("taikhoan");
        $idac=$result->num_rows+1;
        $date=date("Y-m-d H:i:s", time());
        echo "$idac, $_GET[AdmintxtUsername] ,  $password,$date , $perac , ";
        $con->insertsql("taikhoan","VALUES ($idac,'$_GET[AdmintxtUsername]','$password','$date',1,'$perac')");
    }
    if(isset($_GET["AdminAccountEditDetailSubmit"])){
        $id=$_GET["AdmintxtID"];
        $con->editsql("taikhoan","mataikhoan='$id'","matkhau='$password',maquyen='$_GET[AdmintxtPermissionAccount]'");
    }
    $con->closeConnect();
    header("Location:admin.php?id=tk");
}
if(isset($_GET["function"])&&isset($_GET["idaccount"])){
    if($_GET["function"]=="Xóa"){
    if($_GET["idaccount"]=="001"){
        // echo "<script>alert('Không thể xóa quyền admin')</script>";     
    }
    else{
        $conn = new Connect();
        $result = $conn->editsql("taikhoan","mataikhoan='$_GET[idaccount]'","trangthai='0'");
        // echo "<script>alert('Xóa thành công')</script>";        
        $conn->closeConnect();
    }
}
if($_GET["function"]=="Khôi phục"){
    if($_GET["idaccount"]=="001"){
        // echo "<script>alert('Không thể xóa quyền admin')</script>";     
    }
    else{
        $conn = new Connect();
        $result = $conn->editsql("taikhoan","mataikhoan='$_GET[idaccount]'","trangthai='1'");
        // echo "<script>alert('Xóa thành công')</script>";        
        $conn->closeConnect();
    }
}
    header("Location:admin.php?id=tk");
}
?>