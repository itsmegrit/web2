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
            <input type='text' name='AdmintxtID' readonly disabled value='$row[mataikhoan]'></br>
            <input type='hidden' name='AdmintxtID' value='$row[mataikhoan]'>
            <label>Username: </label></br>
            <input type='text' name='AdmintxtUsername' readonly disabled value='$row[tentaikhoan]'></br>
            <label>Mật khẩu: </label></br>
            <input type='password' name='AdmintxtPassword' value='$row[matkhau]' placeholder='Nhập 6-15 ký tự,số'></br>
            <label>Quyền tài khoản: </label></br>";
            if($_GET["idaccount"]=="001"){
                echo "<input type='hidden' name='AdmintxtPermissionAccount' value='$row[maquyen]'>
                <select name='AdmintxtPermissionAccount' readonly disabled>";}
            else{
                echo "<select name='AdmintxtPermissionAccount'>";  
            }
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
            echo "</select></br>
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
            var password=document.AdminAccountEdit.AdmintxtPassword
            var alert=document.AdminAccountEdit.AdmintxtAlert
            if(!password.value){
                alert.type="text"
                alert.value="Hãy nhập mật khẩu từ 6-15 ký tự,số"
                username.focus()
                return false
            }
            alert("Chỉnh sửa thành công")
        return true
        }
    </script>