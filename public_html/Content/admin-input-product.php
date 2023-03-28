<form class="admin-input-product">
    <div class="admin-input-product-title"><label>Quản lý phiếu đặt hàng</label></br>
    <a href="admin.php?id=pdh&action=add" class="admin-input-product-button-add" style="text-decoration: none;">+ Thêm<a>
    </div>
    <div class="admin-div-table-input-product">
    <table class="admin-table-input-product" cellspacing="1px" cellpadding="5px" width="100%" height="100%">
        <tr>
            <th>Mã phiếu đặt hàng</th>
            <th>Thời gian đặt hàng</th>
            <th>Nhà cung cấp</th>
            <th>Tổng tiền</th>
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
            
            // $sql = "SELECT * FROM input-product";
            // $result = $conn->query($sql);
            
            // if ($result->num_rows > 0) {
            //   // output data of each row
            //   while($row = $result->fetch_assoc()) {
            //     echo '<tr>
            //         <td>'.$row["ID_input-product"].'</td>
            //         <td>'.$row["Username"].'</td>
            //         <td>'.$row["Password"].'</td>
            //         <td>'.$row["ID_Permission"].'</td>
            //         <td><input type="submit" value="Xóa" id="'.$row["ID_input-product"].'"></td>
            //     </tr>';
            //   }
            // } else {
            //   echo "0 results";

            // }
            // $conn->close();
        ?>
    </table>
    </div>
    <style>
        .admin-input-product-title{
            text-align: center;
            margin-bottom: 10px;
        }
        .admin-input-product-title label{
            font-size: 30px;
        }
        .admin-div-table-input-product{
            background-color:rgb(247,247,247); 
            margin-top:10px;
            border-radius: 10px;
        }
        .admin-table-input-product{
        text-align: center; 
        font-size: 16px;
        font-style: Times New Roman; 
        }
        .admin-table-input-product th,td{
            border-radius: 10px;
            border: solid 1px rgb(200, 200, 200);
        }
        .admin-input-product-button-add{
            margin-left: 90%;
            padding: 5px;
            font-size: 15px;
            color: white;
            background-color: blue;
            border: solid 1px black;
            border-radius: 10px;
        }
        .admin-input-product-button-add:hover{
            background-color: chartreuse;
        }
    </style>
</form>