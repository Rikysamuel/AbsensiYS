<?php
	ob_start();
	require("../Widgets/Login/WLogin.php");
	$content = ob_get_clean();
	include('../Template/LoginMaster.php');
?>