<div id="orderdetail" style="display: <?php  if(isset($_GET['displayvalue']))
            {
                $displayValue=$_GET['displayvalue'];
            } echo $displayValue; ?>" >
       <div id="orderdetail-content">
        <a class="close" onclick="closeorderdetail()" href="?id=dh"><i class="far fa-window-close"></i><a>
            <div id="titleorderdetail">
                    <h1>Chi tiết đơn hàng</h1>
            </div>
            <div id="containerorderdetail">
            <h2>Thông tin khách hàng</h2>
            <!-- lấy thông tin khách hàng qua mã khách hàng -->
            <?php
            $conn = new Connect(); 
            if(isset($_GET['makh'])){
                $makh = $_GET['makh'];
            } 
            $result1 = $conn->selectsql("nguoidung","*","where manguoidung ='$makh'");  
            if ($result1->num_rows > 0) {
              // output data of each row
              while($row = $result1->fetch_assoc()) {           
            ?>
            <div id=titlemakhachhang >
                <label>Mã khách hàng : </label> <a> <?php echo $row['manguoidung'] ?> </a><br>
                <label> Tên khách hàng : </label> <a><?php echo $row['tennguoidung'] ?></a><br>
                <label> Số điện thoại :</label>  <a><?php echo $row['sodienthoai'] ?></a> <br>
                <label> Địa chỉ :</label>  <a><?php echo $row['diachi'] ?></a>
            </div> 
            <?php }}
             if(isset($_GET['manv'])){
                $manv = $_GET['manv'];
            } 
            $result2 = $conn->selectsql("nguoidung","*","where manguoidung ='$manv'");  
            if ($result2->num_rows > 0) {
              // output data of each row
              while($row = $result2->fetch_assoc()) {
             ?> 
            <h2>Nhân viên phụ trách</h2>
            <div id=titlemanhanvien>
                    <label>Mã nhân viên : </label> <a> <?php echo $row['manguoidung'] ?><br>
                    <label>Tên nhân viên:</label><a> <?php echo $row['tennguoidung'] ?>
            </div>  
            <?php }}
            $conn->closeConnect() ?>                 
                <h2>Sản phẩm đã đặt</h2>                
                <table id="orderdetailtable">
                <tr>
                    <th>Mã đơn hàng</th>
                    <th>Tên sản phâm</th>
                    <th>số lượng</th>
                    <th>Giá sản phẩm</th>
                    <th>Tổng giá tiền</th>
                    <th>Ghi chú</th>
              </tr>
                <?php 
            $conn=new Connect();
            if(isset($_GET['madh']))
            {
                $madh=$_GET['madh'];
            }
            $result1 = $conn->selectsql("chitietdonhang","*","where madonhang ='$madh'");  
            if ($result1->num_rows > 0) {
              // output data of each row
              while($row = $result1->fetch_assoc()) {
        ?>                
    <tr>
        <td><?php echo $row['madonhang'] ?></td>
        <td><?php $masp = $row['masanpham'] ;
        $resulttmp = $conn->selectsql("sanpham","tensanpham","where masanpham ='$masp'");  
        if ($resulttmp->num_rows > 0) {
          while($rowtmp = $resulttmp->fetch_assoc()) {
            echo $rowtmp['tensanpham'];
          }
        }
        ?></td>
        <td><?php echo $row['soluong'] ?></td>
        <td><?php echo money($row['giasanpham'])?></td>
        <td><?php echo money($row['soluong']*$row['giasanpham'])?></td>
        <td>
            <?php echo $row['ghichu'] ?>
            <?php
          ;
         ?>
         </td>     
    </tr>
    <?php
              }
            } 
            $conn->closeConnect();
    ?>
                </table>
                <div class="total">Tổng tiền: <span id="totalprice"><?php if(isset($_GET['tongtien'])) {$tongtien = $_GET['tongtien'];} ; echo money($tongtien)?>  VNĐ</span></div>
            </div>
    </div>
</div>
    <style>
    @media screen and (max-width: 1150px) {
        #orderdetail{
            width: 19%;
        }
        #orderdetail #orderdetail-content{
            width: 75%;
        }
    }

        /* chi tiết đơn hàng */
            #orderdetail{
                display: none;
                height: 100%;
                width: 100%;
                background-color: rgba(0,0,0,0.6);
                position: fixed;
                top:0;
                left: 0;
                z-index: 10;
            }
            #orderdetail #orderdetail-content{
                width: 80%;
                /* max-height: 600px; */
                text-align: center;
                background-color: #fff;
                margin: 10px auto 0 auto;
                padding-bottom: 20px;
                position: relative;
                overflow: scroll;
            }
            #orderdetail  #orderdetail-content .close{
                float: right; 
                border: 2px solid black;
                font-size: 30pt;
                background: none;
                border: none;
                cursor: pointer;
            }
            #orderdetail #orderdetail-content  #titleorderdetail{
                width: 50%;
                height: 40px;
                text-align: center;
                margin: 10px auto 0 auto;
                padding-bottom: 20px;
                position: relative;
                border-radius: 15px;
            }
        
            #orderdetail  #orderdetail-content  #titleorderdetail h1{
                display: inline-block;
                padding-bottom: 8px;
            }
            #orderdetail  #orderdetail-content  #containerorderdetail{
                margin: 30px auto;
                height: auto;
                width: 90%;
                border: 2px solid #000;
                padding: 20px;
            }
            #orderdetail #orderdetail-content #containerorderdetail #titlemanhanvien,#titlemakhachhang {
                width: auto;
                height:auto;
                text-align: left;
                font-size:20px;
                margin: 10px auto 10px 5px;
                padding-bottom: 5px;
                position: relative;
                border-radius: 15px  ;
            }
            #orderdetail #orderdetail-content #containerorderdetail h2{
                text-align: center;
                padding-bottom: 5px;
                padding-top: 5px;
            }
            #orderdetail #orderdetail-content #containerorderdetail #orderdetailtable{
                display: block;
                border-spacing: 0;
                width: 100%;
            }
        
            #orderdetail #orderdetail-content #containerorderdetail #orderdetailtable th, td{
                border-radius: 10px;
                border: solid 1px rgb(200, 200, 200);
            }

            #orderdetail #orderdetail-content #containerorderdetail #orderdetailtable{
                border-spacing: 0;
                width: 100%;
            }
            #orderdetail #orderdetail-content #containerorderdetail #orderdetailtable th,td .showorderdetail{
                width: 150px;
                text-align: center;
                color: black;
                border-bottom: 1px solid #000;
                padding: 10px;
                vertical-align: middle;
                text-decoration: none;
            }

            #orderdetail #orderdetail-content #containerorderdetail #orderdetailtable th, td{
                width: 150px;
                text-align: center;
                border-bottom: 1px solid #000;
                padding: 10px;
                vertical-align: middle;
            }
            #orderdetail #orderdetail-content #containerorderdetail .total{
                text-align: right;
                color: black;
                font-weight: bold;
                height: 50px;
                font-size: 12pt;
                margin-top: 20px;
            }
    </style>
<script src="https://kit.fontawesome.com/4a8ccdbc24.js" crossorigin="anonymous"></script>
<script>
    function closeorderdetail(){
        document.getElementById('orderdetail').style.display='none';
        }
</script>
<?php 
   function money($num) {
        return number_format($num, 0, '.', '.') . '';
        }
    
?>