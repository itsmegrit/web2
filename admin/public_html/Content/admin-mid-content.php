<?php 
    if(isset($_GET["id"])&&isset($_GET["action"])){
        switch($_GET["id"]){
            case "tk":
                if($_GET["action"]=="add"){
                    include 'admin-account-add.php';
                }
                if($_GET["action"]=="edit"){
                    include 'admin-account-edit.php';
                }
                break;
            case "q": 
                if($_GET["action"]=="add"){
                    include 'admin-permission-add.php';
                }
                if($_GET["action"]=="edit"){
                    include 'admin-permission-edit.php';
                }
                break;
            case "sp":
                if($_GET["action"]=="add"){
                    include 'admin-product-add.php';
                }
                if($_GET["action"]=="edit"){
                    include 'admin-product-edit.php';
                }
                break;
            case "dh":
                include 'admin-order.php';break;
            case "pdh":
                include 'admin-input-product.php';break;
            case "thk":
                echo "Bạn đang trong quản lý thống kê";break;
            default: echo "default";break;
        }

    }
    else{if(isset($_GET["id"])){
            switch($_GET["id"]){
                case "tk":include 'admin-account.php';break;
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
}
?>