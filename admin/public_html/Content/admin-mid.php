<div class="admin-mid">
        <div class="admin-mid-left" id="left">
<?php 
    $leftmenu= array(
        "tk"=>"Tài khoản",
        "q"=>"Quyền",
        "sp"=>"Sản phẩm",
        "dh"=>"Đơn hàng",
        "pdh"=>"Phiếu đặt hàng",
        "thk"=>"Thống kê"
    );
    foreach($leftmenu as $id=>$name){
        echo '<a href="admin.php?id='.$id.'" style="text-decoration: none;"><div class="function">'.$name.'</div></a>';
    }
?>
    </div>
        <div class="admin-mid-content" id="content">
            <?php include 'admin-mid-content.php';?>
        </div>
    </div>