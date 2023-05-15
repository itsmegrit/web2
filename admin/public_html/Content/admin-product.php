<div class="admin-product">
    <div class="admin-product-title"><label>Quản lý sản phẩm</label></br>
    <a href="admin.php?id=sp&action=add" class="admin-product-button-add" style="text-decoration: none;">+ Thêm<a>
    </div>
    <?php 
           include '..\\config/Connect.php';
           include 'admin-product-handle.php';
    ?>
    <div class="admin-div-table-product" id="admin-div-table-product">
        <input type="hidden" name="id" value="sp">
    <table class="admin-table-product" id="admin-table-product" cellspacing="1px" cellpadding="5px" width="100%" height="100%">
        <tr>
            <th>Mã sản phẩm</th>
            <th>Tên sản phẩm</th>
            <th>Hình ảnh</th>
            <th>Giá tiền</th>
            <th>Chức năng</th>
        </tr>
       <?php 
       $con=new Connect();
       if(!isset($_POST["sotrang"])){
        $result=$con->selectsql("sanpham","*","where tinhtrang=1 limit 0,5");
        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
                    echo "<tr>
                    <td>$row[masanpham]</td>
                    <td>$row[tensanpham]</td>
                    <td><img src='../../PictureProduct/$row[hinhanh1]'></td>";
                    $giaban=number_format($row['giaban'],0,',',',');
                    echo"
                    <td>$giaban VNĐ</td>
                    <td><form action='admin.php' method='GET' onsubmit='return Del()'><input type='submit' class='admin-product-del' name='function' value='Xóa'>
                    <a href='admin.php?id=sp&&action=edit&&idproduct=$row[masanpham]' class='admin-product-Edit' style='text-decoration: none;'>Sửa</a> 
                    <input type='hidden' name='id' value='sp'>
                    <input type='hidden' name='idproduct' value='$row[masanpham]'>  
                    </form>
                    </td>
                </tr>";
            }
        }
            $result=$con->selectsql("sanpham");
            $sotrang=floor($result->num_rows/5)+1;
            //Các nút trang sản phẩm
            echo "</table></div><div class='admin-product-button-phantrang'>
            <ul>";
            for($i=1;$i<=$sotrang;$i++){
                if($i==1){
                    echo "<li class='adminproduct-button-phantrang' sotrang='$i' theloai='sanpham'  style='background-color: gray;'>$i</li>";
                }
                else{
                    echo "<li class='adminproduct-button-phantrang' sotrang='$i'  theloai='sanpham'>$i</li>";
                }
            }
            echo "</ul>";
    }
    $con->closeConnect();
            // include '..\\config/Connect.php';
            // include 'admin-product-handle.php';
            // // Create connection
            // $conn =new Connect();
            // // Check connection      
            // $result = $conn->selectsql("Product");
            // if ($result->num_rows > 0) {
            //   // output data of each row
            //   while($row = $result->fetch_assoc()) {
            //     // if($row["tinhtrang"]==1){
            //     echo "<tr>
            //         <td>$row[mansanpham]</td>
            //         <td>$row[tensanpham]</td>
            //         <td><img src='$row[hinhanh1]'></td>
            //         <td>$row[giasanpham]</td>
            //         <td><form action='admin.php' method='GET' onsubmit='return Del()'><input type='submit' class='admin-product-del' name='function' value='Xóa'>
            //         <a href='admin.php?id=sp&&action=edit&&idproduct=$row[ID]' class='admin-product-Edit' style='text-decoration: none;'>Sửa<a> 
            //         <input type='hidden' name='id' value='sp'>
            //         <input type='hidden' name='idproduct' value='$row[masanpham]'>  
            //         </td>
            //     </tr>";
            //     // }
            //   }
            // }
            // $conn->closeConnect();
        ?>
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
        .admin-product-button-phantrang li{
            display: inline;
            border: solid black;
            padding: 5px 10px;
            margin: 10px;
        }
        .admin-product-button-phantrang ul{
            margin: 40px;
        }
        .admin-table-product{
        text-align: center; 
        font-size: 16px;

        }
        .admin-table-product th,td{
            border-radius: 10px;
            border: solid 1px rgb(200, 200, 200);
        }
        .admin-div-table-product img{
            width: 40px;
            height: 30px;
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