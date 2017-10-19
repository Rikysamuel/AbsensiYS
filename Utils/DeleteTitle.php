<?php
	require_once '../Manager/DbManager.php';
	
	$id = escape($_REQUEST["id"]);
	$ret = Delete("attendance_listing", "id = '$id'");

	header('location: ../Pages/AttendanceListing.php');