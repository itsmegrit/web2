<?php
    include '..\..\\config/Connect.php';
    $con=new Connect();
        $slsp=5;
        $sotrang=$_POST["sotrang"];
        $start=$slsp*$sotrang - $slsp;
        $result=$con->selectsql("sanpham","*","where tinhtrang=1  LIMIT $start,$slsp");
        $con->closeConnect();
        $arr=array();
        if($result->num_rows>0){
            while ($row = $result->fetch_assoc())
            {
                $arr[$row['masanpham']] = $row ;   
            }
        }
        echo json_encode($arr);
        exit;
    // }
?>
