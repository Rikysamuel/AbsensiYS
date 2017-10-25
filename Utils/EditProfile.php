<?php
	require_once '../Manager/DbManager.php';

	$pass = hash("sha256", escape($_POST['password']));
	$email = escape($_POST['email']);
	
	$id = escape($_REQUEST['id']);

	$salt = GetSalt();
	$pass = $salt[0].$pass.$salt[1];
	$pass = hash("sha256", $pass);

	$ret = Update("admin", "password = '$pass', email = '$email'", "admin_id='$id'");
	echo '
		<script type = "text/javascript">
			window.location = "../Pages/Profile.php";
		</script>
	';