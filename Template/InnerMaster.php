<!DOCTYPE html>
<?php
	if (session_status() == PHP_SESSION_NONE) {
	    session_start();
	}
	
	if(!ISSET($_SESSION['username'])){
		header('location: ../Pages/Login.php');
	}

	ob_start();
	require("../Widgets/Navigation/WNavigation.php");
	$navbar = ob_get_clean();
?>
<html lang = "eng">
	<head>
		<title>Pengabsenan Jemaat</title>
		<meta charset = "utf-8" />
		<meta name = "viewport" content = "width=device-width, initial-scale=1" />
		<link rel="shortcut icon" type="image/x-icon" href="../favicon.ico" />
		<link rel = "stylesheet" href = "../html/css/bootstrap.css" />
		<link rel = "stylesheet" href = "../html/css/jquery.dataTables.css" />
		<link rel="stylesheet" href="../html/css/jquery-ui.min.css">
		<style>
			.well {
				overflow: auto;
			}
		</style>
		<!-- Loaded at the top because got some widgets that require javascripts to be loaded first -->
		<script src = "../html/js/jquery.js"></script>
		<script src = "../html/js/bootstrap.js"></script>
		<script src = "../html/js/jquery-ui.min.js"></script>
	</head>
	<body>
		<!-- header -->
		<?php echo $navbar; ?>

		<!-- main -->
		<br />
		<div style="padding-top: 50px"><?php echo $content; ?></div>
		
		<!-- footer -->
		<div class = "navbar navbar-fixed-bottom alert-warning">
			<div class = "container-fluid">
				<label class = "pull-left">&copy; Pengabsenan Jemaat Youth Shalom</label>
				<label class = "pull-right">By <a href = "http://youthshalom.com">Youth Shalom</a></label>
			</div>
		</div>
	</body>
</html>
