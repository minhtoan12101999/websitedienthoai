	<?php
	$sql = "SELECT * FROM vp_products WHERE prod_featured=1 ORDER BY prod_id DESC LIMIT 8 ";
	$query = mysqli_query($conn, $sql);
	?>
	<div class="products">
		<h3>sản phẩm nổi bật</h3>
		<div class="product-list row">
			<?php
			while ($row = mysqli_fetch_array($query)) {
			?>
				<div class="product-item col-md-3 col-sm-6 col-xs-12">
					<a href="home.php?page_lay=details&id_sp=<?php echo $row["prod_id"] ?>"><img src="img/<?php echo $row["prod_img"] ?>" class="img-thumbnail"></a>
					<p><a href="home.php?page_lay=details&id_sp=<?php echo $row["prod_id"] ?>"><?php echo $row["prod_name"] ?></a></p>
					<p class="price"><?php echo number_format($row["prod_price"]) ?></p>
					<div class="marsk">
						<a href="home.php?page_lay=details&id_sp=<?php echo $row["prod_id"] ?>">Xem chi tiết</a>
					</div>
				</div>
			<?php
			}
			?>
		</div>
	</div>
	<?php
	$sql1 = "SELECT * FROM vp_products  ORDER BY prod_id DESC LIMIT 8 ";
	$query1 = mysqli_query($conn, $sql1);
	?>
	<div class="products">
		<h3>sản phẩm mới</h3>
		<div class="product-list row">
			<?php
			while ($row1 = (mysqli_fetch_array($query1))) {
			?>

				<div class="product-item col-md-3 col-sm-6 col-xs-12">
					<a href="home.php?page_lay=details&id_sp=<?php echo $row1["prod_id"] ?>"><img src="img/<?php echo $row1["prod_img"] ?>" class="img-thumbnail"></a>
					<p><a href="home.php?page_lay=details&id_sp=<?php echo $row1["prod_id"] ?>"><?php echo $row1["prod_name"] ?></a></p>
					<p class="price"><?php echo number_format($row1["prod_price"]) ?></p>
					<div class="marsk">
						<a href="home.php?page_lay=details&id_sp=<?php echo $row1["prod_id"] ?>">Xem chi tiết</a>
					</div>
				</div>

			<?php
			}
			?>
		</div>
	</div>