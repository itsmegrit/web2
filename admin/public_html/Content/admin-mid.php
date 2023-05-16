<div class="admin-mid">
        <div class="admin-mid-left" id="left">
<?php 
    session_start();
    include '..\\config/Connect.php';
    $con=new Connect();
    if($_SESSION['idAccount']){
    $result=$con->selectsql("taikhoan as tk,quyen as q,quyenvachucnang as ct,chucnang as cn","tenchucnang","where mataikhoan='$_SESSION[idAccount]'
    and q.maquyen=ct.maquyen and q.maquyen=tk.maquyen and cn.machucnang=ct.machucnang ");
    while($row=$result->fetch_assoc()){
        if($row["tenchucnang"]=="Quản lý tài khoản"){
            echo "<a href='admin.php?id=tk' style='text-decoration: none;'><div class='function'>$row[tenchucnang]</div></a>";
        }
        if($row["tenchucnang"]=="Quản lý quyền"){
            echo "<a href='admin.php?id=q' style='text-decoration: none;'><div class='function'>$row[tenchucnang]</div></a>";
        }
        if($row["tenchucnang"]=="Quản lý sản phẩm"){
            echo "<a href='admin.php?id=sp' style='text-decoration: none;'><div class='function'>$row[tenchucnang]</div></a>";
        }
        if($row["tenchucnang"]=="Quản lý đơn hàng"){
            echo "<a href='admin.php?id=dh' style='text-decoration: none;'><div class='function'>$row[tenchucnang]</div></a>";
        }
        if($row["tenchucnang"]=="Quản lý đặt hàng"){
            echo "<a href='admin.php?id=pdh' style='text-decoration: none;'><div class='function'>$row[tenchucnang]</div></a>";
        }
    }
}
    echo "<a href='admin.php?id=thk' style='text-decoration: none;'><div class='function'>Thống kê</div></a>";?>
    </div>
        <div class="admin-mid-content" id="content">
            <?php include 'admin-mid-content.php';?>
        </div>
    </div>