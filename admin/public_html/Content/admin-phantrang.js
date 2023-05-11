$(".adminproduct-button-phantrang").click(function(){
    document.getQuerySelectAll(".adminproduct-button-phantrang").style="background-color: gray;"
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
                console.log(result[key]['masanpham'])
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
