<?php
    if(isset($_GET["id"])&&isset($_GET["action"])){
            switch($_GET["id"]){
                case "tk": if($_GET["action"]=="add"){
                    include 'admin-account-add.php';}break;
                case "q": if($_GET["action"]=="add"){
                    include 'admin-permission-add.php';}break;
                case "sp":if($_GET["action"]=="add"){
                    include 'admin-product-add.php';}break;
                case "pdh":if($_GET["action"]=="add"){
                    include 'admin-input-product-add.php';}break;
                case "thk":
                    echo "Bạn đang trong quản lý thống kê";break;
                default: echo "default";break;
            }
    }
    else{
        echo "";
    }
?>