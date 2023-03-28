<?php
    if(isset($_GET["id"])){
            switch($_GET["id"]){
                case "tk": 
                    include 'admin-account.php';break;
                case "q": 
                    include 'admin-permission.php';break;
                case "sp":
                    include 'admin-product.php';break;
                case "dh":
                    include 'admin-order.php';break;
                case "pdh":
                    include 'admin-input-product.php';break;
                case "thk":
                    echo "Bạn đang trong quản lý thống kê";break;
                default: echo "default";break;
            }
    }
    else{
        echo "";
    }
?>