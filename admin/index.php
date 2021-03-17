<?php
ob_start();
session_start();
include_once 'ketnoi.php';

if (isset($_POST["submit"])) {
	$email = $_POST["email"];
	$mk = $_POST["password"];
	if (isset($email) && isset($mk)) {
		$sql = "SELECT * FROM vp_users WHERE email ='$email' AND password = '$mk'";
		$query = mysqli_query($conn, $sql);
		$rows = mysqli_num_rows($query);
		if ($rows > 0) {
			$_SESSION["email"] = $email;
			$_SESSION["mk"] = $mk;
			header('location: home.php');
		} else {
			echo '<div class="center" style="text-align: center;
    background: darkturquoise;
    padding-top: 15px;
    padding-bottom: 15px;">Tài Khoản không tồn tại</div>';
		}
	}
}
// echo $_SESSION["email"]; kiểm tra đã đăng xuất ra chưa
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Forms</title>

	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">

	<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>

	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Log in</div>
				<div class="panel-body">
					<?php
					if (!isset($_SESSION["email"])) {

					?>
						<form role="form" name="submit" method="POST">
							<fieldset>
								<div class="form-group">
									<input class="form-control" placeholder="E-mail" name="email" type="email" autofocus="">
								</div>
								<div class="form-group">
									<input class="form-control" placeholder="Password" name="password" type="password" value="">
								</div>
								<div class="checkbox">
									<label>
										<input name="remember" type="checkbox" value="Remember Me">Remember Me
									</label>
								</div>
								<button class="btn btn-primary" name="submit">Login</button>
							</fieldset>
						</form>
					<?php
					} else {
						header('location:home.php');
					}

					?>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->




	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script>
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