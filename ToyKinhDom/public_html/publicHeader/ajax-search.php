<?php
if(isset($_POST['searchPHP'])){
    include '..\..\\config/Connection.php';
    $conn=new Connect();
   $searchdata=$_POST['searchPHP'];
   $Cat=$_POST['CatPHP'];
    $Price=$_POST['PricePHP'];
    // if($Price==0){
    //     $data=$conn->selectsql("sanpham","*","where tensanpham like '%$searchdata%' AND tinhtrang =1");
    // }
    // else if($Price==1){
    //     $data=$conn->selectsql("sanpham","*","where tensanpham like '%$searchdata%' AND (giaban BETWEEN '0'AND '500000') AND tinhtrang =1");
    // }
    $xuly = '';
$data = $conn->selectsql("sanpham", "*", "where tensanpham like '%$searchdata%' AND tinhtrang = 1");
$xuly = "where tensanpham like '%$searchdata%' AND tinhtrang = 1";

if ($Cat == 0 && $Price != 0) {
    if ($Price == 1000000) {
        $data = $conn->selectsql("sanpham", "*", "where tensanpham like '%$searchdata%' AND giaban > 1000000  AND tinhtrang = 1");
        $xuly = "where tensanpham like '%$searchdata%' AND (giaban > 1000000)  AND tinhtrang = 1";
    } else {
        $data = $conn->selectsql("sanpham", "*", "where tensanpham like '%$searchdata%' AND giaban BETWEEN $Price  AND tinhtrang = 1");
        $xuly = "where tensanpham like '%$searchdata%' AND (giaban BETWEEN $Price)  AND tinhtrang = 1";
    }
} elseif ($Price == 0 && $Cat != 0) {
    $data = $conn->selectsql("sanpham,chitietsanpham", "*", "where tensanpham like '%$searchdata%' AND  sanpham.masanpham=chitietsanpham.masanpham AND matheloai='$Cat' AND tinhtrang = 1");
    $xuly = "where tensanpham like '%$searchdata%' AND  sanpham.masanpham=chitietsanpham.masanpham AND matheloai= '$Cat' AND tinhtrang = 1";
} elseif ($Price != 0 && $Cat != 0) {
    if ($Price == 1000000) {
        $data = $conn->selectsql("sanpham,chitietsanpham", "*", "where tensanpham like '%$searchdata%' AND (giaban > 1000000) AND sanpham.masanpham=chitietsanpham.masanpham AND matheloai='$Cat' AND tinhtrang = 1");
        $xuly = "where tensanpham like '%$searchdata%' AND (giaban > 1000000) AND sanpham.masanpham=chitietsanpham.masanpham AND matheloai='$Cat' AND tinhtrang = 1";
    } else {
        $data = $conn->selectsql("sanpham,chitietsanpham", "*", "where tensanpham like '%$searchdata%' AND (giaban BETWEEN $Price) AND sanpham.masanpham=chitietsanpham.masanpham AND matheloai='$Cat' AND tinhtrang = 1");
        $xuly = "where tensanpham like '%$searchdata%' AND (giaban BETWEEN $Price) AND sanpham.masanpham=chitietsanpham.masanpham AND matheloai='$Cat' AND tinhtrang = 1";
    }
}

if ($data->num_rows > 0) {
 $limit = 8;
    if (($Price == 0 && $Cat != 0) || ($Price != 0 && $Cat != 0)) {
        $dataproduct = $conn->selectsql("sanpham,chitietsanpham", "*", "$xuly LIMIT 0, $limit");
    } else {
        $dataproduct = $conn->selectsql("sanpham", "*", "$xuly LIMIT 0, $limit");
   }
    echo "<div class='row'>
    <h2>Tìm kiếm: $searchdata</h2>
        </div>
        <div class='row'>
        ";
    while ($row=mysqli_fetch_array( $dataproduct)){
?>
    
<div class="col-md-3 col-sm-6" id="search">
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
  echo "</div>"; 
}
else{
    echo "không có sản phẩm";
}
}
?>
<div class="row ">
      <?php
      $soTrang = floor(($data->num_rows -1) / 8) + 1;
      ?>
      <nav aria-label="Page navigation example">
        <ul class="pagination">
          <?php for ($i = 1; $i <= $soTrang; $i++) { ?>
            <li  xuly="<?php echo $xuly?>"soTrang="<?php echo $i ?>" class="page-item"><a class="page-link" href="">
                <?php echo $i ?>
              </a></li>
          <?php } ?>
        </ul>
      </nav>
    </div>
    <script type="text/javascript">
$(document).ready(function () {
  $('.page-item').click(function (event) {
    var soTrang = $(this).attr('soTrang');
    var xuly = $(this).attr('xuly');
    event.preventDefault();
        $.ajax({
                url:'public_html/publicHeader/search-phantrang.php',
                method: 'POST',
                data:{
                  soTrang: soTrang,
                  xuly:xuly,
                },
                success:function(data){
                       $('#search-product').html(data);
                },
                dataType:'text'
            });
      
    });
  });
</script>

