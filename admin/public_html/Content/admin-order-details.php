<form class="admin-order">
    <div class="admin-order-title"><label>Chi tiết đơn hàng</label></br>
    </div>
    <div class="admin-div-table-order">
    <div>Mã đơn hàng: </div>
    <div>Tên khách hàng: </div>
    <table class="admin-table-order" cellspacing="1px" cellpadding="5px" width="100%" height="100%">
        <tr>
            <th>Mã sản phẩm</th>
            <th>Tên sản phẩm</th>
            <th>Giá tiền</th>
            <th>Số lượng</th>
        </tr>
        <tr>
            <td>1</td>
            <td>Lego</td>
            <td>100000</td>
            <td>1</td>
        </tr>
       <?php 
            // $servername = "localhost";
            // $username = "QLBH";
            // $password = "123456";
            // $dbname = "web2";
            
            // // Create connection
            // $conn = new mysqli($servername, $username, $password, $dbname);
            // // Check connection
            // if ($conn->connect_error) {
            //   die("Connection failed: " . $conn->connect_error);
            // }
            
            // $sql = "SELECT * FROM order";
            // $result = $conn->query($sql);
            
            // if ($result->num_rows > 0) {
            //   // output data of each row
            //   while($row = $result->fetch_assoc()) {
            //     echo '<tr>
            //         <td>'.$row["ID_order"].'</td>
            //         <td>'.$row["Username"].'</td>
            //         <td>'.$row["Password"].'</td>
            //         <td>'.$row["ID_Permission"].'</td>
            //         <td><input type="submit" value="Xóa" id="'.$row["ID_order"].'"></td>
            //     </tr>';
            //   }
            // } else {
            //   echo "0 results";

            // }
            // $conn->close();
        ?>
    </table>
    <div>Tổng tiền:</div>
    <div>Tình trạng</div>
    </div>
    <style>
        .admin-order-title{
            text-align: center;
            margin-bottom: 10px;
        }
        .admin-order-title label{
            font-size: 30px;
        }
        .admin-div-table-order{
            background-color:rgb(247,247,247); 
            margin-top:10px;
            border-radius: 10px;
        }
        .admin-table-order{
        text-align: center; 
        font-size: 16px;
        font-style: Times New Roman; 
        }
        .admin-table-order th,td{
            border-radius: 10px;
            border: solid 1px rgb(200, 200, 200);
        }
    </style>
</form>