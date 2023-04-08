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
            <th>Email</th>
            <th>Chức năng</th>
        </tr>
       <?php 
            $servername = "localhost";
            $username = "QLBH";
            $password = "123456";
            $dbname = "web2";
            
            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
            }
            
            $sql = "SELECT * FROM Account";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>$row[ID_Account]</td>
                    <td>$row[Username]</td>
                    <td>$row[Password]</td>
                    <td>$row[ID_Permission]</td>
                    <td><form action='admin.php' method='GET' onsubmit='return Del()'><input type='submit' class='admin-account-del' name='function' value='Xóa'>
                    <a href='admin.php?id=sp&&action=edit' class='admin-account-Edit' style='text-decoration: none;'>Sửa<a> 
                    <input type='hidden' name='id' value='sp'>
                    </td>
                </tr>";
              }
            } else {
              echo "0 results";

            }
            $conn->close();
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