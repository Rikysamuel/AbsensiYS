<?php
	require_once '../Manager/DbManager.php';

	if(ISSET($_POST['save'])){
		$jemaat_panggilan = escape($_POST['jemaat_panggilan']);
		$firstname = escape($_POST['firstname']);
		$middlename = escape($_POST['middlename']);
		$lastname = escape($_POST['lastname']);
		$baptis = escape($_POST['baptis']);
		$komsel = escape($_POST['komsel']);

		$ret = Insert("jemaat", "('', '$jemaat_panggilan','$firstname', '$middlename', '$lastname', '$baptis', '$komsel')");
		echo '
			<script type = "text/javascript">
				window.location = "../Pages/Jemaat.php";
			</script>
		';
	}	