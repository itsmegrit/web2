<form name="AdminProductEdit" onsubmit="return EditProduct()" class="AdminProductEdit" action="admin.php?id=sp" method="POST" >
            <a href="admin.php?id=sp" class="admin-product-Edit-back" style="text-decoration: none;"><< Trở về<a> 
        <div class="AdminProductEditTitle">
            <label style="font-size: 30px;">Chỉnh sửa sản phẩm</label></br>
        </div>
        <div class="AdminProductEditDetail">
            <?php 
            $con=new Connect();
            $id=$_GET['idproduct'];
            $result=$con->selectsql("sanpham","*","where masanpham='$id'");
            //Phần thể loại chưa thể hiện checkbox hoặc select 
            //Chưa có dữ liệu để thể hiện GUI
            if($result->num_rows==1){
                $row=$result->fetch_assoc();
            echo "<label>Mã sản phẩm: </label></br>
            <input type='text' name='AdmintxtProductID' value='$row[masanpham]' readonly></br>
            <label>Tên sản phẩm: </label></br>
            <input type='text' name='AdmintxtProductname' value='$row[tensanpham]' class='AdmintxtProductname'></br>
            <label>Thể loại: </label></br>
            <div class='ProductCategory'>";
            $detail=$con->selectsql("chitietsanpham as ct,theloai as tl","*","where masanpham='$id' and ct.matheloai=tl.matheloai");
            $category=$con->selectsql("theloai");
            $dt=$detail->fetch_assoc();
            if($category->num_rows>0){ 
                while($ct=$category->fetch_assoc()){
                    if(isset($dt['matheloai'])){
                    if($dt['matheloai']==$ct['matheloai']){
                        echo "<input type='checkbox' name='AdmintxtProductCategory[]' value='$ct[matheloai]' class='AdmintxtProductCategory' checked>$ct[tentheloai]";
                        $dt=$detail->fetch_assoc();
                    }
                    else{
                        echo "<input type='checkbox' name='AdmintxtProductCategory[]' value='$ct[matheloai]' class='AdmintxtProductCategory'>$ct[tentheloai]";
                    }
                }
                else{
                    echo "<input type='checkbox' name='AdmintxtProductCategory[]' value='$ct[matheloai]' class='AdmintxtProductCategory'>$ct[tentheloai]";
                }
            }
        }
            echo "</div>
            <label>Giá bán: </label></br>
            <input type='text' name='AdmintxtPrice' value='$row[giaban]' class='AdmintxtPrice'></br>
            <label>Nhà cung cấp: </label></br> 
            <input type='text' name='AdmintxtProvide'  value='$row[nhacungcap]' name='AdmintxtProvide' class='AdmintxtProvide'></br>
            <label>Mô tả chi tiết: </label></br> 
            <input type='text' name='AdmintxtDetail' value='$row[motachitiet]' name='AdmintxtDetail' class='AdmintxtDetail'></br>
            <div class='AdminEditProductImage'>
            <label>Hình ảnh 1: </label></br>
            <input type='file' class='AdmintxtImage1' data-multiple-caption='{count} files selected' 
                    accept='image/gif, image/jpeg, image/png' onchange='ChooseFile(this)' id='1'>
            <input type='hidden' name='AdmintxtImage1' value='$row[hinhanh1]' id='AdmintxtImage1'>
            <img id='image1' src='../../PictureProduct/$row[hinhanh1]'>
            <li onclick='DeleteImage(1)'>Xóa hình</li></br>
            <label>Hình ảnh 2: </label></br>
            <input type='file' class='AdmintxtImage2' data-multiple-caption='{count} files selected'
                    accept='image/gif, image/jpeg, image/png' onchange='ChooseFile(this)' id='2'>
            <input type='hidden' name='AdmintxtImage2' value='$row[hinhanh2]' id='AdmintxtImage2'>
            <img id='image2' src='../../PictureProduct/$row[hinhanh2]'>
            <li onclick='DeleteImage(2)'>Xóa hình</li></br>
            <label>Hình ảnh 3: </label></br>
            <input type='file' class='AdmintxtImage3' data-multiple-caption='{count} files selected'
                    accept='image/gif, image/jpeg, image/png' onchange='ChooseFile(this)' id='3'>
            <input type='hidden' name='AdmintxtImage3' value='$row[hinhanh3]' id='AdmintxtImage3'>
            <img id='image3' src='../../PictureProduct/$row[hinhanh3]'>
            <li onclick='DeleteImage(3)''>Xóa hình</li></br>
            <label>Hình ảnh 4: </label></br>
            <input type='file' name='AdmintxtImage4' class='AdmintxtIamg4' data-multiple-caption='{count} files selected'
                    accept='image/gif, image/jpeg, image/png' onchange='ChooseFile(this)' id='4' value='$row[hinhanh4]'>
            <input type='hidden' name='AdmintxtImage4' value='$row[hinhanh4]' id='AdmintxtImage4'>
            <img id='image4' src='../../PictureProduct/$row[hinhanh4]'>
            <li onclick='DeleteImage(4)''>Xóa hình</li>
            </div>
            <label>Số lượng tồn: </label></br> 
            <input type='text' name='AdmintxtQuantity' class='AdmintxtQuantity' value='$row[soluongton]'></br>
            <input type='hidden' name='id' value='sp'></br>
            <input type='submit' name='AdminProductEditDetailSubmit' class='AdminProductEditButton' value='Chỉnh sửa'>";
                }
            ?>
            <!-- <label>Tên sản phẩm: </label></br>
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
            <input type="submit" name="AdminProductEditDetailSubmit" class="AdminProductEditButton" value="Thêm"> -->
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
        .AdminEditProductImage input{
            width: 40%;
            height: 30px;
            margin-top: 20px;
            margin-bottom: 20px;
        }
        .AdminEditProductImage img{
            width: 100px;
            height: 100px;
        }
        .AdminEditProductImage li{
            display: inline;
            border: solid 2px black;
            padding: 2px 10px;
            border-radius: 5px;
            margin-left: 10px;
            background-color: red;
            color: white;
        }
        .AdminEditProductImage li:hover{
            background-color: blue;
        }
        .ProductCategory input{
            width: 3%;
            height: 15px;
            margin: 10px;
        }
    </style>
    <script>
         function DeleteImage(number){
            debugger;
            document.getElementById("AdmintxtImage"+number).value=""
            document.getElementById("image"+number).src=""
            document.getElementById(""+number).value=""
            event.preventDefault();
        }
       function EditProduct(){
            //Kiểm tra dữ liệu nếu input bị lỗi thì báo vào thẻ input
            var Productname=document.AdminProductEdit.AdmintxtProductname
            var Price=document.AdminProductEdit.AdmintxtPrice
            var Category=document.querySelectorAll(".AdmintxtProductCategory")
            var image=document.getElementById("image1")
            var Provide=document.AdminProductEdit.AdmintxtProvide
            var Detail=document.AdminProductEdit.AdmintxtDetail
            var Quantity=document.AdminProductEdit.AdmintxtQuantity
            var checkPrice= /\d{6,10}$/
            var checkQuantity= /\d{1,4}$/
            if(!Productname.value){
                alert("Hãy nhập tên sản phẩm")
                Productname.focus()
                return false
            }
            if(!Price.value){
                alert("Hãy nhập giá bán")
                Price.focus()
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
            if(!image.src){
                alert("Hãy chọn ít nhất 1 hình ảnh của sản phẩm")
                return false
            }
            if(!Provide.value){
                alert("Hãy nhập đơn vị sản xuất")
                UnitProduce.focus()
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
            alert("Sửa sản phẩm thành công")
        return true
        }
        function ChooseFile(file){
            if(file.files[0]){
                var reader=new FileReader();
                switch(file.id){
                    case "1":
                    reader.onload= function(e){
                        document.AdminProductEdit.AdmintxtImage1.value=file.files[0]["name"]
                    $('#image1').attr('src',e.target.result);}
                    break
                    case "2":
                    reader.onload= function(e){
                        document.AdminProductEdit.AdmintxtImage2.value=file.files[0]["name"]
                    $('#image2').attr('src',e.target.result);}
                    break
                    case "3":
                    reader.onload= function(e){
                        document.AdminProductEdit.AdmintxtImage3.value=file.files[0]["name"]
                    $('#image3').attr('src',e.target.result);}
                    break
                    case "4":
                    reader.onload= function(e){
                        document.AdminProductEdit.AdmintxtImage4.value=file.files[0]["name"]
                    $('#image4').attr('src',e.target.result);}
                    break
                    default: break
                }
                console.log(file.files[0])
                reader.readAsDataURL(file.files[0])
            }
    }
    </script>
