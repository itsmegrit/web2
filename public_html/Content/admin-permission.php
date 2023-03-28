<form class="admin-permission">
    <div class="admin-permission-title"><label>Quản lý quyền</label></br>
    <input type="button" value="+ Thêm" class="admin-permission-button-add">
    </div>
    <div class="admin-div-table-permission">
    <table class="admin-table-permission" cellspacing="1px" cellpadding="5px" width="100%" height="100%">
        <tr>
            <th>Mã quyền</th>
            <th>Tên quyền</th>
            <th>Chức năng</th>
        </tr>
       <?php 
/*          $servername = "localhost";
            $username = "QLBH";
            $password = "123456";
            $dbname = "web2";
            
            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
            }
            
            $sql = "SELECT * FROM permission";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>$row[ID_permission]</td>
                    <td>$row[PermissionName]</td>
                    <td>$row[Password]</td>
                    <td>$row[Permission]</td>
                    <td><input type='submit' value='Xóa' id='$row[ID_permission]'></td>
                </tr>";
              }
            } else {
              echo "0 results";

            }
            $conn->close();*/
        ?>
    </table>
    </div>
    <style>
        .admin-permission-title{
            text-align: center;
            margin-bottom: 10px;
        }
        .admin-permission-title label{
            font-size: 30px;
        }
        .admin-div-table-permission{
            background-color:rgb(247,247,247); 
            margin-top:10px;
        }
        .admin-table-permission{
        text-align: center; 
        font-size: 16px;
        font-style: Times New Roman; 
        }
        .admin-table-permission th,td{
            border-radius: 10px;
            border: solid 1px rgb(200, 200, 200);
        }
        .admin-permission-button-add{
            margin-left: 90%;
            padding: 5px;
            font-size: 15px;
            color: white;
            background-color: blue;
            border-radius: 10px;
        }
        .admin-permission-button-add:hover{
            background-color: chartreuse;
        }
    </style>
</form>