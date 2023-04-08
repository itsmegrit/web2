<form name="AdminAccountAdd" onsubmit="return AddAccount()" class="AdminAccountAdd">
        <div class="AdminAccountAddBar">
        <a href="admin.php?id=tk" class="admin-account-add-back" style="text-decoration: none;"><< Trở về<a> 
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
            <input type="hidden" name="id" value="tk"></br>
        </div>
    </div>
    <style>
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