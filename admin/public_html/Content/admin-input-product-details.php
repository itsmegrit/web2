<div id="input-product-detail" style="display: <?php  if(isset($_GET['displaydetailpnh']))
            {
                $displaydetailValue=$_GET['displaydetailpnh'];
            } echo $displaydetailValue; ?>" >
            <div id="input-product-detail-content">
            <a class="close" onclick="closeinputproduct()" href="?id=pdh"><i class="far fa-window-close"></i><a>
            <div id="titleinput-product-detail">
                    <h1>Chi tiết phiếu nhập</h1>
            </div>
            <div id="containerinput-product-detail">           
            <?php 
             $conn = new Connect(); 
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
                <h2>Sản phẩm đã nhập</h2>                
                <table id="input-product-detailtable">
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>số lượng</th>
                    <th>Giá nhập</th>
                    <th>Tổng giá tiền</th>
              </tr>
                <?php 
            $conn=new Connect();
            if(isset($_GET['mapnh']))
            {
                $mapnh=$_GET['mapnh'];
            }
            $result1 = $conn->selectsql("chitietphieunhap","*","where maphieunhap ='$mapnh'");  
            if ($result1->num_rows > 0) {
              // output data of each row
              while($row = $result1->fetch_assoc()) {
        ?>                
    <tr>
        <td><?php $masp = $row['masanpham'] ;
        $resulttmp = $conn->selectsql("sanpham","tensanpham","where masanpham ='$masp'");  
        if ($resulttmp->num_rows > 0) {
          while($rowtmp = $resulttmp->fetch_assoc()) {
            echo $rowtmp['tensanpham'];
          }
        }
        ?></td>
        <td><?php echo $row['soluong'] ?></td>
        <td><?php echo money($row['gianhap'])?></td>
        <td><?php echo money($row['soluong']*$row['gianhap'])?></td>
        <?php
          ;
         ?>   
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
        #input-product-detail{
            width: 19%;
        }
        #input-product-detail #input-product-detail-content{
            width: 75%;
        }
    }

        /* chi tiết đơn hàng */
            #input-product-detail{
                display: none;
                height: 100%;
                width: 100%;
                background-color: rgba(0,0,0,0.6);
                position: fixed;
                top:0;
                left: 0;
                z-index: 10;
            }
            #input-product-detail #input-product-detail-content{
                width: 80%;
                /* max-height: 600px; */
                text-align: center;
                background-color: #fff;
                margin: 10px auto 0 auto;
                padding-bottom: 20px;
                position: relative;
                overflow: scroll;
            }
            #input-product-detail  #input-product-detail-content .close{
                float: right; 
                border: 2px solid black;
                font-size: 30pt;
                background: none;
                border: none;
                cursor: pointer;
            }
            #input-product-detail #input-product-detail-content  #titleinput-product-detail{
                width: 50%;
                height: 40px;
                text-align: center;
                margin: 10px auto 0 auto;
                padding-bottom: 20px;
                position: relative;
                border-radius: 15px;
            }
        
            #input-product-detail  #input-product-detail-content  #titleinput-product-detail h1{
                display: inline-block;
                padding-bottom: 8px;
            }
            #input-product-detail  #input-product-detail-content  #containerinput-product-detail{
                margin: 30px auto;
                height: auto;
                width: 90%;
                border: 2px solid #000;
                padding: 20px;                
            }
            #input-product-detail #input-product-detail-content #containerinput-product-detail #titlemanhanvien,#titlemakhachhang {
                width: auto;
                height:auto;
                text-align: left;
                font-size:20px;
                margin: 10px auto 10px 5px;
                padding-bottom: 5px;
                position: relative;
                border-radius: 15px  ;
            }
            #input-product-detail #input-product-detail-content #containerinput-product-detail h2{
                text-align: center;
                padding-bottom: 5px;
                padding-top: 5px;
            }
            #input-product-detail #input-product-detail-content #containerinput-product-detail #input-product-detailtable{
                /* display: block; */
                border-spacing: 0;
                width: 100%;
                display: flex;
                justify-content: center;
                align-items: center;
            }
        
            #input-product-detail #input-product-detail-content #containerinput-product-detail #input-product-detailtable th, td{
                border-radius: 10px;
                border: solid 1px rgb(200, 200, 200);
            }

            #input-product-detail #input-product-detail-content #containerinput-product-detail #input-product-detailtable{
                border-spacing: 0;
                width: 100%;
            }
            #input-product-detail #input-product-detail-content #containerinput-product-detail #input-product-detailtable th,td .showinput-product-detail{
                width: 150px;
                text-align: center;
                color: black;
                border-bottom: 1px solid #000;
                padding: 10px;
                vertical-align: middle;
                text-decoration: none;
            }

            #input-product-detail #input-product-detail-content #containerinput-product-detail #input-product-detailtable th, td{
                width: 150px;
                text-align: center;
                border-bottom: 1px solid #000;
                padding: 10px;
                vertical-align: middle;
            }
            #input-product-detail #input-product-detail-content #containerinput-product-detail .total{
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
    function closeinputproduct(){
        document.getElementById('input-product-detail').style.display='none';
        }
</script>
<?php 
   function money($num) {
        return number_format($num, 0, '.', '.') . '';
        }
    
?>