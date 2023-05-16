<form class="admin-order">
    <div class="admin-order-title"><label style="font-size: 30px;">Quản lý đơn hàng</label></br>
    <!-- <div class="admin-order-search"><label>Tìm kiếm theo khoảng thời gian: </label><input type="date" id="datefrom"> - <input type="date" id="dateto">
    <label>Tình trạng: </label><select><option value="CXL">Chưa xử lý</option><option value="DXL">Đã xử lý</option></select> -->
    <div>
        <form  method="post">
            <div class="admin-order-search"><label>Tìm kiếm theo khoảng thời gian: </label><input type="date" id="datefrom" name="datefrom"> - <input type="date" id="dateto" name="dateto">
            <label>Tình trạng: </label><select><option value="CXL">Chưa xử lý</option><option value="DXL">Đã xử lý</option></select>
            <button style="padding-left: 5px; margin-left:10px ;" class="admin-search-tableorder">Tìm kiếm</button>
        </form>
    </div>
    </div>
    </div>
    

    <div class="admin-div-table-order" id="admin-div-table-order">
    <table class="admin-table-order" cellspacing="1px" cellpadding="5px" width="100%" height="100%">
        <tr>
            <th>Mã đơn hàng</th>
            <th>Thời gian đặt hàng</th>
            <th>Mã khách hàng</th>
            <th>Mã nhân viên</th>
            <th>Tổng giá tiền</th>
            <th>Tình trạng</th>
            <th></th>
        </tr>
       <?php 
            $con=new Connect();
            if(!isset($_POST["sotrang"])){
            $result=$con->selectsql("donhang","*","limit 0,5");
            if($result->num_rows>0){
                while($row=$result->fetch_assoc()){
                        echo "<tr>
                        <td>$row[madonhang]</td>
                        <td>$row[thoigiandat]</td>
                        <td>$row[makhachhang]</td>
                        <td>$row[manhanvien]</td>
                        <td>$row[tongtien]</td>
                        <td><select id='select_status_order' style='border :none ; font-size: large; appearance: none; -webkit-appearance: none; -moz-appearance: none; background-image: none;'> 
                        <option value='1' " . ($row['tinhtrang'] == 1 ? 'selected' : '') . ">Đã Xử Lý</option>
                        <option value='0' " . ($row['tinhtrang'] == 0 ? 'selected' : '') . ">Chưa xử lý</option>
                        </select></td>
                        <td> <a href='?id=dh&&displayvalue=block&&madh=$row[madonhang]&&makh=$row[makhachhang]&&manv=$row[manhanvien]&&tongtien=$row[tongtien]' class='showorderdetail' >Chi tiết</a> </td>
                    </tr>";
                }
            }
                $result=$con->selectsql("donhang");
                $sotrang=floor($result->num_rows/5)+1;
                //Các nút trang hóa đơn
                echo "</table></div><div class='admin-order-button-phantrang'>
                <ul>";
                for($i=1;$i<=$sotrang;$i++){
                    if($i==1){
                        echo "<li class='adminorder-button-phantrang' sotrang='$i' theloai='donhang'  style='background-color: gray;'>$i</li>";
                    }
                    else{
                        echo "<li class='adminorder-button-phantrang' sotrang='$i'  theloai='donhang'>$i</li>";
                    }
                }
                echo "</ul>";
            }
            $con->closeConnect();
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
        .admin-order-button-phantrang li{
            display: inline;
            border: solid black;
            padding: 5px 10px;
            margin: 10px;
        }
        .admin-order-button-phantrang ul{
            margin: 40px;
        }
    </style>    
</form>
