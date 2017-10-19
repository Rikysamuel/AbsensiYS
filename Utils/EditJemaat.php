<?php
	require_once '../Manager/DbManager.php';

	$jemaat_panggilan = escape($_POST['jemaat_panggilan']);
	$firstname = escape($_POST['firstname']);
	$middlename = escape($_POST['middlename']);
	$lastname = escape($_POST['lastname']);
	$baptis = escape($_POST['baptis']);
	$komsel = escape($_POST['komsel']);
	$id = escape($_REQUEST['student_id']);

	$ret = Update("jemaat", "jemaat_panggilan = '$jemaat_panggilan', firstname = '$firstname', middlename = '$middlename', lastname = '$lastname', baptis='$baptis', komsel='$komsel'", "jemaat_id=$id");
	echo '
		<script type = "text/javascript">
			window.location = "../Pages/Jemaat.php";
		</script>
	';
