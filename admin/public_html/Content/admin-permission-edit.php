<form name="AdminpermissionEdit" onsubmit="return Editpermission()" class="AdminpermissionEdit" action="admin.php?id=q" method="POST">
            <a href="admin.php?id=q" class="admin-permission-Edit-back" style="text-decoration: none;"><< Trở về<a> 
        <div class="AdminpermissionEditTitle">
            <label style="font-size: 30px;">Chỉnh sửa quyền</label></br>
        </div>
        <div class="AdminpermissionEditDetail">
            <?php 
            $con=new Connect();
            $result=$con->selectsql("chucnang");
            $sql=$con->selectsql("quyen","*","where maquyen='$_GET[idpermission]'");
            if($sql->num_rows == 1){
                $row=$sql->fetch_assoc();
                echo " <label>Mã quyền: </label></br>
            <input type='text' name='AdmintxtpermissionID' placeholder='Nhập mã quyền'  class='AdmintxtpermissionID' readonly value='$row[maquyen]'></br>
            <label>Tên quyền: </label></br>
            <input type='text' name='Admintxtpermissionname' placeholder='Nhập tên quyền'  class='Admintxtpermissionname' value='$row[tenquyen]'></br>
            <div class='Permissionfunction'>";
            }
            $ctq=$con->selectsql("quyenvachucnang","*","where maquyen='$_GET[idpermission]'");
            $dt=$ctq->fetch_assoc();
            //1 sản phẩm thuộc nhiều thể loại
            if($result->num_rows > 0){
                while($row=$result->fetch_assoc()){
                    if(isset($dt["machucnang"])){
                    if($dt["machucnang"]==$row["machucnang"]){
                    echo "<input type='checkbox' name='Admintxtpermissionfunc[]' value='$row[machucnang]' class='Admintxtpermissionfunction' checked>$row[tenchucnang]";
                    $dt=$ctq->fetch_assoc();
                    }
                    else{ 
                    echo "<input type='checkbox' name='Admintxtpermissionfunc[]' value='$row[machucnang]' class='Admintxtpermissionfunction'>$row[tenchucnang]"; 
                    }
                }
                else{
                    echo "<input type='checkbox' name='Admintxtpermissionfunc[]' value='$row[machucnang]' class='Admintxtpermissionfunction'>$row[tenchucnang]"; 
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
            if(!permissionname.value){
                alert("Hãy nhập tên quyền")
                permissionname.focus()
                return false
            }
        return true
        }
</script>