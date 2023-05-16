<!-- tìm theo date -->
<?php
// include('./config/Connection.php');
// include '/xampp/htdocs/web2/ToyKinhDom/config/Connection.php';  
// include '/web2-update-search/ToyKinhDom/admin/config/Connect.php' ;

include '..\\config/Connect.php';
$con=new Connect();
    $datefrom =$_POST["datefrom"];
    $dateto =$_POST["dateto"];
    $slsp=5;
    $sotrang=$_POST["sotrang"];
    $start=$slsp*$sotrang - $slsp;
    $result=$con->selectsql("donhang","*","where thoigiandat BETWEEN '$datefrom' AND '$dateto' LiLIMIT $start,$slsp");
    $con->closeConnect();
    $arr=array();
    if($result->num_rows>0){
        while ($row = $result->fetch_assoc())
        {
            $arr[$row['madonhang']] = $row ;   
        }
    }
    echo json_encode($arr);
    exit;
// }
?>