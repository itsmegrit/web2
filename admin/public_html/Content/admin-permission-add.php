<form name="AdminpermissionAdd" onsubmit="return Addpermission()" class="AdminpermissionAdd" action="admin.php">
            <a href="admin.php?id=q" class="admin-permission-add-back" style="text-decoration: none;"><< Trở về<a> 
        <div class="AdminpermissionAddTitle">
            <label style="font-size: 30px;">Thêm quyền</label></br>
        </div>
        <div class="AdminpermissionAddDetail">
            <label>Mã quyền: </label></br>
            <input type="text" name="AdmintxtpermissionID" placeholder="Nhập mã sản phẩm"  class="AdmintxtpermissionID"></br>
            <label>Tên quyền: </label></br>
            <input type="text" name="Admintxtpermissionname" placeholder="Nhập tên sản phẩm"  class="Admintxtpermissionname"></br>
            <div class="Permissionfunction">
            <?php 
            include '..\\config/Connect.php';
            $con=new Connect();
            $result=$con->selectsql("chucnang");
            //1 sản phẩm thuộc nhiều thể loại
            if($result->num_rows > 0){
                while($row=$result->fetch_assoc()){
                    echo "<input type='checkbox' name='AdmintxtpermissionCategory' value='$row[machucnang]' class='Admintxtpermissionfunction'>$row[tenchucnang]";
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
            var permissionname=document.AdminpermissionAdd.Admintxtpermissionname
            //có thể ko cần kiểm tra đúng kiểu dữ liệu tên sản phẩm
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
            alert("Thêm quyền thành công")
        return true
        }
</script>
<?php 
    if(isset($_GET["AdmintxtpermissionName"])){
    $permissionname=$_GET["AdmintxtpermissionName"];
    $price=$_GET["AdmintxtPrice"];
    $category=$_GET["AdmintxtpermissionCategory"];
    $provide=$_GET["AdmintxtProvide"];
    $unitproduce=$_GET["AdmintxtUnitProduce"];
    $detail=$_GET["AdmintxtDetail"];
    if($con->insertsql("permission","('$permissionname','$price','$category')")){
        //Thành công
    }
    else{
        //Thất bại
    }
    $con->closeConnect();
}
?>
