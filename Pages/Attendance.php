<?php
	ob_start();
	require("../Widgets/Checker/WAttendanceListing.php");
	$content = ob_get_clean();
	include('../Template/InnerMaster.php');
?>