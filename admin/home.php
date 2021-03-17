<?php
ob_start();
session_start();
include 'ketnoi.php';



if (!isset($_SESSION["email"]) && !isset($_SESSION["mk"])) {
	header('location:index.php');
}
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Website Điện Thoại</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
	<script src="js/lumino.glyphs.js"></script>
</head>

<body>
	<?php if (isset($_SESSION["email"])) {
		$email = $_SESSION["email"];
	}
	?>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="#"> Admin</a>
				<ul class="user-menu">
					<li class="dropdown pull-right">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user">
								<use xlink:href="#stroked-male-user"></use>
							</svg> Xin Chào<?php echo " " . $email  ?> <span class="caret"></span></a>
						<ul class="dropdown-menu" role="menu">
							<li><a href="dangxuat.php"><svg class="glyph stroked cancel">
										<use xlink:href="#stroked-cancel"></use>
									</svg> Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>

		</div><!-- /.container-fluid -->
	</nav>

	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<ul class="nav menu">
			<li role="presentation" class="divider"></li>
			<li class="active"><a href="?lay_uot=gioithieu"><svg class="glyph stroked dashboard-dial">
						<use xlink:href="#stroked-dashboard-dial"></use>
					</svg> Trang chủ</a></li>
			<li><a href="?lay_uot=product"><svg class="glyph stroked calendar">
						<use xlink:href="#stroked-calendar"></use>
					</svg> Sản phẩm</a></li>
			<li><a href="?lay_uot=category"><svg class="glyph stroked line-graph">
						<use xlink:href="#stroked-line-graph"></use>
					</svg> Danh mục</a></li>
			<li><a href="?lay_uot=admin"><svg class="glyph stroked line-graph">
						<use xlink:href="#stroked-line-graph"></use>
					</svg> Danh sách thành viên</a></li>

			<li role="presentation" class="divider"></li>

		</ul>

	</div>
	<!--/.sidebar-->

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<!--/ 
    tạo điều hướng cho trang
                 
-->
		<?php
		if (isset($_GET["lay_uot"])) {
			switch ($_GET["lay_uot"]) {
				case 'gioithieu';
					include_once './gioithieu.php';
					break;
				case 'product';
					include_once './product.php';
					break;
				case 'category';
					include_once './category.php';
					break;
				case 'themsp';
					include_once './addproduct.php';
					break;
				case 'admin';
					include_once './admin.php';
					break;
				case 'add';
					include_once './add.php';
					break;
				case 'home';
					include_once './home.php';
					break;
				case 'editcategory';
					include_once './editcategory.php';
					break;
				case 'editproduct';
					include_once './editproduct.php';
					break;
				case 'edit';
					include_once './edit.php';
					break;
			}
		} else {
			include_once './gioithieu.php';
		}



		?>
	</div>
	<!--/.main-->


	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script>
		$('#calendar').datepicker({});

		! function($) {
			$(document).on("click", "ul.nav li.parent > a > span.icon", function() {
				$(this).find('em:first').toggleClass("glyphicon-minus");
			});
			$(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
		}(window.jQuery);

		$(window).on('resize', function() {
			if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
		})
		$(window).on('resize', function() {
			if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
		})
	</script>
</body>

</html>
<?php
?>