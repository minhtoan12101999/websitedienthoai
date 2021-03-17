<?php
$sql = "SELECT * FROM vp_categories";
$query = mysqli_query($conn, $sql);
$id_sp = $_GET["id_sp"];
$sqldm = "SELECT * FROM vp_products WHERE prod_id='$id_sp'";
$querydm = mysqli_query($conn, $sqldm);
$rowdm = mysqli_fetch_array($querydm);


if (isset($_POST["submit"])) {
	$ten_sp = $_POST["name"];
	$gia_sp = $_POST["price"];
	$phukien_sp = $_POST["accessories"];
	$baohanh_sp = $_POST["warranty"];
	$khuyenmai_sp = $_POST["promotion"];
	$tinhtrang_sp = $_POST["condition"];
	$trangthai_sp = $_POST["status"];
	$mieuta_sp = $_POST["description"];

	if ($_FILES["img"]["name"] == "") {
		$anh_sp = $rowdm["prod_img"];
	} else {
		$anh_sp = $_FILES["img"]["name"];
		$anh_tmp = $_FILES["img"]["tmp_name"];
	}
	$danhmuc_sp = $_POST["cate"];
	$noibat_sp = $_POST["featured"];
	if (
		isset($ten_sp) && isset($gia_sp) && isset($phukien_sp) && isset($baohanh_sp) && isset($khuyenmai_sp)
		&& isset($tinhtrang_sp) && isset($trangthai_sp) && isset($mieuta_sp) && isset($noibat_sp)
	) {
		move_uploaded_file($anh_tmp, 'img/' . $anh_sp);
		$sql = "UPDATE vp_products SET prod_name='$ten_sp',prod_price='$gia_sp',prod_img='$anh_sp'
		,prod_warranty='$baohanh_sp',prod_accessories='$phukien_sp',prod_promotion='$khuyenmai_sp',
		prod_condition='$tinhtrang_sp',prod_description='$mieuta_sp'
		,prod_status='$trangthai_sp',prod_featured='$noibat_sp',name='$danhmuc_sp' WHERE prod_id ='$id_sp' ";
		$query = mysqli_query($conn, $sql);
		header('location:home.php?lay_uot=product');
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
			<div class="panel-heading">Sửa sản phẩm</div>
			<div class="panel-body">
				<form method="post" enctype="multipart/form-data">
					<div class="row" style="margin-bottom:40px">
						<div class="col-xs-8">
							<div class="form-group">
								<label>Tên sản phẩm</label>
								<input required type="text" name="name" class="form-control">
							</div>
							<div class="form-group">
								<label>Giá sản phẩm</label>
								<input required type="number" name="price" class="form-control">
							</div>
							<div class="form-group">
								<label>Ảnh sản phẩm</label>
								<input type="file" name="img">
							</div>
							<div class="form-group">
								<label>Phụ kiện</label>
								<input required type="text" name="accessories" class="form-control">
							</div>
							<div class="form-group">
								<label>Bảo hành</label>
								<input required type="text" name="warranty" class="form-control">
							</div>
							<div class="form-group">
								<label>Khuyến mãi</label>
								<input required type="text" name="promotion" class="form-control">
							</div>
							<div class="form-group">
								<label>Tình trạng</label>
								<input required type="text" name="condition" class="form-control">
							</div>
							<div class="form-group">
								<label>Trạng thái</label>
								<select required name="status" class="form-control">
									<option value=<?php echo $rowdm["prod_status"] ?> <?php if ($rowdm["prod_status"] == 1) {
																							echo 'selected ="selected"';
																						} ?>>Còn hàng</option>
									<option value=<?php echo $rowdm["prod_status"] ?> <?php if ($rowdm["prod_status"] == 0) {
																							echo 'selected ="selected"';
																						} ?>>Hết hàng</option>
								</select>
							</div>
							<div class="form-group">
								<label>Miêu tả</label>
								<textarea required name="description"></textarea>
							</div>
							<div class="form-group">
								<label>Danh mục</label>
								<select required name="cate" class="form-control">
									<?php
									while ($row = mysqli_fetch_array($query)) {
									?>
										<option <?php
												if ($rowdm["name"] == $row["cate_id"]) {
													echo 'selected ="selected"';
												}
												?> value=<?php echo $row["cate_id"] ?>><?php echo $row["cate_name"] ?></option>

									<?php
									}
									?>
								</select>
							</div>
							<div class="form-group">
								<label>Sản phẩm nổi bật</label><br>
								Có: <input type="radio" name="featured" value="1" <?php if ($rowdm["prod_featured"] == 1) {
																						echo "checked";
																					} ?>>
								Không: <input type="radio" name="featured" value="0" <?php if ($rowdm["prod_featured"] == 0) {
																							echo "checked";
																						} ?>>
							</div>
							<input type="submit" name="submit" value="Thêm" class="btn btn-primary">
							<a href="#" class="btn btn-danger">Hủy bỏ</a>
						</div>
					</div>
				</form>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</div>
<!--/.row-->