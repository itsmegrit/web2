<?php
  include_once('./config/Connection.php');
  $conn=new Connect();
  
  $product=$conn->selectsql("theloai,chitietsanpham,sanpham","*","where theloai.matheloai=chitietsanpham.matheloai AND chitietsanpham.matheloai='$_GET[id]' AND sanpham.masanpham = chitietsanpham.masanpham ");
  $product1=$conn->selectsql("theloai,chitietsanpham","*","where theloai.matheloai=chitietsanpham.matheloai AND chitietsanpham.matheloai='$_GET[id]'");
  $row_title=mysqli_fetch_array($product1);
?>
<div class="commonLayout body ">
  <div class="container">
    <div class="row mt-6">
      
        <div class="row">
          <h2><?php echo $row_title['tentheloai']?></h2>
        </div>
      
    </div>
  
    <div class="row">
    <?php
     while($row = mysqli_fetch_array($product)){
    ?>
      <div class="col-md-3 col-sm-6">
      <a href="index1.php?action=sanpham&id=<?php echo $row['masanpham']?>">
        <div class="product-grid">
          <div class="product-image">
              <img class="img-1" src="./public_html/img/<?php echo $row['hinhanh1']?>">
              <img class="img-2" src="./public_html/img/<?php echo $row['hinhanh2']?>">
           
          </div>
          <div class="product-content">
            <ul class="rating">
              <li class="fas fa-star"></li>
              <li class="fas fa-star"></li>
              <li class="fas fa-star"></li>
              <li class="fas fa-star"></li>
              <li class="fas fa-star disable"></li>
              <li class="disable"></li>
            </ul>
            <h3 class="title"><a href="index1.php?action=sanpham&id=<?php echo $row['masanpham']?>"><?php echo $row['tensanpham']?></a></h3>
            <div class="price"><?php echo number_format($row['giaban'],0,',',',').'VNĐ'?></div>
          </div>
        </div>
     </a>
      </div>
      <?php
     }
      ?>
  </div>
  <div>
      <a href="logout.php">Đăng xuất</a>
     </div>
</div>
</div>