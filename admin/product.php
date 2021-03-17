<?php
$sql = "SELECT * FROM vp_products INNER JOIN vp_categories ON vp_products.name = vp_categories.cate_id";
$query = mysqli_query($conn, $sql);
?>
<?php
if (isset($_GET["page_lay"])) {
	$page = $_GET["page_lay"];
} else {
	$page = 1;
}
$in = 4;
$tinh = $page * $in - $in;
$list = "";
$sql = "SELECT * FROM vp_products INNER JOIN vp_categories ON vp_products.name = vp_categories.cate_id ORDER BY prod_id ASC LIMIT $tinh,$in";
$query = mysqli_query($conn, $sql);
$totalrow = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM vp_products"));
$tatalpage = ceil($totalrow / $in);
for ($i = 1; $i <= $tatalpage; $i++) {
	if ($page == $i) {
		$list .= '<li class="active"><a href="home.php?lay_uot=product&page_lay=' . $i . '">' . $i . '</a></li>';
	} else {
		$list .= '  <li><a href="home.php?lay_uot=product&page_lay=' . $i . '">' . $i . '</a></li>';
	}
}
?>
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Sản phẩm</h1>
	</div>
</div>
<!--/.row-->

<div class="row">
	<div class="col-xs-12 col-md-12 col-lg-12">

		<div class="panel panel-primary">
			<div class="panel-heading">Danh sách sản phẩm</div>
			<div class="panel-body">
				<div class="bootstrap-table">
					<div class="table-responsive">
						<a href="?lay_uot=themsp" class="btn btn-primary">Thêm sản phẩm</a>
						<table class="table table-bordered" style="margin-top:20px;">
							<thead>
								<tr class="bg-primary">
									<th>ID</th>
									<th width="30%">Tên Sản phẩm</th>
									<th>Giá sản phẩm</th>
									<th width="20%">Ảnh sản phẩm</th>
									<th>Danh mục</th>
									<th>Tùy chọn</th>
								</tr>
							</thead>
							<tbody>
								<?php
								while ($row = mysqli_fetch_array($query)) {
								?>
									<tr>
										<td><?php echo $row["prod_id"] ?></td>
										<td><?php echo $row["prod_name"] ?></td>
										<td><?php echo $row["prod_price"] ?></td>
										<td>
											<img width="200px" src="img/<?php echo $row["prod_img"] ?>" class="thumbnail">
										</td>
										<td><?php echo $row["cate_name"] ?></td>
										<td>
											<a href="home.php?lay_uot=editproduct&id_sp=<?php echo $row["prod_id"] ?>" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Sửa</a>
											<a href="xoasp.php?id_sp=<?php echo $row["prod_id"] ?>" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
										</td>
									</tr>
								<?php
								}
								?>
							</tbody>
						</table>
					</div>
				</div>
				<div aria-label="Page navigation">
					<ul class="pagination">
						<?php
						echo $list;
						?>
					</ul>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</div>
<!--/.row-->