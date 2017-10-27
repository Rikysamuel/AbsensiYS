<?php
	ob_start();
	require("../Widgets/Checker/WInverseAttendance.php");
	$content = ob_get_clean();
	include('../Template/InnerMaster.php');
?>