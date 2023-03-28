<form class="admin-order">
    <div class="admin-order-title"><label style="font-size: 30px;">Quản lý đơn hàng</label></br>
    <div class="admin-order-search"><label>Tìm kiếm theo khoảng thời gian: </label><input type="date"> - <input type="date">
    <label>Tình trạng: </label><select><option value="CXL">Chưa xử lý</option><option value="DXL">Đã xử lý</option></select>
    </div>
    </div>
    <div class="admin-div-table-order">
    <table class="admin-table-order" cellspacing="1px" cellpadding="5px" width="100%" height="100%">
        <tr>
            <th>Mã đơn hàng</th>
            <th>Thời gian đặt hàng</th>
            <th>Tổng giá tiền</th>
            <th>Địa chỉ giao</th>
            <th>Tình trạng</th>
        </tr>
       <?php 
/*            $servername = "localhost";
            $username = "QLBH";
            $password = "123456";
            $dbname = "web2";
            
            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
            }
            
            $sql = "SELECT * FROM order";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>$row[ID_order]</td>
                    <td>$row[Username]</td>
                    <td>$row[Password]</td>
                    <td>$row[Permission]</td>
                    <td><input type='submit' value='Xóa' id='$row[ID_order]'></td>
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
        .admin-order-title{
            text-align: center;
            margin-bottom: 10px;
        }
        .admin-div-table-order{
            background-color:rgb(247,247,247); 
            margin-top:10px;
        }
        .admin-order-search{
            text-align: left;
        }
        .admin-order-search label{
            font-size: 20px;
        }
        .admin-table-order{
        text-align: center; 
        font-size: 16px;
        font-style: Times New Roman; 
        border-color: rgb(212, 212, 212);
        border-radius: 10px;
        }
        .admin-table-order th,td{
            border-radius: 10px;
            border: solid 1px rgb(200, 200, 200);
        }
    </style>
</form>