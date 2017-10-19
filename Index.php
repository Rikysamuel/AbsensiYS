<?php
	session_start();
	if(!ISSET($_SESSION['username'])){
		header('location: Pages\Login.php');
	} else {
		header('location: Pages\Dashboard.php');
	}
?>