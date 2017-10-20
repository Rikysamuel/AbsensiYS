<?php
	require_once '../Manager/DbManager.php';

	if(ISSET($_POST['save'])){
		$bloodList = array("A", "B", "O", "AB");
		$yesNo = array("1", "0");

		$fullname = escape($_POST['fullname']);
		$nick_name = escape($_POST['nick_name']);
		$hobby = escape($_POST['hobby']);
		$address = escape($_POST['address']);
		$birth_place = escape($_POST['birth_place']);
		$birth_date = escape($_POST['birth_date']);
		$status = escape($_POST['status']);
		$phone = escape($_POST['phone']);
		$line = escape($_POST['line']);
		$insta = escape($_POST['insta']);
		$fam_phone = escape($_POST['fam_phone']);
		$service = escape($_POST['service']);
		$komsel = escape($_POST['komsel']);

		$blodType = escape($_POST['blodType']);
		if (!in_array($blodType, $bloodList)) {
			echo '
				<script type = "text/javascript">
					alert("Blood type not valid.");
					window.location = "../Pages/Jemaat.php";
				</script>
			';
			return;
		}

		$PA = escape($_POST['PA']);
		if (!in_array($PA, $yesNo)) {
			echo '
				<script type = "text/javascript">
					alert("PA not valid.");
					window.location = "../Pages/Jemaat.php";
				</script>
			';
			return;
		}

		$baptism = escape($_POST['baptism']);
		if (!in_array($baptism, $yesNo)) {
			echo '
				<script type = "text/javascript">
					alert("Baptism not valid.");
					window.location = "../Pages/Jemaat.php";
				</script>
			';
			return;
		}

		$ret = Insert("jemaat", "('', '$fullname','$nick_name', '$blodType', '$hobby', '$address', '$birth_place', '$birth_date', '$status', '$phone', '$line', '$insta', '$fam_phone', '$baptism', '$service', '$PA', '$komsel')");
		echo '
			<script type = "text/javascript">
				window.location = "../Pages/Jemaat.php";
			</script>
		';
	}	