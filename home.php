<?php
ob_start();
session_start();
include_once 'ketnoi.php';
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title> Home</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/home.css">
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<?php
	if (isset($_GET['page_lay'])) {
		switch ($_GET['page_lay']) {
			case 'search';
				echo '<link rel="stylesheet" href="css/search.css">';
				break;
			case 'cart';
				echo '<link rel="stylesheet" href="css/cart.css">';
				break;
			case 'category';
				echo '<link rel="stylesheet" href="css/category.css">';
				break;
			case 'complete';
				echo '<link rel="stylesheet" href="css/complete.css">';
				break;
			case 'details';
				echo '<link rel="stylesheet" href="css/details.css">';
				break;
			case 'email';
				echo '<link rel="stylesheet" href="css/email.css">';
				break;
				// case 'noibat';
				// 	echo '<link rel="stylesheet" href="css/email.css">';
				// 	break;
		}
	}


	?>


</head>

<body>
	<!-- header -->
	<header id="header">
		<div class="container">
			<div class="row">
				<div id="logo" class="col-md-3 col-sm-12 col-xs-12">
					<h1>
						<a href="#"></a>
						<nav><a id="pull" class="btn btn-danger" href="#">
								<i class="fa fa-bars"></i>
							</a></nav>
					</h1>
				</div>
				<?php
				include 'timkiem.php';

				?>
				<?php
				include 'hienthigiohang.php';

				?>
			</div>
		</div>
	</header><!-- /header -->
	<!-- endheader -->

	<!-- main -->
	<section id="body">
		<div class="container">
			<div class="row">
				<div id="sidebar" class="col-md-3">
					<?php
					include 'danhmuc.php'
					?>

					<div id="banner-l" class="text-center">
						<div class="banner-l-item">
							<a href="#"><img src="img/home/banner-l-1.png" alt="" class="img-thumbnail"></a>
						</div>
						<div class="banner-l-item">
							<a href="#"><img src="img/home/banner-l-2.png" alt="" class="img-thumbnail"></a>
						</div>
						<div class="banner-l-item">
							<a href="#"><img src="img/home/banner-l-3.png" alt="" class="img-thumbnail"></a>
						</div>
						<div class="banner-l-item">
							<a href="#"><img src="img/home/banner-l-4.png" alt="" class="img-thumbnail"></a>
						</div>
						<div class="banner-l-item">
							<a href="#"><img src="img/home/banner-l-5.png" alt="" class="img-thumbnail"></a>
						</div>
						<div class="banner-l-item">
							<a href="#"><img src="img/home/banner-l-6.png" alt="" class="img-thumbnail"></a>
						</div>
						<div class="banner-l-item">
							<a href="#"><img src="img/home/banner-l-7.png" alt="" class="img-thumbnail"></a>
						</div>
					</div>
				</div>

				<div id="main" class="col-md-9">
					<!-- main -->
					<!-- phan slide la cac hieu ung chuyen dong su dung jquey -->
					<?php
					include 'mastesplay/slider.php';

					?>

					<?php
					include 'mastesplay/banner.php';
					?>

					<div id="wrap-inner">
						<?php
						if (isset($_GET["page_lay"])) {
							switch ($_GET['page_lay']) {
								case 'search';
									include_once 'search.php';
									break;
								case 'cart';
									include_once 'cart.php';
									break;
								case 'category';
									include_once 'category.php';
									break;
								case 'complete';
									include_once 'complete.php';
									break;
								case 'details';
									include_once 'details.php';
									break;
								case 'email';
									include_once 'email.php';
									break;
								case 'noibat';
									include_once 'noibat.php';
									break;
							}
						} else {
							include_once 'noibat.php';
						}
						?>
					</div>

					<!-- end main -->
				</div>
			</div>
		</div>
	</section>
	<!-- endmain -->

	<!-- footer -->
	<footer id="footer">
		<div id="footer-t">
			<div class="container">
				<div class="row">

					<div id="about" class="col-md-3 col-sm-12 col-xs-12">
						<h3>About us</h3>
						<p class="text-justify"> is simply dummy text of the printing and typesetting</p>
					</div>
					<div id="hotline" class="col-md-3 col-sm-12 col-xs-12">
						<h3>Hotline</h3>
						<p>Phone Sale: is simply dummy text of the printing and typesetting</p>
						<p>Email: is simply dummy text of the printing and typesetting</p>
					</div>
					<div id="contact" class="col-md-3 col-sm-12 col-xs-12">
						<h3>Contact Us</h3>
						<p>Address 1: is simply dummy text of the printing and typesetting</p>
						<p>Address 2: is simply dummy text of the printing and typesetting</p>
					</div>
				</div>
			</div>
			<div id="footer-b">
				<div class="container">
					<div class="row">
						<div id="footer-b-l" class="col-md-6 col-sm-12 col-xs-12 text-center">
							<p> is simply dummy text of the printing and typesetting</p>
						</div>
						<div id="footer-b-r" class="col-md-6 col-sm-12 col-xs-12 text-center">
							<p>© is simply dummy text of the printing and typesetting</p>
						</div>
					</div>
				</div>
				<div id="scroll">
					<a href="#"><img src="img/home/scroll.png"></a>
				</div>
			</div>
		</div>
	</footer>
	<!-- endfooter -->
</body>

</html>