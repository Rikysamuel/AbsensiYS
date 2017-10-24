<!DOCTYPE html>
<?php
	session_start();
	if(ISSET($_SESSION['username'])){
		header('location: ..\Pages\AttendanceListing.php');
	}
?>
<html lang = "eng">
	<head>
		<title>Pengabsenan Jemaat</title>
		<meta charset = "utf-8" />
		<link rel="shortcut icon" type="image/x-icon" href="../favicon.ico" />
		<meta name = "viewport" content = "width=device-width, initial-scale=1" />
		<link rel = "stylesheet" type = "text/css" href = "../html/css/bootstrap.css" />
		<link rel = "stylesheet" type = "text/css" href = "../html/css/style.css" />
	</head>
	<body>

		<div class = "container" style = "margin-top:120px;">
			<?php echo $content; ?>
		</div>
		<div class = "navbar navbar-fixed-bottom alert-warning">
			<div class = "container-fluid">
				<label class = "pull-left">&copy; Pengabsenan Jemaat</label>
				<label class = "pull-right">By <a href="http://www.youthshalom.com">Youth Shalom</a></label>
			</div>
		</div>
	</body>
	<script src = "../html/js/jquery.js"></script>
	<script src = "../html/js/bootstrap.js"></script>
	<script src = "../html/js/sha256.min.js"></script>
	<script src = "../html/js/login.js"></script>
</html>
