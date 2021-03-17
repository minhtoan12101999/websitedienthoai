<?php
$id_sp = $_GET["id_sp"];
$sql = "SELECT * FROM vp_products WHERE prod_id ='$id_sp'";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query);
?>
<div id="product-info">
	<div class="clearfix"></div>
	<h3><?php echo $row["prod_name"] ?></h3>
	<div class="row">
		<div id="product-img" class="col-xs-12 col-sm-12 col-md-3 text-center">
			<img src="img/<?php echo $row["prod_img"]   ?>" style="width: 260px;">
		</div>
		<div id="product-details" class="col-xs-12 col-sm-12 col-md-9">
			<p>Giá: <span class="price"><?php echo number_format($row["prod_price"]) ?></span></p>
			<p>Bảo hành: <?php echo $row["prod_warranty"]  ?></p>
			<p>Phụ kiện: <?php echo $row["prod_accessories"] ?></p>
			<p>Tình trạng: <?php echo $row["prod_condition"] ?></p>
			<p>Khuyến mại: <?php echo $row["prod_promotion"] ?></p>
			<p>Còn hàng:<?php echo $row["prod_status"] ?></p>
			<p class="add-cart text-center"><a href="themsp.php?id_sp=<?php echo $row["prod_id"] ?>">Đặt hàng online</a></p>
		</div>
	</div>
</div>
<div id="product-detail">
	<h3>Chi tiết sản phẩm</h3>
	<?php
	echo $row["prod_description"]
	?>
</div>