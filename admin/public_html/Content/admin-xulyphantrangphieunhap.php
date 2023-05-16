<?php
    // include('./config/Connection.php');
    // include '/xampp/htdocs/web2/ToyKinhDom/config/Connection.php';
    include '..\..\\config/Connect.php';

    $con=new Connect();
        $slsp=5;
        $sotrang=$_POST["sotrang"];
        $start=$slsp*$sotrang - $slsp;
        $result=$con->selectsql("phieunhap","*"," LIMIT $start,$slsp");
        $con->closeConnect();
        $arr=array();
        if($result->num_rows>0){
            while ($row = $result->fetch_assoc())
            {
                $arr[$row['maphieunhap']] = $row ;   
            }
        }
        echo json_encode($arr);
        exit;
    // }
?>
