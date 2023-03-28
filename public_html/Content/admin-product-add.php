<div class="MainAdminProductAdd">
        <form name="AdminProductAdd" onsubmit="return AddProduct()" class="AdminProductAdd">
        <div class="AdminProductAddBar">
            <div class="AdminProductAddClose">X</div>
        </div>    
        <div class="AdminProductAddTitle">
            <label style="font-size: 30px;">Thêm sản phẩm</label></br>
        </div>
        <div class="AdminProductAddDetail">
            <label>Tên sản phẩm: </label>
            <input type="text" name="AdmintxtProductname"></br>
            <label>Giá tiền: </label>
            <input type="password" name="AdmintxtPrice"></br>
            <label>Hình ảnh: </label>
            <input type="password" name="AdmintxtIamge"></br>
            <label>Số lượng tồn: </label>
            <input type="text" name="AdmintxtQuantity"></br>
            <input type="hidden" name="AdmintxtAlert" readonly disabled style="border: white;color: red;"></br>
            <input type="submit" name="AdminProductAddDetailSubmit" value="Thêm">
        </div>
    </form>
    </div>
    <style>
        html{
            background-color: rgba(240,240,240, 0.5);
        }
        .MainAdminProductAdd{
            width: 100%;
            height: 1000px;
            position: fixed;
            background-color: rgba(240,240,240, 0.5);
            z-index: 10;
        }
        .AdminProductAdd{
            width: 50%;
            height: 50%;
            border: solid 1px black;
            margin: 5% 30%;
            background-color: white;
        }
        .AdminProductAddBar{
            background-color: rgb(250, 250, 250);
        }
        .AdminProductAddClose{
            text-align: center;
            width: 4%;
            margin-left: 96%;
            border-left: solid 1px black;
            border-bottom: solid 1px black;
        }
        .AdminProductAddClose:hover{
            background-color: red;
        }
        .AdminProductAddTitle{
            text-align: center;
        }
        .AdminProductAddDetail label{
            margin-left: 10px;
        }
        .AdminProductAddDetail input{
            margin: 20px;
        }
    </style>
    <script>
        function AddProduct(){
            var Productname=document.AdminProductAdd.AdmintxtProductname
            var password=document.AdminProductAdd.AdmintxtPrice
            var repassword=document.AdminProductAdd.AdmintxtIamge
            var email=document.AdminProductAdd.AdmintxtQuantity
            var alert=document.AdminProductAdd.AdmintxtAlert
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
    </script>
