<?php
	require_once '../Manager/DbManager.php';
	
	$user = escape($_POST['username']);
	$pass = escape($_POST['password']);
	$ret = Select("admin", "username = '$user'");

	$salt = GetSalt();
	$pass = $salt[0].$pass.$salt[1];
	$pass = hash("sha256", $pass);

	echo $ret."\n";
	print_r($ret);

	if ($ret[0]['is_locked_out'] == 'f') {
		if(count($ret) > 0){
			if ($pass == $ret[0]['password']) {
				echo 'success';
				session_start();
				$_SESSION['username'] = $ret[0]['username'];
				$_SESSION['login_role'] = $ret[0]['role'];

				$ret = Update("admin", "login_attempt", "0", "username='$user'");
				if (!$ret) {
					echo $ret;
				}
			}
		}
	} else {
		echo 'locked';
	}