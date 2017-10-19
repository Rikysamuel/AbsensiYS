<?php
	ob_start();
	require("../Widgets/Checker/WChecker.php");
	$content = ob_get_clean();
	include('../Template/InnerMaster.php');
?>