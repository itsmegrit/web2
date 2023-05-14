
<?php
    session_start();
    if(isset($_SESSION['loggedIN'])){
        header('Location:index1.php');
    }
    if(isset($_POST['login'])){
        include('./config/Connection.php');
        $conn=new Connect();
        $username=$_POST['usernamePHP'];
        $password=$_POST['passwordPHP'];
        $data=$conn->selectsql("taikhoan","mataikhoan","where  tentaikhoan='$username' AND matkhau='$password'");
        if($data->num_rows>0){
            $_SESSION['loggedIN']=$username;
            $_SESSION['username']=$username;
            exit("success");
        }
        else{
           exit("failed");
        }
    }
 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="./includes/bootstrap-5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./includes/bootstrap-5.3.0-alpha1/dist/css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="./includes/bootstrap-5.3.0-alpha1/dist/css/bootstrap-utilities.min.css">
    <link rel="stylesheet" href="./includes/bootstrap-5.3.0-alpha1/dist/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="./includes/bootstrap-5.3.0-alpha1/dist/css/bootstrap.rtl.min.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="fontawesome-free-6.4.0-web/fontawesome-free-6.4.0-web/css/all.css">
    <link rel="stylesheet" href="style-signup.css">
    <title>Log in</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-xl-5 mx-auto">
                <div class="card  border-0 shadow rounded-3 overflow-hidden">
                    <div class="card-body p-5 p-sm-5">
                        <h5 class="card-title text-center mb-5 fw-light fs-5">Đăng nhập</h5>
                        <form method="post" action="login.php" >
                            <div class="form-floating mb-4">
                                <input type="text" class="form-control " id="floatingInputUsernames"  placeholder="myusername">
                                <label for="floatingInputUsername">Tên đăng nhập</label>
                            </div>
                            <div class="form-floating mb-4">
                                <input type="password" class="form-control " id="floatingPassword"  placeholder="Password">
                                <label for="floatingPassword">Mật khẩu</label>
                            </div>
                            <label class="mb-3">
                                <input type="checkbox"  name="remember"> Nhớ mật khẩu
                              </label>
                            <div class="d-grid mb-4">
                                <input class="btn btn-lg btn-primary btn-login fw-bold text-uppercase" type="button" id="login" value="Đăng nhập">
                            </div>
                            <p class="d-block text-center">Chưa có tài khoản ?<a href="./signup.php"> Đăng ký</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script
  src="https://code.jquery.com/jquery-3.6.4.min.js"
  integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8="
  crossorigin="anonymous">
</script>
<script type="text/javascript">
   $(document).ready(function(){
        $("#login").on('click', function(){
            var username=$("#floatingInputUsernames").val();
            var password=$("#floatingPassword").val();
          
             if(username==""||username.length==0) {
                alert("vui lòng nhập tài khoản");
            }
            else if(password==""||password.length==0) {
                alert("vui lòng nhập mật khẩu");
            }
            else{
                $.ajax({
                    login:1,
                url:'login.php',
                method: 'POST',
                data:{
                    login:1,
                    usernamePHP: username,
                    passwordPHP: password,
                },
                success:function(response){
                    if(response.indexOf('success')>=0){
                        window.location='index1.php';
                    }
                    else {
                        alert("tài khoản hoặc mật khẩu không đúng");
                    }
                },
                dataType:'text'
            });
            }
        
        });
    });


    
</script>
</body >
</html>