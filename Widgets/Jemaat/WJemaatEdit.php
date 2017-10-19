<?php
	require_once '../../Manager/DbManager.php';
	
	$id = escape($_REQUEST["jemaat_id"]);
	$ret = Select("jemaat", "jemaat_id='$id'");
?>

<form method = "POST" action = "../Utils/EditJemaat.php?student_id=<?php echo $id?>" enctype = "multipart/form-data">
	<div class  = "modal-body">
		<div class = "form-group">
			<label>Panggilan:</label>
			<input type = "text" name = "jemaat_panggilan" value = "<?php echo $ret[0]['jemaat_panggilan']?>" required = "required" class = "form-control" />
		</div>
		<div class = "form-group">
			<label>Firstname:</label>
			<input type = "text" name = "firstname" value = "<?php echo $ret[0]['firstname']?>" required = "required" class = "form-control" />
		</div>
		<div class = "form-group">
			<label>Middlename:</label>
			<input type = "text" name = "middlename" value = "<?php echo $ret[0]['middlename']?>" placeholder = "(Optional)" class = "form-control" />
		</div>
		<div class = "form-group">
			<label>Lastname:</label>
			<input type = "text" name = "lastname" value = "<?php echo $ret[0]['lastname']?>" required = "required" class = "form-control" />
		</div>
		<div class = "form-group">
			<label>Baptis</label>
			<input type = "text" value = "<?php echo $ret[0]['baptis']?>" name = "baptis" required = "required" class = "form-control" />
		</div>
		<div class = "form-group">
			<label>Komsel</label>
			<input type = "text" name = "komsel" required = "required" value = "<?php echo $ret[0]['komsel']?>" class = "form-control" />
		</div>
	</div>
	<div class = "modal-footer">
		<button  class = "btn btn-warning"  name = "edit_admin"><span class = "glyphicon glyphicon-edit"></span> Save Changes</button>
	</div>
</form>	