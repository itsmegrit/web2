<?php
function openConnect(){
    $servername="localhost";
    $username="QLBH"; 
    $password="123456";
    $dbname="web2";
    $conn=new mysqli($servername,$username, $password,$dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}
function closeConnect($conn){
    $conn->close();
}
?>