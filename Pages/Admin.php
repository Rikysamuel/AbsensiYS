<?php
	ob_start();
	require("../Widgets/Administration/WAdmin.php");
	$content = ob_get_clean();
	include('../Template/InnerMaster.php');
?>