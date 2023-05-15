$(".adminproduct-button-phantrang").click(function(){
    var list=document.querySelectorAll(".adminproduct-button-phantrang")
    for(let i=0; i<list.length;i++){
        list[i].style="background-color: white;"
    }
    this.style="background-color: gray;"
    $.ajax({
        url: 'Content/admin-xulyphantrang.php',
        type: 'POST',
        data:{
            sotrang: this.getAttribute("sotrang")
        },
        success: function(result){
            var result=$.parseJSON(result)
            var str=`<input type="hidden" name="id" value="sp">
            <table class="admin-table-product" id="admin-table-product" cellspacing="1px" cellpadding="5px" width="100%" height="100%">
                <tr>
                    <th>Mã sản phẩm</th>
                    <th>Tên sản phẩm</th>
                    <th>Hình ảnh</th>
                    <th>Giá tiền</th>
                    <th>Chức năng</th>
                </tr>`;
            for(key in result){
                str+=`<tr>
                <td>${result[key]['masanpham']}</td>
                <td>${result[key]['tensanpham']}</td>
                <td><img src='../../PictureProduct/${result[key]['hinhanh1']}'></td>
                <td>${result[key]['giaban']}</td>
                <td><form action='admin.php' method='GET' onsubmit='return Del()'><input type='submit' class='admin-product-del' name='function' value='Xóa'>
                    <a href='admin.php?id=sp&&action=edit&&idproduct=${result[key]['masanpham']}' class='admin-product-Edit' style='text-decoration: none;'>Sửa<a> 
                    <input type='hidden' name='id' value='sp'>
                    <input type='hidden' name='idproduct' value='${result[key]['masanpham']}'>  
                </td>
            </tr>
        `
            }
            str=str+'</table>'
            document.getElementById('admin-div-table-product').innerHTML=str
                //Innerhtml bảng sản phẩm
                // $('admin-table-product').innerhtml=`<tr>
                //         <td>${product.masanpham}</td>
                //         <td>${product.tensanpham}</td>
                //         <td><img src='${product.hinhanh1}'></td>
                //         <td>${product.giaban}</td>
                //         <td><form action='admin.php' method='GET' onsubmit='return Del()'><input type='submit' class='admin-product-del' name='function' value='Xóa'>
                //             <a href='admin.php?id=sp&&action=edit&&idproduct=${product.masanpham}' class='admin-product-Edit' style='text-decoration: none;'>Sửa<a> 
                //             <input type='hidden' name='id' value='sp'>
                //             <input type='hidden' name='idproduct' value='${product.masanpham}'>  
                //         </td>
                //     </tr>
                // `
        },
        error: function(e){
            console.log(e)
        }
    })
})
$(".adminorder-button-phantrang").click(function(){
    var list=document.querySelectorAll(".adminorder-button-phantrang")
    for(let i=0; i<list.length;i++){
        list[i].style="background-color: white;"
    }
    this.style="background-color: gray;"
    $.ajax({
        url: './Content/admin-xulyphantrangdonhang.php',
        type: 'POST',
        data:{
            sotrang: this.getAttribute("sotrang"),
        },
        success: function(result){
            var result=$.parseJSON(result)
           console.log(result)
            var str=`<table class="admin-table-order" cellspacing="1px" cellpadding="5px" width="100%" height="100%">
            <tr>
                <th>Mã đơn hàng</th>
                <th>Thời gian đặt hàng</th>
                <th>Mã khách hàng</th>
                <th>Mã nhân viên</th>
                <th>Tổng giá tiền</th>
                <th>Tình trạng</th>
                <th></th>
            </tr>`;
            for(key in result){
                str+=`<tr>
                <td>${result[key]['madonhang']}</td>
                <td>${result[key]['thoigiandat']}</td>
                <td>${result[key]['makhachhang']}</td>
                <td>${result[key]['manhanvien']}</td>
                <td>${result[key]['tongtien']}</td>
                <td><select id='select_status_order' style='border :none ; font-size: large; appearance: none; -webkit-appearance: none; -moz-appearance: none; background-image: none;'> 
                `
                if(result[key]['tinhtrang'] == '1')
                 {str+= '<option  selected >Đã Xử Lý</option><option>Chưa xử lý</option>' };
                if(result[key]['tinhtrang'] == '0' )
                {str+= '<option selected >Chưa xử lý</option><option>Đã xử lý</option>'}
                str+=`</select></td>
                <td> <a href='?id=dh&&displayvalue=block&&madh=${result[key]['madonhang']}&&makh=${result[key]['makhachhang']}&&manv=${result[key]['manhanvien']}&&tongtien=${result[key]['tongtien']}' class='showorderdetail' >Chi tiết</a> </td>
            </tr> `
            }
            str=str+'</table>'
            console.log(str)
            document.getElementById('admin-div-table-order').innerHTML=str
                
        },
        error: function(e){
            console.log(e)
         
        }
    })
})
// phân trang phiếu nhập//
$(".adminphieunhap-button-phantrang").click(function(){
    var list=document.querySelectorAll(".adminphieunhap-button-phantrang")
    for(let i=0; i<list.length;i++){
        list[i].style="background-color: white;"
    }
    this.style="background-color: gray;"
    $.ajax({
        url: './Content/admin-xulyphantrangphieunhap.php',
        type: 'POST',
        data:{
            sotrang: this.getAttribute("sotrang"),
        },
        success: function(result){
            var result=$.parseJSON(result)
           
            var str=`<table class="admin-table-input-product" cellspacing="1px" cellpadding="5px" width="100%" height="100%">
            <tr>
            <th>Mã phiếu nhập</th>
            <th>Ngày lập</th>
            <th>Nhà cung cấp</th>
            <th>Mã nhân viên</th>
            <th>Tổng tiền</th>
        </tr>`;
            for(key in result){
                str+=`<tr>
                <td>${result[key]['maphieunhap']}</td>
                <td>${result[key]['ngaylap']}</td>
                <td>${result[key]['nhacungcap']}</td>
                <td>${result[key]['manhanvien']}</td>
                <td>${result[key]['tongtien']}</td>
                <td> <a href='?id=dh&&displayvalue=block&&mapnh=${result[key]['maphieunhap']}&&manv=${result[key]['manhanvien']}&&tongtien=${result[key]['tongtien']}' class='showdetail' >Chi tiết</a> </td>
                </tr>                
                `
            }
            str=str+'</table>'
            console.log(str)
            document.getElementById('admin-div-table-input-product').innerHTML=str
                
        },
        error: function(e){
            console.log(e)
         
        }
    })
})
