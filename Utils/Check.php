<?php
	require_once '..\Manager\DbManager.php';
	
	$id = escape($_POST['id']);
	$title = escape($_POST['title']);

	$check = Select("jemaat", "jemaat_id='$id'");

	if ($check) {
		
		$ret = Select("attendance", "jemaat_id='$id'");
		if (count($ret[0]) > 0) {
			echo "duplicate";
		} else {
			$datetime = new DateTime();
			$datetime->setTimezone(new DateTimeZone('Asia/Jakarta'));
			$current_date_time = $datetime->format('Y-m-d H:i:s (e)');
			
			$ret = Insert("attendance", "(DEFAULT, '$id', '$title', '$current_date_time')");
			if ($ret == "") {
				echo "success";
			} else {
				echo $ret;
			}
		}
	} else {
		echo "unknown";
	}