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
    
   if($Cat==0&&$Price==0){
    $data=$conn->selectsql("sanpham","*","where tensanpham like '%$searchdata%' AND tinhtrang =1");
   }
   else {
    if($Cat==0){
        if($Price==1000000){
            $data=$conn->selectsql("sanpham","*","where tensanpham like '%$searchdata%' AND (giaban>1000000)  AND tinhtrang =1");
        }else{
            $data=$conn->selectsql("sanpham","*","where tensanpham like '%$searchdata%' AND (giaban BETWEEN $Price)  AND tinhtrang =1");
        }
        
    }
    if($Price==0){
        $data=$conn->selectsql("sanpham,chitietsanpham","*","where tensanpham like '%$searchdata%' AND  sanpham.masanpham=chitietsanpham.masanpham AND matheloai='$Cat' AND tinhtrang =1");
    }
    
    // $data=$conn->selectsql("sanpham,chitietsanpham","*","where tensanpham like '%$searchdata%' AND (giaban BETWEEN $Price) AND sanpham.masanpham=chitietsanpham.masanpham AND matheloai='$Cat' AND tinhtrang =1");
   }
  if($data->num_rows>0){

    echo "<div class='row'>
    <h2>Tìm kiếm: $searchdata</h2>
        </div>
        <div class='row'>
        ";
    while ($row=mysqli_fetch_array($data)){
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
  echo "</div>"; 
}
else{
    echo "không có sản phẩm";
}
}
?>