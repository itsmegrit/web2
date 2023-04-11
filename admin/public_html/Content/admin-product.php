<div class="admin-product">
    <div class="admin-product-title"><label>Quản lý sản phẩm</label></br>
    <a href="admin.php?id=sp&action=add" class="admin-product-button-add" style="text-decoration: none;">+ Thêm<a>
    </div>
    <div class="admin-div-table-product">
        <input type="hidden" name="id" value="sp">
    <table class="admin-table-product" cellspacing="1px" cellpadding="5px" width="100%" height="100%">
        <tr>
            <th>Mã sản phẩm</th>
            <th>Tên sản phẩm</th>
            <th>Giá tiền</th>
            <th>Nổi bật</th>
            <th>Chức năng</th>
        </tr>
       <?php 
            // include '..\\config/Connect.php';
            // include 'admin-product-del.php';
            // // Create connection
            // $conn =new Connect();
            // // Check connection      
            // $result = $conn->selectsql("Product");
            // if ($result->num_rows > 0) {
            //   // output data of each row
            //   while($row = $result->fetch_assoc()) {
            //     // if($row["tinhtrang"]==1){
            //     echo "<tr>
            //         <td>$row[ID]</td>
            //         <td>$row[Name]</td>
            //         <td>$row[Price]</td>
            //         <td>$row[ID_Category]</td>
            //         <td><form action='admin.php' method='GET' onsubmit='return Del()'><input type='submit' class='admin-product-del' name='function' value='Xóa'>
            //         <a href='admin.php?id=sp&&action=edit&&idproduct=$row[ID]' class='admin-product-Edit' style='text-decoration: none;'>Sửa<a> 
            //         <input type='hidden' name='id' value='sp'>
            //         </td>
            //     </tr>";
            //     // }
            //   }
            // }
            // $conn->closeConnect();
        ?>
    </table>
    </div>
    <script>
        function Del(){
            Chosse=confirm("Bạn chắc chắn xóa sản phẩm này ?")
            if(Chosse){
                return true
            }
            return false
        }
    </script>
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
        .admin-product-Edit{
            padding: 3px 10px;
            font-size: 15px;
            color: black;
            background-color: aqua;
            border-radius: 5px;
            border: solid 1px black;
        }
        .admin-product-Edit:hover{
            background-color: blue;
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
        .admin-product-del{
            padding: 3px 10px;
            background-color: red;
            color: white;
            border: solid 1px black;
            border-radius: 5px;
        }
        .admin-product-del:hover{
            background-color: brown;
        }
        @media screen and (max-width: 1150px) {
            .admin-product-button-add{
                margin-left: 70%;
            }
}
    </style>
</div>