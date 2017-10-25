<?php

	$hostname = $_SERVER['HTTP_HOST'];
	if (strpos($hostname, 'localhost') !== false) {
		include 'Constant.LOCAL.php';
	} else {
		include 'Constant.WEB.php';
	}