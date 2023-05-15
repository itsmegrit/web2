<?php
include_once('./config/Connection.php');
$conn = new Connect();
$product = $conn->selectsql("sanpham", "*", "where tinhtrang = 1");
?>
<div class="commonLayout " id="search-product">
  <div class="container-fluid">
    <div class="row ">
      <div class="row">
        <h2>Sản phẩm mới nhất</h2>
      </div>
    </div>

    <div class="row" id="body-product">

    </div>
    <div class="row ">
      <?php
      include_once('./config/Connection.php');
      $conn = new Connect();
      $product = $conn->selectsql("sanpham");
      $soTrang = floor($product->num_rows / 8) + 1;
      ?>
      <nav aria-label="Page navigation example">
        <ul class="pagination">

          <?php for ($i = 1; $i <= $soTrang; $i++) { ?>
            <li soTrang='<?php echo $i ?>' class="page-item"><a class="page-link" href="">
                <?php echo $i ?>
              </a></li>
          <?php } ?>
        </ul>
      </nav>
    </div>
  </div>
</div>

<script>
  $(document).ready(function () {
    $('.page-item').click(function (event) {
      event.preventDefault(); // Ngăn chặn sự kiện mặc định

      var soTrang = $(this).attr('soTrang');
      $.ajax({
        url: 'public_html/publicbody/body-phantrang.php',
        type: 'POST',
        data: {
          soTrang: soTrang
        },
        success: function (result) {
          $('#body-product').html(result);
        },
        error: function (e) {
          console.log(e);
        }
      });
    });

    var soTrang = 1; // Số trang mặc định

    $.ajax({
      url: 'public_html/publicbody/body-phantrang.php',
      type: 'POST',
      data: {
        soTrang: soTrang
      },
      success: function (result) {
        $('#body-product').html(result);
      },
      error: function (e) {
        console.log(e);
      }
    });
  });

</script>