<?php
	$server = "host = 127.0.0.1 port = 5432";
	$database = "dbname = absensi";
	$username = "user = postgres";
	$password = "password = admin";

	// $url = parse_url(getenv("CLEARDB_DATABASE_URL"));

	// $server = $url["host"];
	// $database = substr($url["path"], 1);
	// $username = $url["user"];
	// $password = $url["pass"];

	$maxLoginAttempt = 6;

	$salt_front = "7c944ccd1148e97";
	$salt_back = "63479ad69a090";