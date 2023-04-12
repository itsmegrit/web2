<form name="AdminAccountAdd" onsubmit="return AddAccount()" class="AdminAccountAdd">
        <div class="AdminAccountAddBar">
        <a href="admin.php?id=tk" class="admin-account-add-back" style="text-decoration: none;"><< Trở về<a> 
        </div>    
        <div class="AdminAccountAddTitle">
            <label style="font-size: 30px;">Thêm tài khoản</label></br>
        </div>
        <div class="AdminAccountAddDetail">
            <label>Username: </label></br>
            <input type="text" name="AdmintxtUsername"></br>
            <label>Mật khẩu: </label></br>
            <input type="password" name="AdmintxtPassword"></br>
            <label>Nhập lại mật khẩu: </label></br>
            <input type="password" name="AdmintxtRepassword"></br>
            <label>Quyền tài khoản: </label></br>
            <?php 
            include '..\\config/Connect.php';
            $con=new Connect();
            $result=$con->selectsql("quyen");
            echo "<select name='AdmintxtPermissionAccount'>";
            if($result->num_rows > 0){
                while($row=$result->fetch_assoc()){
                    echo "<option value='$row[maquyen]'>$row[tenquyen]</option>";
                }
            }
            echo "</select></br>";
        ?>
            <label>Email: </label></br>
            <input type="text" name="AdmintxtEmail"></br>
            <input type="hidden" name="AdmintxtAlert" readonly disabled style="border: white;color: red;"></br>
            <input type="submit" name="AdminAccountAddDetailSubmit" value="Thêm">
            <input type="hidden" name="id" value="tk"></br>
        </div>
    </div>
    <style>
        .AdminAccountAdd{
            overflow: auto;
            width: 102%;
            height: 102%;
        }
        .AdminAccountAddTitle{
            text-align: center;
        }
        .AdminAccountAddDetail label{
            margin-left: 10px;
            font-size: 20px;
            font-weight: 700;
        }
        .AdminAccountAddDetail input{
            margin: 15px;
            width: 90%;
            height: 30px;
        }
        .AdminAccountAddDetail select{
            margin: 15px;
            width: 90%;
            height: 30px;
        }
        .Accountfunction input{
            width: 3%;
            height: 15px;
            margin: 10px;
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