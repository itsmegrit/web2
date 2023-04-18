<?php
include('Database.php');
if (isset($_POST['username']) && isset($_POST['password'])) {
  function test_input($data)
  {
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }


  $username = test_input($_POST['username']);
  $password = test_input($_POST['password']);
  if (empty($username)) {
    header("Location:../dangnhap.php?error=usernameIsRequired");
  } else if (empty($password)) {
    header("Location:../dangnhap.php?error=passwordIsRequired");
  } else {
    $db = new Database();
    $res = $db->select("taikhoan", "*", 'tendn = "' . $_POST['username'] . '" and matkhau= "' . $_POST['password'] . '"');
    if (sizeof($res) > 0) {
      // echo "Ten tai khoan: " . $res[0]['tendn'];

      if ($res[0]['quyen'] == 0) {
        session_start();
        $_SESSION['ssUsername'] = $_POST['username'];
        echo "Ten tai khoan: " . $res[0]['tendn'];
      } else {
        header("Location:../quantri.php");
      }
    } else {
      header("Location:../dangnhap.php?error=Sai thông tin đăng nhập!");
    }
  }
} else {
  header("Location:../dangnhap.php");
}
?>