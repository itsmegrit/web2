<?php
  include_once('./config/Connection.php');
  $conn=new Connect();
  
  $productdetail=$conn->selectsql("sanpham","*","where sanpham.masanpham='$_GET[id]'");
    
?>

  <body>
	<div class="commonLayout">
		<div class="card">
			<div class="container-fliud">
                <?php
                    while($row = mysqli_fetch_array($productdetail)){
                ?>
				<div class="wrapper row">
					<div class=" col-md-6">
						<div class="preview-pic tab-content">
						  <div class="tab-pane active" id="pic-1"><img class="img-1" src="./public_html/img/<?php echo $row['hinhanh1']?>"></div>
						  <div class="tab-pane" id="pic-2"><img class="img-1" src="./public_html/img/<?php echo $row['hinhanh2']?>"></div>
						  <div class="tab-pane" id="pic-3"><img class="img-1" src="./public_html/img/<?php echo $row['hinhanh3']?>"></div>
						  <div class="tab-pane" id="pic-4"><img class="img-1" src="./public_html/img/<?php echo $row['hinhanh4']?>"></div>
						</div>
						<ul class="preview-thumbnail nav nav-tabs">
						  <li class="active"><a data-target="#pic-1" data-toggle="tab"><img class="img-1" src="./public_html/img/<?php echo $row['hinhanh1']?>"></a></li>
						  <li><a data-target="#pic-2" data-toggle="tab"><img class="img-1" src="./public_html/img/<?php echo $row['hinhanh2']?>"></a></li>
						  <li><a data-target="#pic-3" data-toggle="tab"><img class="img-1" src="./public_html/img/<?php echo $row['hinhanh3']?>"></a></li>
						  <li><a data-target="#pic-4" data-toggle="tab"><img class="img-1" src="./public_html/img/<?php echo $row['hinhanh4']?>"></a></li>
						</ul>
						
					</div>
					<div class="details col-md-6">
						<h3 class="product-title"><?php echo $row['tensanpham']?></h3>
						<div class="rating">
							<div class="stars">
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star"></span>
								<span class="fa fa-star"></span>
							</div>
							<span class="review-no">41 reviews</span>
						</div>
						<p class="product-description">Suspendisse quos? Tempus cras iure temporibus? Eu laudantium cubilia sem sem! Repudiandae et! Massa senectus enim minim sociosqu delectus posuere.</p>
						<h4 class="product-price">Giá tiền: <?php echo number_format($row['giaban'],0,',',',').'VNĐ'?></h4>
						
						<div class="action">
							<button class="add-to-cart btn btn-default" type="button">add to cart</button>
							<button class="like btn btn-default" type="button"><span class="fa fa-heart"></span></button>
						</div>
					</div>
				</div>
                <?php
                }
                ?>
			</div>
		</div>
	</div>
  </body>
</html>