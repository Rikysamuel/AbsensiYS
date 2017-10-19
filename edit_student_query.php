<?php
	require_once 'connect.php';
	$jemaat_panggilan = $_POST['jemaat_panggilan'];
	$firstname = $_POST['firstname'];
	$middlename = $_POST['middlename'];
	$lastname = $_POST['lastname'];
	$baptis = $_POST['baptis'];
	$komsel = $_POST['komsel'];
		$conn->query("UPDATE `student` SET `jemaat_panggilan` = '$jemaat_panggilan', `firstname` = '$firstname', `middlename` = '$middlename', `lastname` = '$lastname', `baptis` = '$baptis', `komsel` = '$komsel' WHERE `student_id` = '$_REQUEST[student_id]'") or die(mysqli_error());
		echo '
			<script type = "text/javascript">
				alert("Successfully Edited");
				window.location = "student.php";
			</script>
		';
