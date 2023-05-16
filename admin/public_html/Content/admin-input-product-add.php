<?php if (session_status() == PHP_SESSION_NONE) {
    session_start();
}?>
<div id="input-product-add" style="display: <?php  if(isset($_GET['displayadd']))
            {
                $displayaddValue=$_GET['displayadd'];
            } echo $displayaddValue; ?>" >
   <div id="input-product-add-content">
   <a class="close" onclick="closeinputproduct();deleteallsanphamnhap()" href="?id=pdh"><i class="far fa-window-close"></i><a>
            <div id="titleinput-product-detail">
                    <h1>NHẬP HÀNG</h1>
            </div>
   <div id="containerinput-product-add">            
    <div id="textinput-product">
            <form id="form-add-input-product" action="" method="post">                
                <label for="maphieunhap">Mã phiếu nhập :</label> <input readonly type="text" name="maphieunhap" value="
                <?php
                $conn = new Connect();
                $result = $conn->selectsql("phieunhap");
                $maphieunhap = 1 ;  
                 if ($result->num_rows > 0) {
                   // output data of each row
                   while($row = $result->fetch_assoc()) {
                   $maphieunhap+=1 ;
                   }
                   echo $maphieunhap ;
                 }
                 $conn->closeConnect();
                ?>
                "> </br>
                <label for="manhanvien">Mã nhân viên : </label> <input readonly type="text" class="manhanvien" value="<?php
                echo $_SESSION['idAccount'] ;
                ?>"></br>
                <label for="nhacungcap">Nhà cung cấp : </label> <input type="text" name="nhacungcap" class="nhacungcap"><br>
                <label for="masanpham">Mã sản phẩm :</label>
                <select class="selectproduct" onchange="onchageSelectproduct()">
                    <option value="chonsanpham">Chọn sản phẩm</option>
                    <?php 
                    $conn = new Connect();
                    $result = $conn->selectsql("sanpham","*","ORDER BY masanpham");  
                     if ($result->num_rows > 0) {
                       // output data of each row
                       while($row = $result->fetch_assoc()) {
                        echo "<option value='$row[masanpham]'> $row[masanpham] </option>";
                       }
                     }
                     $conn->closeConnect();
                    ?>
                </select>
                <input id="inputtensanpham" type="text" placeholder="Tên sản phẩm "  style="font-size: small;"></br>
                <label for="soluong">Số lượng</label><button type="button" class="minus-btn" >-</button><input class="soluongsanpham" type="text" name="soluongsp" value="1" min="1" ><button type="button" class="plus-btn" >+</button><br>
                <label for="gianhap">Giá nhập</label><input type="text" name="gianhap" class="gianhap"> <br>
                <button type="button" class="themsanphamvaophieunhap" onclick="themsanphamnhap()">Thêm sản phẩm nhập</button>
                <div>
                    <h4>Danh sách sản phẩm nhập</h4>
                    <div class="admin-list-product-add" style=" max-height: 50% ;border:#000 1px ; display: flex; justify-content: center;
  align-items: center;">
                    <table id="table-sanphamnhap"></table>
                    </div>
                </div>
                <div id="titletongtien"><h2>Tổng tiền : <a id="tongtienphieunhap">0</a> VNĐ</h2></div>
                <button type="button" class="taophieunhap" onclick="taophieunhap()">Lưu phiếu nhập</button>
            </form>
            </div>
   </div>
     </div>
</div>
<script>
    let minusButton = document.querySelector(".minus-btn");
    let plusButton = document.querySelector(".plus-btn");
    let inputField = document.querySelector(".soluongsanpham");
    minusButton.addEventListener("click", function() {
        if (inputField.value > 1) {
    inputField.value = parseInt(inputField.value) - 1;
    }
    });
    plusButton.addEventListener("click", function() {
    inputField.value = parseInt(inputField.value) + 1;
    });
    // select id trả về name //
    function onchageSelectproduct(){
        let selectElement = document.querySelector(".selectproduct");
        let inputElement = document.getElementById('inputtensanpham');    

        $.ajax({
            url: 'Content/chonsanphamphieunhap.php',
            type: 'POST',
            data:{
               select_masanpham:selectElement.value
                },
                success: function(result){
                    var result=$.parseJSON(result)
                    str=''
                    for(key in result){
                        str+=`${result[key]['tensanpham']}`
                    }
                    inputElement.value=str;
                }  
            }
        ) 
           
    }
    function currency(num) {
    return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.') ;
    }
    function themsanphamnhap(){
        let selectElement = document.querySelector(".selectproduct");
        let soluongsanpham = document.querySelector(".soluongsanpham");
        let gianhap = document.querySelector(".gianhap");
        // var tongtien= parseInt(soluongsanpham)*parseInt(gianhap) ;
        var totalprice=0;
        const tableContainer = document.querySelector('.table-admin-list-product-add');
        const tempTable = JSON.parse(localStorage.getItem('tempTable')) || [];       
        tempTable.push({masanpham:selectElement.value, soluongsanpham:soluongsanpham.value, gianhap:gianhap.value});
        localStorage.setItem('tempTable',JSON.stringify(tempTable));
        console.log(JSON.parse(localStorage.getItem('tempTable')));
        // hiển thị //
        var s='<tr><th>Sản phẩm</th><th>Số lượng</th><th>Giá nhập</th><th>Tổng</th></tr>';
		for (var i = 0; i < tempTable.length; i++){
			s+=  '<tr>'+
					'<td>'+	tempTable[i].masanpham+'</td>'+
					'<td>'+tempTable[i].soluongsanpham+'</td>'+
					'<td>'+tempTable[i].gianhap+'</td>'+
					'<td>'+tempTable[i].soluongsanpham*tempTable[i].gianhap+'</td>'+
					'<td><a href="#" onclick="deletesanphamnhap(this,'+tempTable[i].masanpham+')"><i class="far fa-trash-alt"></i></a></td>'+
				'</tr>';
        totalprice += tempTable[i].soluongsanpham*tempTable[i].gianhap;
		}
		document.getElementById('table-sanphamnhap').innerHTML=s;
        document.getElementById('tongtienphieunhap').innerHTML = currency(totalprice) ;
        }
        function deletesanphamnhap(link,id){
            // Tìm thẻ td liên quan đến thẻ a được nhấp
             let row = link.closest('tr');
            // Xóa hàng đó khỏi bảng
            row.remove();
            var Array = JSON.parse(localStorage.getItem('tempTable'));
            for (var i = 0; i < Array.length; i++) {
                if(Array[i].masanpham==id){
                    Array.splice(i, 1);
                }
            }
	    localStorage.setItem('tempTable',JSON.stringify(Array));
        }
        function deleteallsanphamnhap(){
            localStorage.removeItem('tempTable');
        }
        // viết ajax xử lý thêm phiếu nhập//
        function taophieunhap(){
            var currentDate = new Date();
            var formattedDate = currentDate.toString().substring(0, 10);
            var maphieunhap = document.querySelector(".maphieunhap");
            var manhanvien = document.querySelector(".manhanvien");
            var tongtientmp = document.getElementById('tongtienphieunhap');
            var tongtien = tongtientmp.textContent ;
            var nhacungcap = document.querySelector(".nhacungcap");
            const tempTable = JSON.parse(localStorage.getItem('tempTable')) || [];     
            $.ajax({
            url: 'Content/xulythemphieunhap.php',
            type: 'POST',
            data:{
                date : formattedDate ,
                manhanvien :manhanvien,
                maphieunhap :maphieunhap,
                tongtien :tongtien ,
                nhacungcap:nhacungcap,
                datachitiet : JSON.stringify(tempTable)
                },
                success: function(result){
                    
                   alert("Thêm thành công");
                }  
            }
        ) 

        }
</script>
<style>
        @media screen and (max-width: 1150px) {
                #input-product-add{
                    width: 19%;
                }
                #input-product-add #input-product-add-content{
            width: 75%;
        }
            }

            #input-product-add{
                display:none;
                height: 100%;
                width: 100%;
                background-color: rgba(0,0,0,0.6);
                position: fixed;
                top:0;
                left: 0;
                z-index: 10;
            }    
            #input-product-add #input-product-add-content{
                width: 40%;
                /* max-height: 600px; */
                text-align: center;
                background-color: #fff;
                margin: 10px auto 0 auto;
                padding-bottom: 20px;
                position: relative;
                overflow: scroll;
            }
            #input-product-add  #input-product-add-content .close{
                float: right; 
                border: 2px solid black;
                font-size: 30pt;
                background: none;
                border: none;
                cursor: pointer;
            }
            
            #input-product-add  #input-product-add-content  #titleinput-product-add h1{
                display: inline-block;
                padding-bottom: 8px;
            }
            #input-product-add  #input-product-add-content #textinput-product label{
                float: left; 
                font-weight: bold;
                font-size: 14pt;
                margin-left: 50px;
                cursor: pointer;  
            }
            #input-product-add  #input-product-add-content #textinput-product input, select{ 
                display: inline-block;
                border-bottom: 1px solid #ccc;
                margin: 5px 0 5px 10px;
                padding-left: 5px;
                height: 30px;
                line-height: 40px;
                font-size: 14pt;
                text-align: center;
                /* outline: none; */
            }
            #input-product-add  #input-product-add-content #textinput-product .soluongsanpham {
                font-size: 16pt;
                width: 80px;
                height: 40px;
                padding: 5px;
                border: 2px solid #000;
                margin: 10px 0 30px;
                text-align: center; 
             }
             #input-product-add  #input-product-add-content #textinput-product .minus-btn ,.plus-btn {
                font-size: 16pt;
                width: 40px;
                height: 40px;
                padding: 5px;
                border: 2px solid #000;
                margin: 10px 0 30px;
                text-align: center; 
             }
</style>