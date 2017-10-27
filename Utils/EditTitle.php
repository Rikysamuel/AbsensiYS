<?php
	require_once '../Manager/DbManager.php';

	$title = escape($_POST['title']);
	$id = escape($_REQUEST['title_id']);

	$ret = Update("attendance_listing", "title = '$title'", "id='$id'");
	
	echo '
		<script type = "text/javascript">
			window.location = "../Pages/AttendanceListing.php";
		</script>
	';