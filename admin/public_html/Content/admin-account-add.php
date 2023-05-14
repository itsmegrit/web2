<form name="AdminAccountAdd" onsubmit="return AddAccount()" class="AdminAccountAdd" action="admin.php?id=tk" method="POST">
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
            <input type="submit" name="AdminAccountAddDetailSubmit" value="Thêm">
            <input type="hidden" name="id" value="tk"></br>
        </div>
    </div>
</form>
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
            var checkpass= /^[a-zA-Z0-9_\.\-\\!@#$%^&*()=+]{6,14}$/
            if(!username.value){
                alert("Hãy nhập tên tài khoản")
                username.focus()
                return false
            }
            if(!password.value){
                alert("Hãy nhập mật khẩu")
                password.focus()
                return false
            }
            if(!repassword.value){
                alert("Hãy nhập lại mật khẩu")
                repassword.focus()
                return false
            }
            if(password.value!=repassword.value){
                alert("Nhập lại mật khẩu không giống mật khẩu đã nhập")
                repassword.focus()
                return false
            }
            if(!checkpass.test(password.value)){
                alert("Sai định dạng mật khẩu")
                password.focus()
                return false
            }
        return true
        }
</script>