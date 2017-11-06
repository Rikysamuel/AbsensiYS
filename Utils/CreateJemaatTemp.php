<?php
	require_once '../Manager/DbManager.php';

	if(ISSET($_POST['save'])){
		$fullname = escape($_POST['name']);
		$nick_name = "jemaat baru";
		$title_id = escape($_POST['titleId']);

		$datetime = new DateTime();
		$datetime->setTimezone(new DateTimeZone('Asia/Jakarta'));
		$current_date_time = $datetime->format('Y-m-d H:i:s (e)');

		$ret = Insert("jemaat", "(DEFAULT, '$fullname','$nick_name', 'A', '', '', '', '$current_date_time', '', '', '', '', '', DEFAULT, DEFAULT, DEFAULT, DEFAULT)");

		echo '
			<script type = "text/javascript">
				window.location = "../Pages/Checker.php?id='.$title_id.'";
			</script>
		';
	}	