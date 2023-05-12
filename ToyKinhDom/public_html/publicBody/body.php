<?php
  include_once('./config/Connection.php');
  $conn=new Connect();
  $product=$conn->selectsql("theloai,chitietsanpham,sanpham","*","where theloai.matheloai=chitietsanpham.matheloai  AND sanpham.masanpham = chitietsanpham.masanpham ");
?>
<div class="commonLayout body ">
  <div class="container">
    <div class="row mt-6">
        <div class="row">
          <h2>Sản phẩm mới nhất</h2>
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
            <h3 class="title"><a href="index1.php?action=sanpham&id=<?php echo $row['masanpham']?>"><?php echo $row['tensanpham']?></a></h3>
            <div class="price"><?php echo number_format($row['giaban'],0,',',',').'VNĐ'?></div>
          </div>
        </div>
        </a>
      </div>
     
      <?php
     }
      ?>
     <div>
      <a href="logout.php">Đăng xuất</a>
     </div>
  </div>
</div>
</div>