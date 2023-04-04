<form name="AdminProductEdit" onsubmit="return EditProduct()" class="AdminProductEdit" action="admin.php">
            <a href="admin.php?id=sp" class="admin-product-Edit-back" style="text-decoration: none;"><< Trở về<a> 
        <div class="AdminProductEditTitle">
            <label style="font-size: 30px;">Chỉnh sửa sản phẩm</label></br>
        </div>
        <div class="AdminProductEditDetail">
            <?php 
            
            ?>
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
            <div class="AdminEditProductIamge">
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
            <input type="submit" name="AdminProductEditDetailSubmit" class="AdminProductEditButton" value="Thêm">
        </div>
    </form>
    <style>
        .AdminProductEdit{
            overflow: auto;
            width: 102%;
            height: 102%;
        }
        .AdminProductEditTitle{
            text-align: center;
        }
        .AdminProductEditDetail label{
            margin-left: 10px;
            font-size: 20px;
            font-weight: 700;
        }
        .AdminProductEditDetail input{
            margin: 15px;
            width: 90%;
            height: 30px;
        }
        .AdminEditProductIamge input{
            width: 40%;
            height: 30px;
            margin-top: 20px;
            margin-bottom: 20px;
        }
        .AdminEditProductIamge img{
            width: 100px;
            height: 100px;
        }
    </style>
    <script>
        function EditProduct(){
            var Productname=document.AdminProductEdit.AdmintxtProductname
            var password=document.AdminProductEdit.AdmintxtPrice
            var repassword=document.AdminProductEdit.AdmintxtIamge
            var email=document.AdminProductEdit.AdmintxtQuantity
            var alert=document.AdminProductEdit.AdmintxtAlert
            var checkuser= /^SV\d{5}\.$/
            var checkemail= /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            var checkpass= /\d{6,15}$/
            if(!checkuser.test(Productname.value)){
                alert.type="text"
                alert.value="Sai định dạng tên sản phẩm"
                Productname.focus()
                return false
            }
            if(!checkemail.test(email.value)){
                alert.value="Sai định dạng email"
                email.focus()
                return false
            }
            alert("Đăng ký thành công")
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
