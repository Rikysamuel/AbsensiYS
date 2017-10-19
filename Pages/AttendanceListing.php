<?php
	ob_start();
	require("../Widgets/Checker/WCheckerListing.php");
	$content = ob_get_clean();
	include('../Template/InnerMaster.php');
?>