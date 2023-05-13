<?php 
    $con=new Connect();
    if(isset($_GET["Admintxtpermissionname"]) && isset($_GET["AdmintxtpermissionID"])){
    $permissionid=$_GET["AdmintxtpermissionID"];
    $permissionname=$_GET["Admintxtpermissionname"];
    $perfunc=$_GET['Admintxtpermissionfunc'];
    if(isset($_GET["AdminpermissionAddDetailSubmit"])){
    $con->insertsql("quyen","VALUES ('$permissionid','$permissionname',1)");
    foreach($perfunc as $id => $func){
        $con->insertsql("quyenvachucnang","VALUES ('$permissionid','$func')");
    }
    }
    if(isset($_GET["AdminpermissionEditDetailSubmit"])){
    $con->delsql("quyenvachucnang","maquyen='$permissionid'");
    $con->editsql("quyen","maquyen='$permissionid'","tenquyen='$permissionname'");
        foreach($perfunc as $id => $func){
            $con->insertsql("quyenvachucnang","VALUES ('$permissionid','$func')");
        }
    }
    $con->closeConnect();
    // header("Location:admin.php?id=q");
}
?>