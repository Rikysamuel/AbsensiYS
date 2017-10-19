<?php
	require_once '../Manager/DbManager.php';
	if(!ISSET($_GET['id'])) {
		header('location: ../Pages/AttendanceListing.php');
	}
?>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<div class = "container-fluid">
	<?php
		$id = $_GET['id'];
		$ret = Select("attendance_listing", "id='$id'");
		if (count($ret) > 0) {
			echo "<label><h3 id='titleId'>Title: ".$ret[0]["title"]."</h3></label>";
		}
	?>
	<br />
	<br />
	<br />
	<br />
	<br />
	<br />
	<div class = "col-lg-3"></div>
	<div class = "col-lg-6 well">
		<div class="col-md-2"></div>
		<div class="col-md-8">
		<form action="POST">
			<div class = "ui-widget">
				<h1>Name:</h1>
				<input type="text" id="name" class="form-control" required="required" placeholder="Please Enter Some Name"/>
				<br />
				<br />
				<div id = "result"></div>
				<br />
				<button type = "button" id = "check" class = "btn btn-primary btn-block" onclick="Check()">Go!</button>
			</div>
		</form>
		</div>
		<div class="col-md-2"></div>
	</div>
</div>

<script>
	 var nameListLabel = [ ];
	 var nameListValue = { };
	<?php
		$ret = Select("jemaat");
		if (count($ret) > 0) {
			for ($i = 0; $i < count($ret); $i++) {
				echo "nameListLabel.push('".$ret[$i]['firstname']." ".$ret[$i]['lastname']."');";
				echo "nameListValue[nameListLabel[".$i."]] = ".$ret[$i]['jemaat_id'].";";
			}
		}
	?>
	
	$( function() {
		$( "#name" ).autocomplete({
		  source: nameListLabel
	})});


	function Check() {
		var loading = $('<center><img src = "../html/images/499.gif" height = "15px" /></center>');
		var success = $('<center><label class = "text-success">Success!</label></center>');
		var duplicate = $('<center><label class = "text-success">The name has previously marked for attendance</label></center>');
		var Unknown = $('<center><label class = "text-danger">Name is not registered as a member of Youth Shalom. <br />Please register the name first.</label></center>');
		var General = $('<center><label class = "text-danger">Error!</label></center>');

		$("#check").attr('disabled', 'disabled');
		$("#result").empty();

		var jemaatId = nameListValue[$("#name").val()];
		var titleId = window.location.search.substring(4);
		if (typeof jemaatId != 'undefined') {
			loading.fadeIn().appendTo('#result');
			setTimeout(function(){
				loading.remove();
				$("#check").removeAttr('disabled');
				
				$.post('../Utils/Check.php', {id: jemaatId, title: titleId},
					function(result){
						if(result == 'success'){
							success.fadeIn().appendTo('#result');
							$('#check').removeAttr('disabled');
						} else{
							if (result == 'duplicate') {
								duplicate.fadeIn().appendTo('#result');
								$('#check').removeAttr('disabled');
							} else {
								if (result == 'unknown') {
									Unknown.fadeIn().appendTo('#result');
									$('#check').removeAttr('disabled');
								} else {
									General.fadeIn().appendTo('#result');
									$('#check').removeAttr('disabled');
								}
							}
						}
					}
				);

				$("#name").val("");
			}, 3000);	
		} else {
			Unknown.fadeIn().appendTo('#result');
			$('#check').removeAttr('disabled');
		}
	}
</script>