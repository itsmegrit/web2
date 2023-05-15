<?php
session_start();
if(isset($_SESSION['loggedIN'])){
    if(isset($_POST['infor'])&&($_POST['infor']))
      include_once ("./config/Connection.php");
      $conn=new Connect();
      $fullname=$_POST['fullnamePHP'];
      $phone=$_POST['phonePHP'];
      $address=$_POST['addressPHP'];
      $email=$_POST['emailPHP'];
      $user=$conn->selectsql("nguoidung","manguoidung","where tennguoidung='$fullname'");
      if($user->num_rows<0||$user->num_rows==0){
        $count=$conn->selectsql("nguoidung");
          $count=$count->num_rows+1;
          $data = $conn->insertsql("nguoidung(manguoidung,tennguoidung,sodienthoai,diachi,email,maloai,mataikhoan)", "values ('$count','$fullname','$phone','$address',' $email',002,2)");
        exit("success");
      }
  }
  else {
    $message = "Cần phải đăng nhập trước khi nhập thông tin ";
        echo "<script type='text/javascript'>alert('$message');</script>";
  }
?>