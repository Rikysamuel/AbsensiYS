<?php
	require_once '../Manager/DbManager.php';

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

	$id = escape($_REQUEST['jemaat_id']);

	$ret = Update("jemaat", "nama_lengkap = '$fullname', nama_panggilan = '$nick_name', golongan_darah = '$blodType', hobi = '$hobby', alamat = '$address', tempat_lahir = '$birth_place', tanggal_lahir = '$birth_date', status = '$status', nomor_telepon = '$phone', ID_line = '$line', instagram = '$insta', kontak_keluarga = '$fam_phone', baptisan_air = '$baptism', pelayanan = '$service', PA = '$PA', komsel = '$komsel'", "jemaat_id=$id");

	echo '
		<script type = "text/javascript">
			window.location = "../Pages/Jemaat.php";
		</script>
	';
