<div id="input-product-add" style="display: <?php  if(isset($_GET['displayadd']))
            {
                $displayValue=$_GET['displayadd'];
            } echo $displayValue; ?>" >
   <div id="input-product-add-content">
   <a class="close" onclick="closeinputproduct()" href="?id=pdh"><i class="far fa-window-close"></i><a>
            <div id="titleinput-product-detail">
                    <h1>NHẬP HÀNG</h1>
            </div>
   <div id="containerinput-product-add">            
    <div id="textinput-product">
            <form id="form-add-input-product" action="" method="post">                
                <label for="maphieunhap">Mã phiếu nhập :</label> <input type="text" name="maphieunhap"> </br>
                <label for="manhanvien">Mã nhân viên :</label> <input readonly type="text" name="manhanvien" value="<?php
                session_start();
                echo  $_SESSION['idAccount'] ;
                ?>"></br>
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
                <label for="gianhap">Giá nhập</label><input type="text" name="gianhap"> <br>

                <button type="submit">Lưu </button>
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

        /* chi tiết đơn hàng */
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