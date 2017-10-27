<?php
	require_once '../../Manager/DbManager.php';

	$id = escape($_REQUEST["title_id"]);
	$ret = Select("attendance_listing", "id='$id'");
?>
<form method = "POST" action = "../Utils/EditTitle.php?title_id=<?php echo $id?>" enctype = "multipart/form-data">
	<div class  = "modal-body">
		<div class = "form-group">
			<label>Title:</label>
			<input type = "text" required = "required" name = "title" class = "form-control" value="<?php echo $ret[0]['title']?>"/>
		</div>
	</div>
	<div class = "modal-footer">
		<button  class = "btn btn-warning"  name = "edit_admin"><span class = "glyphicon glyphicon-edit"></span> Save Changes</button>
	</div>
</form>	