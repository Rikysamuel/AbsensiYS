<?php
	include $_SERVER["DOCUMENT_ROOT"].'/Manager/Constants.php';

	$url = parse_url(getenv('DATABASE_URL'));

	$server = "host = ".$url["host"]." port = ".$url["port"];
	$database = "dbname = ".$url;
	$username = "user = ".$["user"];
	$password = "password = ".$["pass"];