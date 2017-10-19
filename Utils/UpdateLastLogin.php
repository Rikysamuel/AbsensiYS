<?php
	require_once '../Manager/DbManager.php';
	$user = $_POST['username'];

	$datetime = new DateTime();
	$datetime->setTimezone(new DateTimeZone('Asia/Jakarta'));
	$current_date_time = $datetime->format('Y-m-d H:i:s (e)');
	
	$ret = Update("admin", "last_login", "".$current_date_time."", "username='$user'");
	echo $ret;