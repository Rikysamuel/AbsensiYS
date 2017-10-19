<?php
	require_once '../Manager/DbManager.php';

	if(ISSET($_POST['save'])) {
		$user = escape($_POST['username']);
		$pass = hash("sha256", escape($_POST['password']));
		$email = escape($_POST['email']);
		$role = escape($_POST['roleOption']);

		$salt = GetSalt();
		$pass = $salt[0].$pass.$salt[1];
		$pass = hash("sha256", $pass);

		$user = str_replace(" ", "_", $user);
		$result = Select("admin", "username='$user'");
		if (count($result) > 0) {
			echo '
				<script type = "text/javascript">
					alert("Username already taken");
					window.location = "../Pages/Dashboard.php";
				</script>
			';
		} else {
			$ret = Insert("admin", "('', '$role', '$user', '$pass', '$email', 0, NULL, 0)");
			if ($ret == "OK") {
				echo '
					<script type = "text/javascript">
						window.location = "../Pages/Admin.php";
					</script>
				';
			} else {
				echo '
					<script type = "text/javascript">
						alert("Error Creating Record");
						window.location = "../Pages/Admin.php";
					</script>
				';
			}
		}
	}