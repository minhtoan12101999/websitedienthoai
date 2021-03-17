<?php
$id_dm = $_GET["id_dm"];
$sql = "SELECT * FROM vp_categories WHERE cate_id = '$id_dm'";
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($query);
if (isset($_POST["submit"])) {
	$ten_dm = $_POST["name"];
	echo $ten_dm;
	if (isset($ten_dm)) {
		echo $ten_dm;
		$sql = "UPDATE vp_categories SET cate_name = '$ten_dm' WHERE cate_id = $id_dm";
		$query = mysqli_query($conn, $sql);
		header('location:home.php?lay_uot=category');
	}
}

?>


<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Danh mục sản phẩm</h1>
	</div>
</div>
<!--/.row-->

<div class="row">
	<div class="col-xs-12 col-md-5 col-lg-5">
		<div class="panel panel-primary">
			<div class="panel-heading">
				Sửa danh mục
			</div>
			<div class="panel-body">
				<div class="form-group">
					<label>Tên danh mục:</label>
					<form method="POST">
						<input type="text" name="name" class="form-control" value=<?php echo $row["cate_slug"] ?>>
						<button name="submit" class="btn btn-primary" style="margin-top: 15px;">Thêm Mới</a>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<!--/.row-->