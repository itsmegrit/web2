<div class="admin-thongke">
    <div class="admin-thongke-title"><label style="font-size: 30px;">Thống kê</label></br>
    <form method="POST" action="admin.php?id=thk" onsubmit="return checkThongke()" name="adminthongkeform" >
    <div class="admin-thongke-search"><label>Thống kê theo khoảng thời gian: </label>
        <input type="date" name="thongkestart"> - <input type="date" name="thongkeend">
        <select name="Category">
            <option selected value="0">Tất cả</option>
    <?php 
        $con=new Connect();
        $result=$con->selectsql("theloai");
        if($result->num_rows>0){
            while($row=$result->fetch_assoc()){
                echo "<option value='$row[matheloai]'>$row[tentheloai]</option>";
            }
        }
        $con->closeConnect();
    ?>
        </select>
    <input type="submit" class="admin-thongke-button" name="admin-thongke-button" value="Thống kê">
    </div>
</form>
    </div>
    <?php
    include 'admin-xulythongke.php';
    ?>
    <style>
        .admin-thongke-title{
            text-align: center;
            margin-bottom: 10px;
        }
        .admin-div-table-thongke{
            background-color:rgb(247,247,247); 
            margin-top:10px;
        }
        .admin-table-thongke{
        text-align: center; 
        font-size: 16px;
        }
        .admin-table-thongke th,td{
            border-radius: 10px;
            border: solid 1px rgb(200, 200, 200);
        }
        .admin-thongke-search{
            text-align: left;
        }
        .admin-thongke-search label{
            font-size: 20px;
        }
        .admin-thongke-search li{
            display: inline;
        }
        .admin-table-thongke{
        text-align: center; 
        font-size: 16px;
        font-style: Times New Roman; 
        border-color: rgb(212, 212, 212);
        border-radius: 10px;
        }
        .admin-table-thongke th,td{
            border-radius: 10px;
            border: solid 1px rgb(200, 200, 200);
        }
    </style>
    <script>
        function checkThongke(){
            var start=document.adminthongkeform.thongkestart
            var end=document.adminthongkeform.thongkeend
            if(!start.value){
                alert("Hãy chọn ngày bắt đầu thống kê")
                return false
            }
            if(!endv.value){
                alert("Hãy chọn ngày kết thúc thống kê")
                return false
            }
            if(start.value > end.value){
                alert("Ngày bắt đầu trước ngày kết thúc")
                return false
            }
            return true
        }
    </script>
</div>
