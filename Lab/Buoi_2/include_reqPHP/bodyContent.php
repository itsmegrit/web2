  <div class="mid-mid">
    <?php
    if (isset($_GET["id"])) {
      switch ($_GET["id"]) {
        case "homePage":
          echo "Trang chu";
          break;
        case "info1":
          echo "Tuyển sinh";
          break;
        case "info2":
          echo "Đào tạo";
          break;
        case "contact":
          echo "Liên hệ";
          break;
        default:
          echo "Err";
          break;
      }
    } else {
      echo "Mặc định";
    }
    ?>
  </div>