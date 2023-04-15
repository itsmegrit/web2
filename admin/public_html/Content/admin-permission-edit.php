<form name="AdminpermissionEdit" onsubmit="return Editpermission()" class="AdminpermissionEdit" action="admin.php">
            <a href="admin.php?id=q" class="admin-permission-Edit-back" style="text-decoration: none;"><< Trở về<a> 
        <div class="AdminpermissionEditTitle">
            <label style="font-size: 30px;">Chỉnh sửa quyền</label></br>
        </div>
        <div class="AdminpermissionEditDetail">
            <?php 
            include '..\\config/Connect.php';
            $con=new Connect();
            $result=$con->selectsql("chucnang");
            $sql=$con->selectsql("quyen","*","where maquyen='$_GET[idpermission]'");
            if($sql->num_rows == 1){
                $row=$sql->fetch_assoc();
                echo " <label>Mã quyền: </label></br>
            <input type='text' name='AdmintxtpermissionID' placeholder='Nhập mã sản phẩm'  class='AdmintxtpermissionID' readonly disabled value='$row[maquyen]'></br>
            <label>Tên quyền: </label></br>
            <input type='text' name='Admintxtpermissionname' placeholder='Nhập tên sản phẩm'  class='Admintxtpermissionname' value='$row[tenquyen]'></br>
            <div class='Permissionfunction'>";
            }
            $ctq=$con->selectsql("quyenvachucnang","*","where maquyen='$_GET[idpermission]'");
            $dt=$ctq->fetch_assoc();
            //1 sản phẩm thuộc nhiều thể loại
            if($result->num_rows > 0){
                while($row=$result->fetch_assoc()){
                    if(isset($dt["machucnang"])){
                    if($dt["machucnang"]==$row["machucnang"]){
                    echo "<input type='checkbox' name='AdmintxtpermissionCategory' value='$row[machucnang]' class='Admintxtpermissionfunction' checked>$row[tenchucnang]";
                    $dt=$ctq->fetch_assoc();
                    }
                    else{ 
                    echo "<input type='checkbox' name='AdmintxtpermissionCategory' value='$row[machucnang]' class='Admintxtpermissionfunction'>$row[tenchucnang]"; 
                    }
                }
                else{
                    echo "<input type='checkbox' name='AdmintxtpermissionCategory' value='$row[machucnang]' class='Admintxtpermissionfunction'>$row[tenchucnang]"; 
                }
                }
            }
        ?>
        </div>
            <input type="hidden" name="AdmintxtAlert" readonly disabled style="border: white;color: red;"></br>
            <input type="hidden" name="id" value="q"></br>
            <input type="submit" name="AdminpermissionEditDetailSubmit" class="AdminpermissionEditButton" value="Chỉnh sửa">
        </div>
    </form>
    <style>
        .AdminpermissionEdit{
            overflow: auto;
            width: 102%;
            height: 102%;
        }
        .AdminpermissionEditTitle{
            text-align: center;
        }
        .AdminpermissionEditDetail label{
            margin-left: 10px;
            font-size: 20px;
            font-weight: 700;
        }
        .AdminpermissionEditDetail input{
            margin: 15px;
            width: 90%;
            height: 30px;
        }
        .AdminEditpermissionIamge img{
            width: 100px;
            height: 100px;
        }
        .Permissionfunction input{
            width: 3%;
            height: 15px;
            margin: 10px;
        }
    </style>
    <script>
        function Editpermission(){
            //Kiểm tra dữ liệu nếu input bị lỗi thì báo vào thẻ input
            var permissionname=document.AdminpermissionEdit.Admintxtpermissionname
            var checkpermissionname= /^SV\d{5}\.$/
            if(!permissionname.value){
                alert.type="text"
                alert.value="Hãy nhập tên sản phẩm"
                permissionname.focus()
                return false
            }
            if(!checkpermissionname.test(permissionname.value)){
                alert.type="text"
                alert.value="Sai định dạng tên sản phẩm"
                permissionname.focus()
                return false
            }
            alert("Chỉnh sửa quyền thành công")
        return true
        }
</script>
<?php 
    if(isset($_GET["AdmintxtpermissionName"])){
        $permissionid=$_GET["AdmintxtpermissionID"];
        $permissionname=$_GET["Admintxtpermissionname"];
        $perfunc=$_GET["Admintxtpermissionfunc"];
        if($con->editsql("quyen","maquyen='$permissionid'","tenquyen='$permissionname'")){
            //Thành công
        }
        else{
            //Thất bại
        }
        foreach($perfunc as $func){
        $con->editsql("quyenvachucnang","maquyen='$permissionid'","machucnnang='$func'");
        }
        $con->closeConnect();
    }
?>