<?php
	require_once '../Manager/DbManager.php';
	
	$id = escape($_REQUEST["attendance_id"]);
	$ret = Delete("attendance", "attendance_id = '$id'");

	header('location: ../Pages/Attendance.php');