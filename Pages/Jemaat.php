<?php
	ob_start();
	require("../Widgets/Jemaat/WJemaat.php");
	$content = ob_get_clean();
	include('../Template/InnerMaster.php');
?>