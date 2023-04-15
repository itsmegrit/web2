<form name="AdminAccountEdit" onsubmit="return EditAccount()" class="AdminAccountEdit">
        <div class="AdminAccountEditBar">
        <a href="admin.php?id=tk" class="admin-account-Edit-back" style="text-decoration: none;"><< Trở về<a> 
        </div>    
        <div class="AdminAccountEditTitle">
            <label style="font-size: 30px;">Chỉnh sửa tài khoản</label></br>
        </div>
        <div class="AdminAccountEditDetail">
        <?php 
        include '..\\config/Connect.php';
        $conn=new Connect();
        $result = $conn->selectsql("taikhoan as tk,quyen as q","*","where tk.maquyen=q.maquyen and mataikhoan=$_GET[idaccount]");
        $per=$conn->selectsql("quyen");
            if ($result->num_rows == 1) {
              // output data of each row
            $row = $result->fetch_assoc();
            echo "
            <label>Mã tài khoản: </label></br>
            <input type='text' name='AdmintxtUsername' readonly disabled value='$row[mataikhoan]'></br>
            <label>Username: </label></br>
            <input type='text' name='AdmintxtUsername' readonly disabled value='$row[tentaikhoan]'></br>
            <label>Mật khẩu: </label></br>
            <input type='password' name='AdmintxtPassword' readonly disabled value='$row[matkhau]'></br>
            <label>Quyền tài khoản: </label></br>";
            if($_GET["idaccount"]=="001"){
            echo "<select name='AdmintxtPermissionAccount' readonly disabled>";
            if($per->num_rows > 0){
                while($perrow=$per->fetch_assoc()){
                    if($row["maquyen"]==$perrow["maquyen"]){
                        echo "<option value='$perrow[maquyen]' selected>$perrow[tenquyen]</option>";
                    }
                    else{
                        echo "<option value='$perrow[maquyen]'>$perrow[tenquyen]</option>";
                    }
                }
                }
            }
            else{
            echo "<select name='AdmintxtPermissionAccount'>";
            if($per->num_rows > 0){
                while($perrow=$per->fetch_assoc()){
                    if($row["maquyen"]==$perrow["maquyen"]){
                        echo "<option value='$perrow[maquyen]' selected>$perrow[tenquyen]</option>";
                    }
                    else{
                        echo "<option value='$perrow[maquyen]'>$perrow[tenquyen]</option>";
                    }
                }
                }
            }
            echo "</select></br>";
            echo "<label>Email: </label></br>
            <input type='text' name='AdmintxtEmail'></br>
            <input type='hidden' name='AdmintxtAlert' readonly disabled style='border: white;color: red;'></br>
            <input type='submit' name='AdminAccountEditDetailSubmit' value='Chỉnh sửa'>
            <input type='hidden' name='id' value='tk'></br>";
            } 
        $conn->closeConnect();
        ?>
            
        </div>
    </div>
    <style>
        .AdminAccountEdit{
            overflow: auto;
            width: 102%;
            height: 102%;
        }
        .AdminAccountEditTitle{
            text-align: center;
        }
        .AdminAccountEditDetail label{
            margin-left: 10px;
            font-size: 20px;
            font-weight: 700;
        }
        .AdminAccountEditDetail input{
            margin: 15px;
            width: 90%;
            height: 30px;
        }
        .AdminAccountEditDetail select{
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
        function EditAccount(){
            var username=document.AdminAccountEdit.AdmintxtUsername
            var password=document.AdminAccountEdit.AdmintxtPassword
            var repassword=document.AdminAccountEdit.AdmintxtRepassword
            var email=document.AdminAccountEdit.AdmintxtEmail
            var alert=document.AdminAccountEdit.AdmintxtAlert
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