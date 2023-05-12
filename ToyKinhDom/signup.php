<?php
session_start();
if(isset($_POST['signup'])){
    include('./config/Connection.php');
    $conn= new Connect();
    $username1=$_POST['newusernamePHP'];
    $password1=$_POST['newpasswordPHP'];
    $user=$conn->selectsql("taikhoan","mataikhoan","where  tentaikhoan='$username1'");
    if($user->num_rows>0){
        $message = "Đã tồn tại tên tài khoản";
        echo "<script type='text/javascript'>alert('$message');</script>";
        exit ("failed");
    }else{
        $count=$conn->selectsql("taikhoan");
        $count=$count->num_rows+1;
        $date=date('d/m/Y H:i:s');
       
        $data = $conn->insertsql("taikhoan(mataikhoan,tentaikhoan,matkhau,ngaytao,trangthai,maquyen)", "values ('$count','$username1','$password1','$date',1,'002')");
        echo "Signup successfully";
        exit("success");
    }
   
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./includes/bootstrap-5.3.0-alpha1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="./includes/bootstrap-5.3.0-alpha1/dist/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="./includes/bootstrap-5.3.0-alpha1/dist/css/bootstrap-utilities.min.css">
  <link rel="stylesheet" href="./includes/bootstrap-5.3.0-alpha1/dist/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="./includes/bootstrap-5.3.0-alpha1/dist/css/bootstrap.rtl.min.css">
    <link rel="stylesheet" type="text/css" href="fontawesome-free-6.4.0-web/fontawesome-free-6.4.0-web/css/all.css">
    <link rel="stylesheet" href="style-signup.css">
    <title>Sign up</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-xl-5 mx-auto">
                <div class="card flex-row  border-0 shadow rounded-3 overflow-hidden">
                    <div class="card-body p-5 p-sm-5">
                        <h5 class="card-title text-center mb-5 fw-light fs-5">Đăng ký</h5>
                        <form method="post" action="signup.php">

                            <div class="form-floating mb-4">
                                <input type="text" class="form-control" id="floatingInputUsername" placeholder="myusername" >
                                <label for="floatingInputUsername">Tên đăng nhập</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                                <label for="floatingPassword">Mật khẩu</label>
                            </div>

                            <div class="form-floating mb-4">
                                <input type="password" class="form-control" id="floatingPasswordConfirm" placeholder="Confirm Password">
                                <label for="floatingPasswordConfirm">Xác nhận mật khẩu</label>
                            </div>

                            <div class="d-grid mb-4">
                            <input class="btn btn-lg btn-primary btn-login fw-bold text-uppercase" id="signup"type="button" value="Đăng ký">

                            </div>
                    

                            <p class="d-block text-center">Đã có tài khoản ?<a href="./login.php"> Đăng nhập</a></p>

                            <!-- <hr class="my-4"> -->

                            <!-- <div class="d-grid mb-2">
                                <button class="btn btn-lg btn-google btn-login fw-bold text-uppercase" type="submit">
                      <i class="fab fa-google me-2"></i> Sign up with Google
                    </button>
                            </div>

                            <div class="d-grid">
                                <button class="btn btn-lg btn-facebook btn-login fw-bold text-uppercase" type="submit">
                      <i class="fab fa-facebook-f me-2"></i> Sign up with Facebook
                    </button>
                            </div> -->
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script
  src="https://code.jquery.com/jquery-3.6.4.min.js"
  integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8="
  crossorigin="anonymous">
</script>
<script type="text/javascript">
   $(document).ready(function(){
        $("#signup").on('click', function(){
            var username=$("#floatingInputUsername").val();
            var password=$("#floatingPassword").val();
            var confirmPassword=$("#floatingPasswordConfirm").val();
            if(username==""||username.length==0) {
                alert("vui lòng nhập tài khoản");
            }
            else if(password==""||password.length==0) {
                alert("vui lòng nhập mật khẩu");
            }
            else if(password.length<6 && password >14){
                alert("mật khẩu cần có độ dài từ 6 tới 14 kí tự");
            }
            else if(confirmPassword==""||confirmPassword.length==0){
                alert("vui lòng xác nhận mật khẩu");
            }

            else if(confirmPassword != password ){
                alert("mật khẩu xác nhận không trùng nhau");
            }
            else{
                $.ajax({
                    signup:1,
                url:'signup.php',
                method: 'POST',
                data:{
                    signup:1,
                    newusernamePHP: username,
                    newpasswordPHP: password,
                },
                success:function(response){
                    if(response.indexOf('success')>0){
                        window.location='login.php';
                        // console.log("thành công");
                    }
                },
                dataType:'text'
            });
            }
        
        });
    });
</script>
</html>