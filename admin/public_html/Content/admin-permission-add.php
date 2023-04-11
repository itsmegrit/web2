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
            var permissionID=document.AdminpermissionAdd.AdmintxtpermissionID
            var permissionname=document.AdminpermissionAdd.Admintxtpermissionname
            var Price=document.AdminpermissionAdd.AdmintxtPrice
            var Provide=document.AdminpermissionAdd.AdmintxtProvide
            var UnitProduce=document.AdminpermissionAdd.AdmintxtUnitProduce
            var Detail=document.AdminpermissionAdd.AdmintxtDetail
            var Quantity=document.AdminpermissionAdd.AdmintxtQuantity
            var alert=document.AdminpermissionAdd.AdmintxtAlert
            var checkID=/[a-z-A-Z]{3}\d{4}$/
            //có thể ko cần kiểm tra đúng kiểu dữ liệu tên sản phẩm
            var checkpermissionname= /^SV\d{5}\.$/
            var checkPrice= /\d{6,10}\đ$/
            //Thể loại không cần check vì nó sẽ là select nên sẽ lun có dữ liệu//
            //Nhà cung cấp có khả năng không cần check//
            // var checkProvide= /^SV\d{5}\.$/
            // var checkUnitProduce= /^SV\d{5}\.$/
            var checkQuantity= /\d{1,4}$/
            var checkDetail= /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/
            if(!permissionID.value){
                alert.type="text"
                alert.value="Hãy nhập mã sản phẩm"
                permissionID.focus()
                return false
            }
            if(!permissionname.value){
                alert.type="text"
                alert.value="Hãy nhập tên sản phẩm"
                permissionname.focus()
                return false
            }
            if(!Price.value){
                alert.type="text"
                alert.value="Hãy nhập giá bán"
                Price.focus()
                return false
            }
            if(!UnitProduce.value){
                alert.type="text"
                alert.value="Hãy nhập đơn vị sản xuất"
                UnitProduce.focus()
                return false
            }
            if(!Detail.value){
                alert.type="text"
                alert.value="Hãy mô tả sản phẩm"
                Detail.focus()
                return false
            }
            if(!Quantity.value){
                alert.type="text"
                alert.value="Hãy nhập số lượng"
                Quantity.focus()
                return false
            }
            if(!checkpermissionID.test(permissionID.value)){
                alert.type="text"
                alert.value="Sai định dạng mã sản phẩm"
                permissionID.focus()
                return false
            }
            if(!checkpermissionname.test(permissionname.value)){
                alert.type="text"
                alert.value="Sai định dạng tên sản phẩm"
                permissionname.focus()
                return false
            }
            if(!checkPrice.test(Price.value)){
                alert.type="text"
                alert.value="Sai định dạng giá bán"
                Price.focus()
                return false
            }
            if(!checkQuantity.test(Quantity.value)){
                alert.type="text"
                alert.value="Sai định dạng số lượng"
                Quantity.focus()
                return false
            }
            alert("Thêm sản phẩm thành công")
        return true
        }
        function ChooseFile(file){
            if(file.files[0]){
                var reader=new FileReader();
                switch(file.id){
                    case "1":
                    reader.onload= function(e){
                    $('#image1').attr('src',e.target.result);}
                    break
                    case "2":
                    reader.onload= function(e){
                    $('#image2').attr('src',e.target.result);}
                    break
                    case "3":
                    reader.onload= function(e){
                    $('#image3').attr('src',e.target.result);}
                    break
                    case "4":
                    reader.onload= function(e){
                    $('#image4').attr('src',e.target.result);}
                    break
                    default: break
                }
                reader.readAsDataURL(file.files[0])
            }
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
