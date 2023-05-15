<div name="AdminAccountRestore" class="AdminAccountRestore">
        <div class="AdminAccountRestoreBar">
        <a href="admin.php?id=tk" class="admin-account-Restore-back" style="text-decoration: none;"><< Trở về<a> 
        </div>    
        <div class="AdminAccountRestoreTitle">
            <label style="font-size: 30px;">Khôi phục tài khoản</label></br>
        </div>
        <div class="admin-div-table-account">
    <table class="admin-table-account" cellspacing="1px" cellpadding="5px" width="100%" height="100%">
        <tr>
            <th>Mã tài khoản</th>
            <th>Username</th>
            <th>Quyền</th>
            <th>Ngày tạo</th>
            <th>Chức năng</th>
        </tr>
       <?php 
        include '..\\config/Connect.php';
        $conn=new Connect();
        $result = $conn->selectsql("taikhoan as tk,quyen as q","*","where tk.maquyen=q.maquyen");
            if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
                if($row["trangthai"]==0){
                echo "<tr>
                    <td>$row[mataikhoan]</td>
                    <td>$row[tentaikhoan]</td>
                    <td>$row[tenquyen]</td>
                    <td>$row[ngaytao]</td>
                    <td><form action='admin.php' method='GET' onsubmit='return ResAc()'><input type='submit' class='admin-account-res' name='function' value='Khôi phục'>
                    <input type='hidden' name='id' value='tk'>
                    <input type='hidden' name='idaccount' value='$row[mataikhoan]'>
                    </form>
                    </td>
                </tr>";
                }
              }
            } 
        $conn->closeConnect();
        ?>
    </table>
        </div>
</div>
    <script>
            function ResAc(){
            Chosse=confirm("Bạn chắc chắn khôi phục tài khoản này ?")
            if(Chosse){
                return true
            }
            return false
        }
    </script>
    <style>
        .AdminAccountRestore{
            overflow: auto;
            width: 102%;
            height: 102%;
        }
        .AdminAccountRestoreTitle{
            text-align: center;
        }
        .AdminAccountRestoreDetail label{
            margin-left: 10px;
            font-size: 20px;
            font-weight: 700;
        }
        .admin-table-account{
        text-align: center; 
        font-size: 16px;
        font-style: Times New Roman; 
        }
        .admin-table-account th,td{
            border-radius: 10px;
            border: solid 1px rgb(200, 200, 200);
        }
        .admin-account-res{
            padding: 3px 10px;
            background-color: greenyellow;
            border: solid 1px black;
            border-radius: 5px;
        }
        .admin-account-res:hover{
            background-color: yellow;
        }
        @media screen and (max-width: 1150px) {
            .admin-account-button-add{
                margin-left: 70%;
            }
}
</style>