<?php 
    if(isset($_POST["AdmintxtPassword"])){
    $con=new Connect();
    $password=$_POST["AdmintxtPassword"];
    $perac=$_POST['AdmintxtPermissionAccount'];
    if(isset($_POST["AdminAccountAddDetailSubmit"])){
        $result=$con->selectsql("taikhoan");
        $idac=$result->num_rows+1;
        $flag=true;
        while($row=$result->fetch_assoc()){
            if($row["tentaikhoan"]==$_POST["AdmintxtUsername"]){
                $flag=false;
                break;
            }
        }
        if($flag){
        $date=date("Y-m-d H:i:s", time());
        $con->insertsql("taikhoan","VALUES ($idac,'$_POST[AdmintxtUsername]','$password','$date',1,'$perac')");
        echo "Thêm thành công";
        }
        else{
            echo "Thêm thất bại do trùng tên tài khoản: $_POST[AdmintxtUsername]";
        }
    }
    if(isset($_POST["AdminAccountEditDetailSubmit"])){
        $id=$_POST["AdmintxtID"];
        $con->editsql("taikhoan","mataikhoan='$id'","matkhau='$password',maquyen='$_POST[AdmintxtPermissionAccount]'");
    }
    $con->closeConnect();
}
if(isset($_GET["function"])&&isset($_GET["idaccount"])){
    if($_GET["function"]=="Xóa"){
        $conn = new Connect();
        $result = $conn->editsql("taikhoan","mataikhoan='$_GET[idaccount]'","trangthai='0'");
        // echo "<script>alert('Xóa thành công')</script>";        
        $conn->closeConnect();
}
if($_GET["function"]=="Khôi phục"){
        $conn = new Connect();
        $result = $conn->editsql("taikhoan","mataikhoan='$_GET[idaccount]'","trangthai='1'");
        // echo "<script>alert('Xóa thành công')</script>";        
        $conn->closeConnect();
}
    header("Location:admin.php?id=tk");
}
?>