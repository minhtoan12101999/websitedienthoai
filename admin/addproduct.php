<?php
$sql = "SELECT * FROM vp_categories";
$query = mysqli_query($conn, $sql);
if (isset($_POST["submit"])) {
	$ten_sp = $_POST["name"];
	$gia_sp = $_POST["price"];
	$phukien_sp = $_POST["accessories"];
	$baohanh_sp = $_POST["warranty"];
	$khuyenmai_sp = $_POST["promotion"];
	$tinhtrang_sp = $_POST["condition"];
	$trangthai_sp = $_POST["status"];
	$mieuta_sp = $_POST["description"];
	if ($_POST["cate"] == "khong") {
		$error_danhmuc_sp = '<span style="color:red;">(*)</span>';
	} else {
		$danhmuc_sp = $_POST["cate"];
	}
	if ($_FILES["anh_sp"]["name"] == "") {
		$error_anh_sp = '<span style="color:red;">(*)</span>';
	} else {
		$anh_sp = $_FILES["anh_sp"]["name"];
		$tmp_name = $_FILES["anh_sp"]["tmp_name"];
	}
	$noibat_sp = $_POST["featured"];
	if (
		isset($ten_sp) && isset($gia_sp) && isset($phukien_sp) && isset($baohanh_sp) && isset($khuyenmai_sp)
		&& isset($tinhtrang_sp) && isset($trangthai_sp) && isset($mieuta_sp)
		&& isset($danhmuc_sp) && isset($anh_sp) && isset($noibat_sp)
	) {
		move_uploaded_file($tmp_name, 'img/' . $anh_sp);
		$sql1 = "INSERT INTO vp_products(prod_name,prod_price,prod_img,prod_warranty,prod_accessories
		,prod_condition,prod_promotion,prod_status,
		prod_description,prod_cate,prod_featured) VALUES('$ten_sp','$gia_sp','$anh_sp',
		'$baohanh_sp','$phukien_sp','$tinhtrang_sp','$khuyenmai_sp','$trangthai_sp','$mieuta_sp','$danhmuc_sp','$noibat_sp')";
		$query1 = mysqli_query($conn, $sql1);
		header("location:home.php?lay_uot=product");
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
			<div class="panel-heading">Thêm sản phẩm</div>
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
								<input type="file" name="anh_sp">
							</div>
							<div class=" form-group">
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
									<option value="1">Còn hàng</option>
									<option value="0">Hết hàng</option>
								</select>
							</div>
							<div class="form-group">
								<label>Miêu tả</label>
								<textarea required name="description"></textarea>
							</div>
							<div class="form-group">
								<label>Danh mục</label>
								<select required name="cate" class="form-control">
									<option value="khong">Lựa Chọn Nhà Cung Cấp</option>
									<?php
									while ($row = mysqli_fetch_array($query)) {
									?>
										<option value=<?php echo $row["cate_id"] ?>><?php echo $row["cate_name"] ?></option>
									<?php
									}
									?>
								</select>
							</div>
							<div class="form-group">
								<label>Sản phẩm nổi bật</label><br>
								Có: <input type="radio" name="featured" value="1">
								Không: <input type="radio" checked name="featured" value="0">
							</div>
							<button type="submit" name="submit" value="Thêm" class="btn btn-primary">Thêm
								<!-- <a href="#" class="btn btn-danger">Hủy bỏ</a> -->
						</div>
					</div>
				</form>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</div>
<!--/.row-->