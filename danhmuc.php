	<?php
	$sql = "SELECT * FROM vp_categories";
	$query = mysqli_query($conn, $sql);
	?>

	<nav id="menu">
		<ul>
			<li class="menu-item">danh mục sản phẩm</li>
			<?php
			while ($row = mysqli_fetch_array($query)) {
			?>
				<li class="menu-item"><a href="home.php?page_lay=category&id_dm=<?php echo $row["cate_id"] ?>" title=""><?php echo $row["cate_name"] ?></a></li>
			<?php
			}
			?>
		</ul>
		<!-- <a href="#" id="pull">Danh mục</a> -->
	</nav>