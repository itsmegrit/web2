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
        echo "Thêm thất bại do trùng tên quyền :$permissionname trong hệ thống";
    }
    else{
    $result=$con->insertsql("quyen","VALUES ('$permissionid','$permissionname',1)");
    if($result){    
        foreach($perfunc as $id => $func){
        $con->insertsql("quyenvachucnang","VALUES ('$permissionid','$func')");
    }
        echo "Thêm thành công";
    }
    else{
        echo "Thêm thất bại do trùng mã quyền: $permissionid trong hệ thống";
    }

}
    }
    if(isset($_POST["AdminpermissionEditDetailSubmit"])){
    $con->delsql("quyenvachucnang","maquyen='$permissionid'");
    $per=$con->selectsql("quyen");
    $flag=true;
    while($row=$per->fetch_assoc()){
        if($row["tenquyen"]==$permissionname){
            $flag=false;
        }
    }
    if(!$flag){
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