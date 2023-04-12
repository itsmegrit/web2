<form class="admin-account">
    <div class="admin-account-title"><label>Quản lý tài khoản</label></br>
    <a href="admin.php?id=tk&action=add" class="admin-account-button-add" style="text-decoration: none;">+ Thêm<a>
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
        include 'admin-account-del.php';
        $conn=new Connect();
        $result = $conn->selectsql("taikhoan as tk,quyen as q","*","where tk.maquyen=q.maquyen");
            if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
                if($row["trangthai"]==1){
                echo "<tr>
                    <td>$row[mataikhoan]</td>
                    <td>$row[tentaikhoan]</td>
                    <td>$row[tenquyen]</td>
                    <td>$row[ngaytao]</td>
                    <td><form action='admin.php' method='GET' onsubmit='return Del()'><input type='submit' class='admin-account-del' name='function' value='Xóa'>
                    <input type='hidden' name='id' value='tk'>
                    <input type='hidden' name='idaccount' value='$row[mataikhoan]'>
                    <a href='admin.php?id=tk&action=edit&idaccount=$row[mataikhoan]' class='admin-account-Edit' style='text-decoration: none;'>Sửa<a> 
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
    <style>
        .admin-account-title{
            text-align: center;
            margin-bottom: 10px;
        }
        .admin-account-title label{
            font-size: 30px;
        }
        .admin-div-table-account{
            background-color:rgb(247,247,247); 
            margin-top:10px;
            border-radius: 10px;
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
        .admin-account-button-add{
            margin-left: 90%;
            padding: 5px;
            font-size: 15px;
            color: white;
            background-color: blue;
            border: solid 1px black;
            border-radius: 10px;
        }
        .admin-account-button-add:hover{
            background-color: chartreuse;
        }
        .admin-account-Edit{
            padding: 3px 10px;
            font-size: 15px;
            color: black;
            background-color: aqua;
            border-radius: 5px;
            border: solid 1px black;
        }
        .admin-account-Edit:hover{
            background-color: blue;
        }
        .admin-account-del{
            padding: 3px 10px;
            background-color: red;
            color: white;
            border: solid 1px black;
            border-radius: 5px;
        }
        .admin-account-del:hover{
            background-color: brown;
        }
        @media screen and (max-width: 1150px) {
            .admin-account-button-add{
                margin-left: 70%;
            }
}
    </style>
</form>