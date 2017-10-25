<?php
	ob_start();
	require("../Widgets/Profile/WProfile.php");
	$content = ob_get_clean();
	include('../Template/InnerMaster.php');
?>