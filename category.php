<?php
$id_dm = $_GET["id_dm"];
$sql1 = "SELECT * FROM vp_categories WHERE cate_id='$id_dm' ";
$query1 = mysqli_query($conn, $sql1);
$row1 = mysqli_fetch_array($query1);
?>
<?php
$sql = "SELECT * FROM vp_products WHERE prod_cate='$id_dm'";
$query = mysqli_query($conn, $sql);
?>
<?php
if (isset($_GET["page_layout"])) {
	$page = $_GET["page_layout"];
} else {
	$page = 1;
}
$in = 3;
$dem = $page * $in - $in;
$sql = "SELECT * FROM vp_products WHERE prod_cate ='$id_dm' ORDER BY `prod_price` DESC LIMIT $dem,$in ";
$query = mysqli_query($conn, $sql);
$totalrow = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM vp_products"));
$list = "";
$tatalpage = ceil($totalrow / $in);
for ($i = 1; $i < $tatalpage; $i++) {
	if ($i == $page) {
		$list .= '<li class="active"><a href="home.php?page_lay=category&id_dm=' . $id_dm . '&page_layout=' . $i . '"  style="    padding: 10px 15px;
    background: #c2c2c2;
    margin-right: 10px;
	margin-left: 10px;">' . $i . '</a></li>';
	} else {
		$list .= '<li><a href="home.php?page_lay=category&id_dm=' . $id_dm . '&page_layout=' . $i . '">' . $i . '</a></li>';
	}
}
?>
<div class="products">
	<h3><?php echo $row1["cate_name"] ?></h3>
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
<div aria-label="Page navigation">
	<ul class="pagination" style="margin-top: 10px;">
		<?php
		echo $list;
		?>
	</ul>
</div>