<!DOCTYPE html>
<?php
	session_start();
	if(!ISSET($_SESSION['username'])){
		header('location: ../Pages/Login.php');
	}
?>
<html lang = "eng">
	<head>
		<title>Pengabsenan Jemaat</title>
		<meta charset = "utf-8" />
		<meta name = "viewport" content = "width=device-width, initial-scale=1" />
		<link rel = "stylesheet" href = "../html/css/bootstrap.css" />
		<link rel = "stylesheet" href = "../html/css/jquery.dataTables.css" />
		<!-- Loaded at the top because got some widgets that require javascripts to be loaded first -->
		<script src = "../html/js/jquery.js"></script>
		<script src = "../html/js/bootstrap.js"></script>
	</head>
	<body>
		<nav class = "navbar navbar-inverse navbar-fixed-top">
			<ul class = "nav nav-pills">
				<li><a href = "home.php"><span class = "glyphicon glyphicon-home"></span> Home</a></li>
				<li class = "dropdown">
					<a class = "dropdown-toggle" data-toggle = "dropdown" href = "#"><span class = "glyphicon glyphicon-cog"></span> Accounts <span class = "caret"></span></a>
					<ul class = "dropdown-menu">
						<li><a href = "../Pages/Admin.php"><span class = "glyphicon glyphicon-user"></span> Admin</a></li>
						<li><a href = "../Pages/Jemaat.php"><span class = "glyphicon glyphicon-user"></span> Jemaat</a></li>
					</ul>
				</li>
				<li><a href = "../Pages/AttendanceListing.php"><span class = "glyphicon glyphicon-book"></span> Attendance Listing</a></li>
				<li class = "dropdown pull-right">
					<a href = "#" class = "dropdown-toggle" data-toggle = "dropdown"><i class = "glyphicon glyphicon-user"></i> <?php echo $_SESSION['username'] ?> <b class = "caret"></b></a>
					<ul class = "dropdown-menu">
						<li><a href = "..\Utils\logout.php"><i class = "glyphicon glyphicon-off"></i> Logout</a></li>
					</ul>
				</li>
			</ul>
		</nav>

		<br />
		<div style="padding-top: 50px"><?php echo $content; ?></div>
		
		<div class = "navbar navbar-fixed-bottom alert-warning">
			<div class = "container-fluid">
				<label class = "pull-left">&copy; Pengabsenan Jemaat Youth Shalom</label>
				<label class = "pull-right">By <a href = "http://youthshalom.com">Youth Shalom</a></label>
			</div>
		</div>
	</body>
</html>
