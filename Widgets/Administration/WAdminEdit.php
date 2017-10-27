<?php
	require_once '../../Manager/DbManager.php';

	$id = escape($_REQUEST["admin_id"]);
	$ret = Select("admin", "admin_id='$id'");
?>
<form method = "POST" action = "../Utils/EditAdmin.php?admin_id=<?php echo $id?>" enctype = "multipart/form-data">
	<div class  = "modal-body">
		<div class = "form-group">
			<label>Username:</label>
			<input type = "text" required = "required" name = "username" class = "form-control" value="<?php echo $ret[0]['username']?>"/>
		</div>
		<div class = "form-group">
			<label>Password:</label>
			<input type = "password" maxlength = "22" required = "required" name = "password" class = "form-control" value="<?php echo GetDefaultPass() ?>"/>
		</div>
		<div class = "form-group">
			<label>Email:</label>
			<input type = "text" name = "email" required = "required" class = "form-control" value="<?php echo $ret[0]['email']?>"/>
		</div>
		<div class = "form-group">
			<label>Role:</label>
			<select class="form-control" name="roleOption">
			<?php
				$result = Select("admin_roles");
				if (count($result) >0) {
					foreach ($result as &$res) {
						if ($res['id'] == $ret[0]['role']) {
							echo "<option value=".$res['id']." selected='selected'>".$res['Role']."</option>";
						} else {
							echo "<option value=".$res['id'].">".$res['Role']."</option>";
						}
					}
				}
			?>
			</select>
		</div>
	</div>
	<div class = "modal-footer">
		<button  class = "btn btn-warning"  name = "edit_admin"><span class = "glyphicon glyphicon-edit"></span> Save Changes</button>
	</div>
</form>	