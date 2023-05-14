<form name="AdminpermissionAdd" onsubmit="return Addpermission()" class="AdminpermissionAdd" action="admin.php?id=q" method="POST">
            <a href="admin.php?id=q" class="admin-permission-add-back" style="text-decoration: none;"><< Trở về<a> 
        <div class="AdminpermissionAddTitle">
            <label style="font-size: 30px;">Thêm quyền</label></br>
        </div>
        <div class="AdminpermissionAddDetail">
            <label>Mã quyền: </label></br>
            <input type="text" name="AdmintxtpermissionID" placeholder="Nhập mã quyền với định dạng là 3 ký tự số"  class="AdmintxtpermissionID"></br>
            <label>Tên quyền: </label></br>
            <input type="text" name="Admintxtpermissionname" placeholder="Nhập tên quyền"  class="Admintxtpermissionname"></br>
            <div class="Permissionfunction">
            <?php 
            include '..\\config/Connect.php';
            $con=new Connect();
            $result=$con->selectsql("chucnang");
            //1 sản phẩm thuộc nhiều thể loại
            if($result->num_rows > 0){
                while($row=$result->fetch_assoc()){
                    echo "<input type='checkbox' name='Admintxtpermissionfunc[]' value='$row[machucnang]' class='Admintxtpermissionfunction'>$row[tenchucnang]";
                }
            }
        ?>
        </div>
            <input type="hidden" name="AdmintxtAlert" readonly disabled style="border: white;color: red;"></br>
            <input type="hidden" name="id" value="q"></br>
            <input type="submit" name="AdminpermissionAddDetailSubmit" class="AdminpermissionAddButton" value="Thêm">
        </div>
    </form>
    <style>
        .AdminpermissionAdd{
            overflow: auto;
            width: 102%;
            height: 102%;
        }
        .AdminpermissionAddTitle{
            text-align: center;
        }
        .AdminpermissionAddDetail label{
            margin-left: 10px;
            font-size: 20px;
            font-weight: 700;
        }
        .AdminpermissionAddDetail input{
            margin: 15px;
            width: 90%;
            height: 30px;
        }
        .AdminAddpermissionIamge img{
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
        function Addpermission(){
            //Kiểm tra dữ liệu nếu input bị lỗi thì báo vào thẻ input
            var permissionid=document.AdminpermissionAdd.AdmintxtpermissionID
            var permissionname=document.AdminpermissionAdd.Admintxtpermissionname
            var checkid=/\d{3}$/
            //có thể ko cần kiểm tra đúng kiểu dữ liệu tên sản phẩm
            if(!permissionid.value){
                alert("Hãy nhập mã quyền")
                permissionname.focus()
                return false
            }
            if(!checkid.test(permissionid.value)){
                alert("Hãy nhập đúng định dạng mã quyền là 3 kí tự số")
                permissionname.focus()
                return false
            }
            if(!permissionname.value){
                alert("Hãy nhập tên quyền")
                permissionname.focus()
                return false
            }
        return true
        }
</script>
<?php 
//     if(isset($_GET["Admintxtpermissionname"]) && isset($_GET["AdmintxtpermissionID"])){
//     $permissionid=$_GET["AdmintxtpermissionID"];
//     $permissionname=$_GET["Admintxtpermissionname"];
//     $perfunc=$_GET["Admintxtpermissionfunc"];
//     if($con->insertsql("quyen","VALUES ('$permissionid','$permissionname',1)")){
//         //Thành công
//     }
//     else{

//     }
//     // foreach($perfunc as $func){
//     $con->insertsql("quyenvachucnang","VALUES ('$permissionid','$perfunc')");
//     // }
//     header("Location:admin.php?id=q");
//     $con->closeConnect();
// }
?>
