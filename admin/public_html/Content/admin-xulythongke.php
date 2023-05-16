<?php
    if(isset($_POST["thongkestart"])&&isset($_POST["thongkeend"])){
    $con=new Connect();
    $start=$_POST["thongkestart"];
    $end=$_POST["thongkeend"];
    $result=$con->selectsql("donhang as dh,chitietdonhang as ct,sanpham as sp","tensanpham,sum(soluong) as tongsoluongban","where sp.tinhtrang=1 and (thoigiandat BETWEEN '$start' and '$end')
        and dh.madonhang=ct.madonhang and sp.masanpham=ct.masanpham group by tensanpham
        order by tongsoluongban DESC LIMIT 0,5");
        echo "Thống kê Top 5 sản phẩm bán chạy trong khoảng thời gian từ $start đến $end";
        echo "<table class='admin-table-thongke' cellspacing='1px' cellpadding='5px' width='50%' height='100%'>
        <tr>
        <th>STT</th>
        <th>Tên sản phẩm</th>
        <th>Số lượng đã bán</th>
        </tr>";
        if($result->num_rows>0){
            $i=1;
            while ($row = $result->fetch_assoc())
            {
               echo "<tr>
               <td>$i</td>
               <td>$row[tensanpham]</td>
               <td>$row[tongsoluongban]</td>
               </tr>";
               $i++;
            }
            echo "</table></br>";
        }
        echo "Thống kê tình hình kinh doanh của các sản phẩm trong khoảng thời gian từ $start đến $end thuộc 1 loại /Tất cả sản phẩm";
        echo "<table class='admin-table-thongke' cellspacing='1px' cellpadding='5px' width='70%' height='100%'>
        <tr>
        <th>Thời gian đặt hàng</th>
        <th>Tên sản phẩm</th>
        <th>Số lượng đã bán</th>
        <th>Thể loại</th>
        </tr>";
        if(isset($_POST["Category"])){
            if($_POST["Category"]==0){
                $result=$con->selectsql("donhang as dh,chitietdonhang as ct,sanpham as sp,theloai as tl,chitietsanpham as ctsp","thoigiandat,tensanpham,soluong,tentheloai","where sp.tinhtrang=1 
                and dh.madonhang=ct.madonhang and sp.masanpham=ct.masanpham and sp.masanpham=ctsp.masanpham and tl.matheloai=ctsp.matheloai");
                if($result->num_rows>0){
                    $i=1;
                    while ($row = $result->fetch_assoc())
                    {
                       echo "<tr>
                       <td>$row[thoigiandat]</td>
                       <td>$row[tensanpham]</td>
                       <td>$row[soluong]</td>
                       <td>$row[tentheloai]</td>
                       </tr>";
                       $i++;
                    }
                    echo "</table></br>";
                }
            }
            else{
                $result=$con->selectsql("donhang as dh,chitietdonhang as ct,sanpham as sp,chitietsanpham as ctsp,theloai as tl","thoigiandat,tensanpham,soluong,tentheloai","where sp.tinhtrang=1
                and dh.madonhang=ct.madonhang and sp.masanpham=ct.masanpham and tl.matheloai=$_POST[Category] and ctsp.matheloai=tl.matheloai and sp.masanpham=ctsp.masanpham");
                if($result->num_rows>0){
                    $i=1;
                    while ($row = $result->fetch_assoc())
                    {
                       echo "<tr>
                       <td>$row[thoigiandat]</td>
                       <td>$row[tensanpham]</td>
                       <td>$row[soluong]</td>
                       <td>$row[tentheloai]</td>
                       </tr>";
                       $i++;
                    }
                    echo "</table></br>";
                }
            }
        }
        $con->closeConnect();
    }
?>