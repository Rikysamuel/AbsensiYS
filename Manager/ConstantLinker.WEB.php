<?php
	include $_SERVER["DOCUMENT_ROOT"].'/Manager/Constants.php';

	$url = parse_url(getenv('DATABASE_URL'));

	$server = "host = ".$url["host"]." port = ".$url["port"];
	$database = "dbname = ".substr($url["path"], 1);
	$username = "user = ".$url["user"];
	$password = "password = ".$url["pass"];