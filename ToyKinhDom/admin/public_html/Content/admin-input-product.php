<form class="admin-input-product">
    <div class="admin-input-product-title"><label>Quản lý phiếu nhập</label></br>
    <a href="admin.php?id=pdh&action=add&&displayadd=block" class="admin-input-product-button-add" style="text-decoration: none;">+ Thêm<a>
    </div>
      
    <?php 
            include '/xampp/htdocs/web2/ToyKinhDom/config/Connection.php';  
            include '/xampp/htdocs/web2/ToyKinhDom/admin/public_html/Content/admin-input-product-details.php';
            include '/xampp/htdocs/web2/ToyKinhDom/admin/public_html/Content/admin-input-product-add.php'
    ?>
    <div class="admin-div-table-input-product" id="admin-div-table-input-product">
    <table class="admin-table-input-product" cellspacing="1px" cellpadding="5px" width="100%" height="100%">
        <tr>
            <th>Mã phiếu nhập</th>
            <th>Ngày lập</th>
            <th>Nhà cung cấp</th>
            <th>Mã nhân viên</th>
            <th>Tổng tiền</th>
        </tr>
       <?php 
              $con=new Connect();
              if(!isset($_POST["sotrang"])){
              $result=$con->selectsql("phieunhap","*","limit 0,5");
              if($result->num_rows>0){
                  while($row=$result->fetch_assoc()){
                          echo "<tr>
                          <td>$row[maphieunhap]</td>
                          <td>$row[ngaylap]</td>
                          <td>$row[nhacungcap]</td>
                          <td>$row[manhanvien]</td>
                          <td>$row[tongtien]</td>                          
                          <td> <a href='?id=pdh&&displayvalue=block&&mapnh=$row[maphieunhap]&&manv=$row[manhanvien]&&tongtien=$row[tongtien]' class='showdetail' >Chi tiết</a> </td>
                      </tr>";
                  }
              }
                  $result=$con->selectsql("phieunhap");
                  $sotrang=floor($result->num_rows/5)+1;
                  //Các nút trang hóa đơn
                  echo "</table></div><div class='admin-phieunhap-button-phantrang'>
                  <ul>";
                  for($i=1;$i<=$sotrang;$i++){
                      if($i==1){
                          echo "<li class='adminphieunhap-button-phantrang' sotrang='$i' theloai='donhang'  style='background-color: gray;'>$i</li>";
                      }
                      else{
                          echo "<li class='adminphieunhap-button-phantrang' sotrang='$i'  theloai='donhang'>$i</li>";
                      }
                  }
                  echo "</ul>";
              }
              $con->closeConnect();
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
        .admin-phieunhap-button-phantrang li{
            display: inline;
            border: solid black;
            padding: 5px 10px;
            margin: 10px;
        }
        .admin-phieunhap-button-phantrang ul{
            margin: 40px;
        }
    </style>
    
</form>