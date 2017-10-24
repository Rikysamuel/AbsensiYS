<?php

	$hostname = $_SERVER['HTTP_HOST'];
	if (strpos($hostname, 'localhost') !== false) {
		include 'ConstantLinker.LOCAL.php';
	} else {
		include 'ConstantLinker.WEB.php';
	}