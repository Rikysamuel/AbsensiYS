<?php
	require_once '../Manager/DbManager.php';
	
	$id = escape($_REQUEST["admin_id"]);
	$ret = Delete("admin", "admin_id = '$id'");

	header('location: ../Pages/Admin.php');
