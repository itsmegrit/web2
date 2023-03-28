<div class="MainAdminAccountAdd">
        <form name="AdminAccountAdd" onsubmit="return AddAccount()" class="AdminAccountAdd">
        <div class="AdminAccountAddBar">
            <div class="AdminAccountAddClose">X</div>
        </div>    
        <div class="AdminAccountAddTitle">
            <label style="font-size: 30px;">Thêm tài khoản</label></br>
        </div>
        <div class="AdminAccountAddDetail">
            <label>Username: </label>
            <input type="text" name="AdmintxtUsername"></br>
            <label>Mật khẩu: </label>
            <input type="password" name="AdmintxtPassword"></br>
            <label>Nhập lại mật khẩu: </label>
            <input type="password" name="AdmintxtRepassword"></br>
            <label>Email: </label>
            <input type="text" name="AdmintxtEmail"></br>
            <input type="hidden" name="AdmintxtAlert" readonly disabled style="border: white;color: red;"></br>
            <input type="submit" name="AdminAccountAddDetailSubmit" value="Thêm">
        </div>
    </form>
    </div>
    <style>
        .MainAdminAccountAdd{
            width: 100%;
            height: 1000px;
            position: fixed;
            background-color: rgba(240,240,240, 0.5);
            z-index: 10;
        }
        .AdminAccountAdd{
            width: 50%;
            height: 50%;
            border: solid 1px black;
            margin: 5% 30%;
            background-color: white;
        }
        .AdminAccountAddBar{
            background-color: rgb(250, 250, 250);
        }
        .AdminAccountAddClose{
            text-align: center;
            width: 4%;
            margin-left: 96%;
            border-left: solid 1px black;
            border-bottom: solid 1px black;
        }
        .AdminAccountAddClose:hover{
            background-color: red;
        }
        .AdminAccountAddTitle{
            text-align: center;
        }
        .AdminAccountAddDetail label{
            margin-left: 10px;
        }
        .AdminAccountAddDetail input{
            margin: 20px;
        }
    </style>
    <script>
        function AddAccount(){
            var username=document.AdminAccountAdd.AdmintxtUsername
            var password=document.AdminAccountAdd.AdmintxtPassword
            var repassword=document.AdminAccountAdd.AdmintxtRepassword
            var email=document.AdminAccountAdd.AdmintxtEmail
            var alert=document.AdminAccountAdd.AdmintxtAlert
            var checkuser= /^SV\d{5}\.$/
            var checkemail= /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
            var checkpass= /\d{6,15}$/
            if(!checkuser.test(username.value)){
                alert.type="text"
                alert.value="Sai định dạng username"
                username.focus()
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