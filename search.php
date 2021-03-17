<?php
$text1 = $_POST["text"];
$textnew = trim($text1);
$text = explode(' ', $textnew);
$textnew = implode('%', $text);
$textnew = '%' . $textnew . '%';
$sql = "SELECT * FROM vp_products WHERE prod_name LIKE '$textnew' ORDER BY prod_id DESC";
$query = mysqli_query($conn, $sql);


?>


<div class="products">
	<h3>Tìm kiếm với từ khóa: <span><?php echo $text1 ?></span></h3>
	<div class="product-list row">
		<?php
		while ($row = mysqli_fetch_array($query)) {
		?>
			<div class="product-item col-md-3 col-sm-6 col-xs-12">
				<a href="home.php?page_lay=details&id_sp=<?php echo $row["prod_id"] ?>"><img src="img/<?php echo $row["prod_img"] ?>" class="img-thumbnail"></a>
				<p><a href="#"><?php echo $row["prod_name"] ?></a></p>
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
<div id="pagination">
	<ul class="pagination pagination-lg justify-content-center">
		<li class="page-item">
			<a class="page-link" href="#" aria-label="Previous">
				<span aria-hidden="true">&laquo;</span>
				<span class="sr-only">Previous</span>
			</a>
		</li>
		<li class="page-item disabled"><a class="page-link" href="#">1</a></li>
		<li class="page-item"><a class="page-link" href="#">2</a></li>
		<li class="page-item"><a class="page-link" href="#">3</a></li>
		<li class="page-item">
			<a class="page-link" href="#" aria-label="Next">
				<span aria-hidden="true">&raquo;</span>
				<span class="sr-only">Next</span>
			</a>
		</li>
	</ul>
</div>
</div>