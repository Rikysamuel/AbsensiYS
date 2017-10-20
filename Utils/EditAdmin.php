<?php
	require_once '../Manager/DbManager.php';

	$user = escape($_POST['username']);
	$pass = hash("sha256", escape($_POST['password']));
	$email = escape($_POST['email']);
	$role = escape($_POST['roleOption']);
	$id = escape($_REQUEST['admin_id']);

	$salt = GetSalt();
	$pass = $salt[0].$pass.$salt[1];
	$pass = hash("sha256", $pass);

	$user = str_replace(" ", "_", $user);

	$ret = Select("admin", "username='$user'");
	if (count($ret) > 0 && $ret[0]['admin_id'] != $id) {
		echo '
				<script type = "text/javascript">
					alert("Username already taken");
					window.location = "../Pages/Admin.php";
				</script>
			';
	}

	$ret = Update("admin", "username = '$user', password = '$pass', email = '$email', role = '$role'", "admin_id='$id'");
	echo '
		<script type = "text/javascript">
			window.location = "../Pages/Admin.php";
		</script>
	';