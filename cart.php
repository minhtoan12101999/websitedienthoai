<?php
if (isset($_SESSION["giohang"])) {
	if (isset($_POST["sl"])) {
		foreach ($_POST["sl"] as $key => $value) {
			if ($value == 0) {
				unset($_SESSION["giohang"][$key]);
			} else if ($value > 0) {
				$_SESSION["giohang"][$key] = $value;
			}
		}
	}
	$array_id = array();
	foreach ($_SESSION["giohang"] as $key => $value) {
		$array_id[] = $key;
	}
	$strid = implode(",", $array_id);
	$sql = "SELECT * FROM vp_products WHERE prod_id IN ($strid) ORDER BY prod_id DESC";
	$query = mysqli_query($conn, $sql);
}
?>
<div id="list-cart">
	<h3>Giỏ hàng</h3>
	<form method="POST" id="giohang">
		<table class="table table-bordered .table-responsive text-center">
			<tr class="active">
				<td width="11.111%">Ảnh mô tả</td>
				<td width="22.222%">Tên sản phẩm</td>
				<td width="22.222%">Số lượng</td>
				<td width="16.6665%">Đơn giá</td>
				<td width="16.6665%">Thành tiền</td>
				<td width="11.112%">Xóa</td>
			</tr>
			<?php
			$total = 0;
			$tong = 0;
			while ($row = mysqli_fetch_array($query)) {
				$total = $row["prod_price"] * $_SESSION["giohang"][$row["prod_id"]];
			?>
				<tr>
					<td><img class="img-responsive" src="img/<?php echo $row["prod_img"] ?>"></td>
					<td><?php echo $row["prod_name"] ?> </td>
					<td>
						<div class="form-group" style="width: 60px;">
							<input name="sl[<?php echo $row["prod_id"] ?>]" class="form-control" type="number" value=<?php echo $_SESSION["giohang"][$row["prod_id"]] ?>>
						</div>
					</td>
					<td style="width: 60px;"><span class=" price"><?php echo number_format($row["prod_price"]) ?></span></td>
					<td><span class="price"><?php echo number_format($total)  ?></span></td>
					<td><a href="xoagiohang.php?id_sp=<?php echo $row["prod_id"] ?>">Xóa</a></td>
				</tr>
			<?php
				$tong += $total;
			}
			?>

		</table>
		<div class="row" id="total-price">
			<div class="col-md-6 col-sm-12 col-xs-12">
				Tổng thanh toán: <span class="total-price"><?php echo number_format($tong) ?></span>

			</div>
			<div class="col-md-6 col-sm-12 col-xs-12">
				<a href="xoahet.php?page=0" class="my-btn btn">Thanh Toán</a>
				<a href="#" onclick="document.getElementById('giohang').submit();" class="my-btn btn">Cập nhật</a>
				<a href="xoagiohang.php?page_lay=0" class="my-btn btn">Xóa giỏ hàng</a>
			</div>
		</div>
	</form>
</div>