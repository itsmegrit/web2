$(".adminproduct-button-phantrang").click(function(){
    $.ajax({
        url: 'Content/admin-xulyphantrang.php',
        type: 'POST',
        data:{
            sotrang: 1
        },
        success: function(result){
            console.log(result);
            result.forEach(product => {
                //Innerhtml bảng sản phẩm
                $('admin-table-product').innerhtml=`<tr>
                        <td>${product.masanpham}</td>
                        <td>${product.tensanpham}</td>
                        <td><img src='${product.hinhanh1}'></td>
                        <td>${product.giaban}</td>
                        <td><form action='admin.php' method='GET' onsubmit='return Del()'><input type='submit' class='admin-product-del' name='function' value='Xóa'>
                            <a href='admin.php?id=sp&&action=edit&&idproduct=${product.masanpham}' class='admin-product-Edit' style='text-decoration: none;'>Sửa<a> 
                            <input type='hidden' name='id' value='sp'>
                            <input type='hidden' name='idproduct' value='${product.masanpham}'>  
                        </td>
                    </tr>
                `
            });   
        },
        error: function(e){
            console.log(e)
        }
    })
})
