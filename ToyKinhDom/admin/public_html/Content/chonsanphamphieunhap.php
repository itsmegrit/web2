<?php
// include('./config/Connection.php');
// include '/xampp/htdocs/web2/ToyKinhDom/config/Connection.php';
include '/web2-update-search/ToyKinhDom/admin/config/Connect.php' ;


$con=new Connect();
    $selectmasanpham =$_POST["select_masanpham"];
    $result=$con->selectsql("sanpham","*","where masanpham= '$selectmasanpham'");
    $arr=array();
        if($result->num_rows>0){
            while ($row = $result->fetch_assoc())
            {
                $arr[$row['masanpham']] = $row ;   
            }
        }
    echo json_encode($arr);
      $con->closeConnect();
// }
?>