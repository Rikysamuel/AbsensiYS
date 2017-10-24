<?php
	require_once '../Manager/DbManager.php';
	
	$id = escape($_REQUEST["id"]);
	$result = Select("attendance", "title_id='$id'");
	if (count($result)) {
		echo '
				<script type = "text/javascript">
					alert("Please the delete the content first.");
					window.location = "../Pages/AttendanceListing.php";
				</script>
			';
	}

	$ret = Delete("attendance_listing", "id = '$id'");

	header('location: ../Pages/AttendanceListing.php');