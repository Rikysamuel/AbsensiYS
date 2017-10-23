<?php
	$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

	$server = $url["host"];
	$database = substr($url["path"], 1);
	$username = $url["user"];
	$password = $url["pass"];

	$maxLoginAttempt = 6;

	$salt_front = "7c944ccd1148e97";
	$salt_back = "63479ad69a090";