<?php 
    $con=new Connect();
    if(isset($_POST["Admintxtpermissionname"]) && isset($_POST["AdmintxtpermissionID"])){
    $permissionid=$_POST["AdmintxtpermissionID"];
    $permissionname=$_POST["Admintxtpermissionname"];
    $perfunc=$_POST['Admintxtpermissionfunc'];
    if(isset($_POST["AdminpermissionAddDetailSubmit"])){
    $per=$con->selectsql("quyen");
    $flag=true;
    while($row=$per->fetch_assoc()){
        if($row["tenquyen"]==$permissionname){
            $flag=false;
        }
    }
    if(!$flag){
        $message="Thêm thất bại do trùng tên quyền :$permissionname trong hệ thống";
        echo "<script type='text/javascript'>alert('$message');</script>";
        }
    else{
    $result=$con->insertsql("quyen","VALUES ('$permissionid','$permissionname',1)");
    if($result){    
        foreach($perfunc as $id => $func){
        $con->insertsql("quyenvachucnang","VALUES ('$permissionid','$func')");
    }
        $message="Thêm thành công";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
    else{
        $message="Thêm thất bại do trùng mã quyền: $permissionid trong hệ thống";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }

}
    }
    if(isset($_POST["AdminpermissionEditDetailSubmit"])){
    $con->delsql("quyenvachucnang","maquyen='$permissionid'");
    $per=$con->selectsql("quyen");
    $flag=1;
    while($row=$per->fetch_assoc()){
        if($row["tenquyen"]==$permissionname){
            $flag++;
        }
    }
    if($flag>2){
        echo "Chỉnh sửa thất bại do trùng tên quyền : $permissionname trong hệ thống";
    }
    else{
    $con->editsql("quyen","maquyen='$permissionid'","tenquyen='$permissionname'");
        foreach($perfunc as $id => $func){
            $con->insertsql("quyenvachucnang","VALUES ('$permissionid','$func')");
        }
    }
}
    $con->closeConnect();
    // header("Location:admin.php?id=q");
}
?>