<?php
	require_once '../Manager/DbManager.php';

	$user = $_POST['username'];
	$max_attempt =  GetMaxLoginAttempt();

	$login_attempt_str = Select("admin", "username='$user'", "login_attempt")[0]["login_attempt"];
	$login_attempt = (int) $login_attempt_str;

	if ($login_attempt < $max_attempt) {
		$login_attempt += 1;

		$ret = Update("admin", "login_attempt", "$login_attempt", "username='$user'");
		echo $ret;
	} else {
		$ret = Update("admin", "is_locked_out", "1", "username='$user'");
	}