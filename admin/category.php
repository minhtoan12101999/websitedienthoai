<?php
include_once 'ketnoi.php';
$sql = "SELECT * FROM vp_categories ORDER BY cate_id ASC";
$query = mysqli_query($conn, $sql);
?>
<?php
if (isset($_POST["submit"])) {
	$ten_dm = $_POST["tendm"];
	if (isset($ten_dm)) {
		$sqldm = "INSERT INTO vp_categories(cate_name) VALUES('$ten_dm')";
		$query = mysqli_query($conn, $sqldm);
		header('location:home.php?lay_uot=category');
		echo "thành công";
	} else {
		echo " thất bại";
	}
}
?>

<?php
if (isset($_GET["page_lay"])) {
	$page = $_GET["page_lay"];
} else {
	$page = 1;
}
$in = 3;
$tinh = $page * $in - $in;
$list = "";
$sql = "SELECT * FROM vp_categories ORDER BY cate_id ASC LIMIT $tinh,$in";
$query = mysqli_query($conn, $sql);
$totalrow = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM vp_categories"));
$tatalpage = ceil($totalrow / $in);
for ($i = 1; $i <= $tatalpage; $i++) {
	if ($page == $i) {
		$list .= '<li class="active"><a href="home.php?lay_uot=category&page_lay=' . $i . '">' . $i . '</a></li>';
	} else {
		$list .= '  <li><a href="home.php?lay_uot=category&page_lay=' . $i . '">' . $i . '</a></li>';
	}
}
?>
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Danh mục sản phẩm</h1>
	</div>
</div>
<!--/.row-->

<?php

echo "<script> console.log('abc')


</script>";

?>

<div class="row">
	<div class="col-xs-12 col-md-5 col-lg-5">
		<div class="panel panel-primary">
			<div class="panel-heading">
				Thêm danh mục
			</div>
			<div class="panel-body">
				<div class="form-group">
					<label>Tên danh mục:</label>
					<form method="POST">
						<input type="text" name="tendm" class="form-control" placeholder="Tên danh mục...">
						<button name="submit" class="btn btn-primary" style="margin-top: 15px;">Thêm danh mục sản phẩm</a>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="col-xs-12 col-md-7 col-lg-7">
		<div class="panel panel-primary">
			<div class="panel-heading">Danh sách danh mục</div>
			<div class="panel-body">
				<div class="bootstrap-table">
					<table class="table table-bordered">
						<thead>
							<tr class="bg-primary">
								<th>Tên danh mục</th>
								<th style="width:30%">Tùy chọn</th>
							</tr>
						</thead>
						<tbody>
							<?php
							// echo '<pre>';
							// echo print_r($array);
							// echo '</pre>';
							// foreach ($array as $key => $value) {
							while ($array = mysqli_fetch_array($query)) {
							?>

								<tr>
									<td><?php echo $array["cate_id"] . " " ?><?php echo $array["cate_name"] ?></td>
									<td>
										<a href="?lay_uot=editcategory&id_dm=<?php echo $array["cate_id"] ?>" class="btn btn-warning"><span class="glyphicon glyphicon-edit"></span> Sửa</a>
										<a href="xoadm.php?id_dm=<?php echo $array["cate_id"] ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Xóa</a>
									</td>
								</tr>
							<?php
							}
							?>
						</tbody>
					</table>
				</div>
				<div aria-label="Page navigation">
					<ul class="pagination">
						<?php
						echo $list;
						?>
					</ul>
				</div>
				<div class="clearfix">


				</div>
			</div>
		</div>
	</div>
</div>
<!--/.row-->