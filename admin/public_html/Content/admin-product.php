<form class="admin-product">
    <div class="admin-product-title"><label>Quản lý sản phẩm</label></br>
    <a href="admin.php?id=sp&action=add" class="admin-product-button-add" style="text-decoration: none;">+ Thêm<a>
    </div>
    <div class="admin-div-table-product">
    <table class="admin-table-product" cellspacing="1px" cellpadding="5px" width="100%" height="100%">
        <tr>
            <th>Mã sản phẩm</th>
            <th>Tên sản phẩm</th>
            <th>Giá tiền</th>
            <th>Nổi bật</th>
            <th>Chức năng</th>
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
            
            $sql = "SELECT * FROM Product";
            $result = $conn->query($sql);
            
            if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>$row[ID_Product]</td>
                    <td>$row[ProductName]</td>
                    <td>$row[ProductPrice]</td>
                    <td>$row[Product]</td>
                    <td><input type='submit' value='Thêm'></td>
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
        .admin-product-title{
            text-align: center;
            margin-bottom: 10px;
        }
        .admin-product-title label{
            font-size: 30px;
        }
        .admin-div-table-product{
            background-color:rgb(247,247,247); 
            margin-top:10px;
        }
        .admin-table-product{
        text-align: center; 
        font-size: 16px;
        font-style: Times New Roman; 
        }
        .admin-table-product th,td{
            border-radius: 10px;
            border: solid 1px rgb(200, 200, 200);
        }
        .admin-product-button-add{
            margin-left: 90%;
            padding: 5px;
            font-size: 15px;
            color: white;
            background-color: blue;
            border-radius: 10px;
        }
        .admin-product-button-add:hover{
            background-color: chartreuse;
        }
    </style>
</form>