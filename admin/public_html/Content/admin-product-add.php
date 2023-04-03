<form name="AdminProductAdd" onsubmit="return AddProduct()" class="AdminProductAdd" action="admin.php">
            <a href="admin.php?id=sp" class="admin-product-add-back" style="text-decoration: none;"><< Trở về<a> 
        <div class="AdminProductAddTitle">
            <label style="font-size: 30px;">Thêm sản phẩm</label></br>
        </div>
        <div class="AdminProductAddDetail">
            <label>Tên sản phẩm: </label></br>
            <input type="text" name="AdmintxtProductname" placeholder="Nhập tên sản phẩm"  class="AdmintxtProductname"></br>
            <label>Thể loại: </label></br>
            <input type="text" name="AdmintxtProductCategory" placeholder="Nhập thể loại của sản phẩm" class="AdmintxtProductCategory"></br>
            <label>Giá bán: </label></br>
            <input type="text" name="AdmintxtPrice" placeholder="Nhập giá bán" class="AdmintxtPrice"></br>
            <label>Nhà cung cấp: </label></br> 
            <input type="text" name="AdmintxtProvide" placeholder="Nhập tên nhà cung cấp hoặc mã nhà cung cấp" name="AdmintxtProvide" class="AdmintxtProvide"></br>
            <label>Đơn vị sản xuất: </label></br> 
            <input type="text" name="AdmintxtUnitProduce" placeholder="Nhập đơn vị sản xuất" name="AdmintxtUnitProduce" class="AdmintxtUnitProduce"></br>
            <label>Mô tả chi tiết: </label></br> 
            <input type="text" name="AdmintxtDetail" placeholder="Nhập tên nhà cung cấp hoặc mã nhà cung cấp" name="AdmintxtDetail" class="AdmintxtDetail"></br>
            <div class="AdminAddProductIamge">
            <label>Hình ảnh 1: </label></br>
            <input type="file" name="AdmintxtIamge1" class="AdmintxtIamge1" data-multiple-caption="{count} files selected" 
                    accept="image/gif, image/jpeg, image/png" onchange="ChooseFile(this)" id="1">
            <img id="image1"></br>
            <label>Hình ảnh 2: </label></br>
            <input type="file" name="AdmintxtIamge2" class="AdmintxtIamge2" data-multiple-caption="{count} files selected"
                    accept="image/gif, image/jpeg, image/png" onchange="ChooseFile(this)" id="2">
            <img id="image2"></br>
            <label>Hình ảnh 3: </label></br>
            <input type="file" name="AdmintxtIamge3" class="AdmintxtIamge3" data-multiple-caption="{count} files selected"
                    accept="image/gif, image/jpeg, image/png" onchange="ChooseFile(this)" id="3">
            <img id="image3"></br>
            <label>Hình ảnh 4: </label></br>
            <input type="file" name="AdmintxtIamge4" class="AdmintxtIamg4" data-multiple-caption="{count} files selected"
                    accept="image/gif, image/jpeg, image/png" onchange="ChooseFile(this)" id="4">
            <img id="image4">
            </div>
            <label>Số lượng tồn: </label></br> 
            <input type="text" name="AdmintxtQuantity" placeholder="Nhập số lượng tồn" name="AdmintxtQuantity" class="AdmintxtQuantity"></br>
            <input type="hidden" name="AdmintxtAlert" readonly disabled style="border: white;color: red;"></br>
            <input type="hidden" name="id" value="sp"></br>
            <input type="submit" name="AdminProductAddDetailSubmit" class="AdminProductAddButton" value="Thêm">
        </div>
    </form>
    <style>
        .AdminProductAdd{
            overflow: auto;
            width: 102%;
            height: 102%;
        }
        .AdminProductAddTitle{
            text-align: center;
        }
        .AdminProductAddDetail label{
            margin-left: 10px;
            font-size: 20px;
            font-weight: 700;
        }
        .AdminProductAddDetail input{
            margin: 15px;
            width: 90%;
            height: 30px;
        }
        .AdminAddProductIamge input{
            width: 40%;
            height: 30px;
            margin-top: 20px;
            margin-bottom: 20px;
        }
        .AdminAddProductIamge img{
            width: 100px;
            height: 100px;
        }
    </style>
    <script>
        function AddProduct(){
            var Productname=document.AdminProductAdd.AdmintxtProductname
            var Price=document.AdminProductAdd.AdmintxtPrice
            var Provide=document.AdminProductAdd.AdmintxtProvide
            var UnitProduce=document.AdminProductAdd.AdmintxtUnitProduce
            var Detail=document.AdminProductAdd.AdmintxtDetail
            var Quantity=document.AdminProductAdd.AdmintxtQuantity
            var alert=document.AdminProductAdd.AdmintxtAlert
            var checkProductname= /^SV\d{5}\.$/
            var checkPrice= /\d{6,10}đ$/
            //Thể loại không cần check vì nó sẽ là select nên sẽ lun có dữ liệu//
            //Nhà cung cấp có khả năng không cần check//
            var checkProvide= /^SV\d{5}\.$/
            var checkUnitProduce= /^SV\d{5}\.$/
            var checkQuantity= /\d{1,4}$/
            var checkDetail= /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            if(!Productname.value){
                alert.type="text"
                alert.value="Hãy nhập tên sản phẩm"
                Productname.focus()
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
            if(!checkProductname.test(Productname.value)){
                alert.type="text"
                alert.value="Sai định dạng tên sản phẩm"
                Productname.focus()
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
    include '..\\config/Connect.php';
    if(isset($_GET["AdmintxtProductName"])){
    $productname=$_GET["AdmintxtProductName"];
    $price=$_GET["AdmintxtPrice"];
    $category=$_GET["AdmintxtProductCategory"];
    $provide=$_GET["AdmintxtProvide"];
    $unitproduce=$_GET["AdmintxtUnitProduce"];
    $detail=$_GET["AdmintxtDetail"];
    $quantity=$_GET["AdmintxtQuantity"];
    $sql="INSERT INTO TABLE product ($productname,$price,$category,$provide,$unitproduce,$detail,$quantity)";
    $conn = openConnect();
    if($conn->query($sql)){
        //Thành công
    }
    else{
        //Thất bại
    }
}
?>