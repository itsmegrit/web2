<div class="admin-permission">
    <div class="admin-permission-title"><label>Quản lý quyền</label></br>
    <a href="admin.php?id=q&action=add" class="admin-permission-button-add" style="text-decoration: none;">+ Thêm<a>
    </div>
    <div class="admin-div-table-permission">
    <table class="admin-table-permission" cellspacing="1px" cellpadding="5px" width="100%" height="100%">
        <tr>
            <th>Mã quyền</th>
            <th>Tên quyền</th>
            <th>Chức năng</th>
        </tr>
       <?php 
       include 'admin-permission-del.php';
       include 'admin-permission-handle.php';
       $conn=new Connect();
        $result = $conn->selectsql("quyen","*","where tinhtrang=1");
            if ($result->num_rows > 0) {
              // output data of each row
              while($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>$row[maquyen]</td>
                    <td>$row[tenquyen]</td>
                    <td><form action='admin.php' method='GET' onsubmit='return DelPer()'>
                    <input type='hidden' name='id' value='q'>
                    <input type='hidden' name='idpermission' value='$row[maquyen]'>";
                if($row["maquyen"]=="001"){
                    echo "
                    </form>
                    </td>
                </tr>";
                }
                else{
                echo "<input type='submit' value='Xóa' class='admin-permission-del' name='function'>
                    <a href='admin.php?id=q&&action=edit&&idpermission=$row[maquyen]' class='admin-permission-Edit' style='text-decoration: none;'>Sửa<a>
                    </form>
                    </td>
                </tr>";
              }
            }
            } 
            $conn->closeConnect();
        ?>
    </table>
    </div>
    <script>
            function DelPer(){
            Chosse=confirm("Bạn chắc chắn xóa quyền này (có khả năng tài khoản thuộc quyền này cũng sẽ bị xóa) ?")
            if(Chosse){
                return true
            }
            return false
        }
    </script>
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
        .admin-permission-del{
            padding: 3px 10px;
            background-color: red;
            color: white;
            border: solid 1px black;
            border-radius: 5px;
        }
        .admin-permission-del:hover{
            background-color: brown;
        }
        .admin-permission-Edit{
            padding: 3px 10px;
            font-size: 15px;
            color: black;
            background-color: aqua;
            border-radius: 5px;
            border: solid 1px black;
        }
        .admin-permission-Edit:hover{
            background-color: blue;
        }
    </style>
</div>