<?php 
    $con=new Connect();
    if(isset($_GET["Admintxtpermissionname"]) && isset($_GET["AdmintxtpermissionID"])){
    $permissionid=$_GET["AdmintxtpermissionID"];
    $permissionname=$_GET["Admintxtpermissionname"];
    $perfunc=$_GET['Admintxtpermissionfunc'];
    if($_GET["AdminpermissionAddDetailSubmit"]=="Thêm"){
    $con->insertsql("quyen","VALUES ('$permissionid','$permissionname',1)");
    foreach($perfunc as $id => $func){
        $con->insertsql("quyenvachucnang","VALUES ('$permissionid','$func')");
    }
    }
    if($_GET["AdminpermissionEditDetailSubmit"]=="Chỉnh Sửa"){
    $con->delsql("quyenvachucnang","maquyen='$permissionid'");
        foreach($perfunc as $id => $func){
            $con->insertsql("quyenvachucnang","VALUES ('$permissionid','$func')");
        }
    }
    $con->closeConnect();
    header("Location:admin.php?id=q");
}
?>