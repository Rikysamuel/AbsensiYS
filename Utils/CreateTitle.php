<?php
	require_once '../Manager/DbManager.php';

	if(ISSET($_POST['save'])){
		$title = escape($_POST['title']);

		$datetime = new DateTime();
		$datetime->setTimezone(new DateTimeZone('Asia/Jakarta'));
		$current_date_time = $datetime->format('Y-m-d H:i:s (e)');

		$ret = Insert("attendance_listing", "('', '$title','$current_date_time')");
		echo '
			<script type = "text/javascript">
				window.location = "../Pages/AttendanceListing.php";
			</script>
		';
	}	