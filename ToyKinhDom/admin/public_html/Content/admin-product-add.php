<form name="AdminProductAdd" onsubmit="return AddProduct()" class="AdminProductAdd" action="admin.php?id=sp" method="POST">
            <a href="admin.php?id=sp" class="admin-product-add-back" style="text-decoration: none;"><< Trở về<a> 
        <div class="AdminProductAddTitle">
            <label style="font-size: 30px;">Thêm sản phẩm</label></br>
        </div>
        <div class="AdminProductAddDetail">
            <label>Mã sản phẩm: </label></br>
            <input type="text" name="AdmintxtProductID" placeholder="Nhập mã sản phẩm"  class="AdmintxtProductID"></br>
            <label>Tên sản phẩm: </label></br>
            <input type="text" name="AdmintxtProductname" placeholder="Nhập tên sản phẩm"  class="AdmintxtProductname"></br>
            <label>Thể loại: </label>
            <div class="Productcategory">
            <?php 
            include '..\\config/Connect.php';
            $con=new Connect();
            $result=$con->selectsql("theloai");
            //1 sản phẩm thuộc nhiều thể loại            
            if($result->num_rows > 0){
                while($row=$result->fetch_assoc()){
                    echo "<input type='checkbox' name='AdmintxtProductCategory[]' value='$row[matheloai]' class='AdmintxtProductCategory'>$row[tentheloai]";
                }
            }
        ?>
        </div>
            <label>Giá bán: </label></br>
            <input type="text" name="AdmintxtPrice" placeholder="Nhập giá bán" class="AdmintxtPrice"></br>
            <label>Nhà cung cấp: </label></br> 
            <input type="text" name="AdmintxtProvide" placeholder="Nhập tên nhà cung cấp hoặc mã nhà cung cấp" name="AdmintxtProvide" class="AdmintxtProvide"></br>
            <label>Mô tả chi tiết: </label></br> 
            <input type="text" name="AdmintxtDetail" placeholder="Nhập tên nhà cung cấp hoặc mã nhà cung cấp" name="AdmintxtDetail" class="AdmintxtDetail"></br>
            <div class="AdminAddProductImage">
            <label>Hình ảnh 1: </label>
            <input type="file" name="AdmintxtImage1" class="AdmintxtImage1" data-multiple-caption="{count} files selected" 
                    accept="image/gif, image/jpeg, image/png" onchange="ChooseFile(this)" id="1">
            <img id="image1">
            <li onclick="DeleteImage(1)">Xóa hình</li><br>
            <label>Hình ảnh 2: </label>
            <input type="file" name="AdmintxtImage2"  class="AdmintxtImage2" data-multiple-caption="{count} files selected"
                    accept="image/gif, image/jpeg, image/png" onchange="ChooseFile(this)" id="2">
            <img id="image2">
            <li onclick="DeleteImage(2)">Xóa hình</li><br>
            <label>Hình ảnh 3: </label>
            <input type="file" name="AdmintxtImage3" class="AdmintxtImage3" data-multiple-caption="{count} files selected"
                    accept="image/gif, image/jpeg, image/png" onchange="ChooseFile(this)" id="3">
            <img id="image3">
            <li onclick="DeleteImage(3)">Xóa hình</li><br>
            <label>Hình ảnh 4: </label>
            <input type="file" name="AdmintxtImage4"  class="AdmintxtImage4" data-multiple-caption="{count} files selected"
                    accept="image/gif, image/jpeg, image/png" onchange="ChooseFile(this)" id="4">
            <img id="image4">
            <li onclick="DeleteImage(4)">Xóa hình</li><br>
            </div>
            <label>Số lượng tồn: </label></br> 
            <input type="text" name="AdmintxtQuantity" placeholder="Nhập số lượng tồn" name="AdmintxtQuantity" class="AdmintxtQuantity"></br>
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
        .AdminAddProductImage input{
            width: 40%;
            height: 30px;
            margin-top: 20px;
            margin-bottom: 20px;
        }
        .AdminAddProductImage img{
            width: 100px;
            height: 100px;
        }
        .AdminAddProductImage li{
            display: inline;
            border: solid 2px black;
            padding: 2px 10px;
            border-radius: 5px;
            margin-left: 10px;
            background-color: red;
            color: white;
        }
        .AdminAddProductImage li:hover{
            background-color: blue;
        }
        .Productcategory input{
            width: 3%;
            height: 15px;
            margin: 10px;
        }
    </style>
    <script>
        function DeleteImage(number){
            debugger;
            document.getElementById("image"+number).src=""
            document.getElementById(""+number).value=""
            event.preventDefault();
        }
        function AddProduct(){
            //Kiểm tra dữ liệu nếu input bị lỗi thì báo vào thẻ input
            var ProductID=document.AdminProductAdd.AdmintxtProductID
            var Productname=document.AdminProductAdd.AdmintxtProductname
            var Price=document.AdminProductAdd.AdmintxtPrice
            var Provide=document.AdminProductAdd.AdmintxtProvide
            var Category=document.querySelectorAll(".AdmintxtProductCategory")
            var image=document.getElementById("image1")
            var Detail=document.AdminProductAdd.AdmintxtDetail
            var Quantity=document.AdminProductAdd.AdmintxtQuantity
            var checkPrice= /\d{6,10}$/
            var checkQuantity= /\d{1,4}$/
            if(!ProductID.value){
                alert("Hãy nhập mã sản phẩm")
                ProductID.focus()
                return false
            }
            if(!Productname.value){
                alert("Hãy nhập tên sản phẩm")
                Productname.focus()
                return false
            }
            var flag=false
            for(let i=0;i<Category.length;i++){
                if(Category[i].checked){
                    flag=true
                    break
                }
            }
            if(flag==false){
                alert("Hãy chọn ít nhất 1 thể loại sản phẩm")
                return false
            }
            if(!Price.value){
                alert("Hãy nhập giá bán")
                Price.focus()
                return false
            }
            if(!Detail.value){
                alert("Hãy mô tả sản phẩm")
                Detail.focus()
                return false
            }
            if(!Quantity.value){
                alert("Hãy nhập số lượng")
                Quantity.focus()
                return false
            }
            if(!checkPrice.test(Price.value)){
                alert("Sai định dạng giá bán")
                Price.focus()
                return false
            }
            if(!checkQuantity.test(Quantity.value)){
                alert("Sai định dạng số lượng")
                Quantity.focus()
                return false
            }
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
