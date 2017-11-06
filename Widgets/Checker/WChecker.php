<?php
	require_once '../Manager/DbManager.php';
	if(!ISSET($_GET['id'])) {
		header('location: ../Pages/AttendanceListing.php');
	}

	$id = $_GET['id'];
?>

<div class = "modal fade" id = "add_jemaat" tabindex = "-1" role = "dialog" aria-labelledby = "myModallabel">
	<div class = "modal-dialog" role = "document">
		<div class = "modal-content panel-primary">
			<div class = "modal-header panel-heading">
				<button type = "button" class = "close" data-dismiss = "modal" aria-label = "Close"><span aria-hidden = "true">&times;</span></button>
				<h4 class = "modal-title" id = "myModallabel">Add New</h4>
			</div>
			<form method = "POST" action = "../Utils/CreateJemaatTemp.php" enctype = "multipart/form-data">
				<div class  = "modal-body">
					<div class = "form-group">
						<label>Name:</label>
						<input type = "text" name = "name" required = "required" class = "form-control" />
						<input type="hidden" name = "titleId" value='<?php echo "$id"; ?>'>
					</div>
				</div>
				<div class = "modal-footer">
					<button  class = "btn btn-primary" name = "save"><span class = "glyphicon glyphicon-save"></span> Save</button>
				</div>
			</form>
		</div>
	</div>
</div>

<div class = "container-fluid">
	<br />
	<br />
	<br />
	<div>
		<div class = "col-lg-3"></div>
		<div class= "col-lg-6">
			<div class="pull-right">
				<button class = "btn btn-success" type = "button" href = "#" data-toggle = "modal" data-target = "#add_jemaat"><span class = "glyphicon glyphicon-plus"></span> Add new </button>
			</div>
		</div>
		<div class="col-lg-3"></div>
	</div>
	<br />
	<br />
	<br />
	<div>
		<div class = "col-lg-3"></div>
		<div class = "col-lg-6 well">
			<form action="POST">
				<div class = "ui-widget">
					<?php
						$ret = Select("attendance_listing", "id='$id'");
						if (count($ret) > 0) {
							echo "<label><h3 id='titleId'>Title: ".$ret[0]["title"]."</h3></label>";
						}
					?>
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
			// full name
			for ($i = 0; $i < count($ret); $i++) {
				echo "nameListLabel.push('".$ret[$i]['nama_lengkap']." (".$ret[$i]['nama_panggilan'].")');";
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