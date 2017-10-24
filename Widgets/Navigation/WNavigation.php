<?php
	$role_id = $_SESSION['login_role'];
?>

<nav class = "navbar navbar-inverse navbar-fixed-top">
	<ul class = "nav nav-pills">
		<li><a href = "../Pages/AttendanceListing.php"><span class = "glyphicon glyphicon-book"></span> Attendance Listing</a></li>
		<li class = "dropdown">
			<a class = "dropdown-toggle" data-toggle = "dropdown" href = "#"><span class = "glyphicon glyphicon-cog"></span> Data <span class = "caret"></span></a>
			<ul class = "dropdown-menu">
				<?php 
					if ($role_id != 2) {
						echo "<li><a href = '../Pages/Admin.php'><span class = 'glyphicon glyphicon-user'></span> Admin</a></li>";
					}
				?>
				<li><a href = "../Pages/Jemaat.php"><span class = "glyphicon glyphicon-user"></span> Jemaat</a></li>
			</ul>
		</li>
		<li class = "dropdown pull-right">
			<a href = "#" class = "dropdown-toggle" data-toggle = "dropdown"><i class = "glyphicon glyphicon-user"></i> <?php echo $_SESSION['username'] ?> <b class = "caret"></b></a>
			<ul class = "dropdown-menu">
				<li><a href = "../Utils/logout.php"><i class = "glyphicon glyphicon-off"></i> Logout</a></li>
			</ul>
		</li>
	</ul>
</nav>