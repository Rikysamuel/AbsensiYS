<?php
	require_once '../Manager/DbManager.php';
	
	$id = escape($_REQUEST["admin_id"]);
	$ret = Update("admin", "is_locked_out", "FALSE", "admin_id = '$id'");

	header('location: ../Pages/Admin.php');
