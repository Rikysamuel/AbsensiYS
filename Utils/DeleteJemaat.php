<?php
	require_once '../Manager/DbManager.php';
	
	$id = escape($_REQUEST["jemaat_id"]);
	$ret = Delete("jemaat", "jemaat_id = '$id'");

	header('location: ../Pages/Jemaat.php');