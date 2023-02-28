    <?php
    if (isset($_GET["id"])) {
      switch ($_GET["id"]) {
        case "homePage":
          echo "Nội dung trang chủ";
          break;
        case "info1":
          echo "Nội dung trang thông tin tuyển sinh";
          break;
        case "info2":
          echo "Nội dung trang thông tin đào tạo";
          break;
        case "contact":
          echo "Nội dung trang liên hệ";
          break;
        case "idTinhToan":
          include 'tinhToan.php';
          break;
        default:
          echo "Lỗi";
          break;
      }
    } else {
      echo "Mặc định";
    }
    ?>