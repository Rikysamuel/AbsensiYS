<?php
	require_once '../Manager/DbManager.php';

	if (session_status() == PHP_SESSION_NONE) {
	    session_start();
	}

?>

<div class = "modal fade" id = "myModal" tabindex = "-1" role = "dialog" aria-labelledby = "myModallabel">
	<div class = "modal-dialog" role = "document">
		<div class = "modal-content panel-primary">
			<div class = "modal-header panel-heading">
				<button type = "button" class = "close" data-dismiss = "modal" aria-label = "Close"><span aria-hidden = "true">&times;</span></button>
				<h4 class = "modal-title" id = "myModallabel">Add new Admin</h4>
			</div>
			<form method = "POST" action = "../Utils/CreateAdmin.php" enctype = "multipart/form-data">
				<div class  = "modal-body">
					<div class = "form-group">
						<label>Username:</label>
						<input type = "text" required = "required" name = "username" class = "form-control" />
					</div>
					<div class = "form-group">
						<label>Password:</label>
						<input type = "password" maxlength = "22" required = "required" name = "password" class = "form-control" />
					</div>
					<div class = "form-group">
						<label>Email:</label>
						<input type = "text" name = "email" required = "required" class = "form-control" />
					</div>
					<div class = "form-group">
						<label>Role:</label>
						<select class="form-control" name="roleOption">
						<?php
							$result = Select("admin_roles");
							if (count($result) >0) {
								foreach ($result as &$res) {
									echo "<option value=".$res['id'].">".$res['Role']."</option>";
								}
							}
						?>
						</select>
					</div>
				</div>
				<div class = "modal-footer">
					<button  class = "btn btn-primary" name = "save"><span class = "glyphicon glyphicon-save"></span> Save</button>
				</div>
			</form>
		</div>
	</div>
</div>
<div class = "modal fade" id = "delete" tabindex = "-1" role = "dialog" aria-labelledby = "myModallabel">
	<div class = "modal-dialog" role = "document">
		<div class = "modal-content ">
			<div class = "modal-body">
				<center><label class = "text-danger">Are you sure you want to delete this record?</label></center>
				<br />
				<center><a class = "btn btn-danger remove_id" ><span class = "glyphicon glyphicon-trash"></span> Yes</a> <button type = "button" class = "btn btn-warning" data-dismiss = "modal" aria-label = "No"><span class = "glyphicon glyphicon-remove"></span> No</button></center>
			</div>
		</div>
	</div>
</div>
<div class = "modal fade" id = "edit_admin" tabindex = "-1" role = "dialog" aria-labelledby = "myModallabel">
	<div class = "modal-dialog" role = "document">
		<div class = "modal-content panel-warning">
			<div class = "modal-header panel-heading">
				<button type = "button" class = "close" data-dismiss = "modal" aria-label = "Close"><span aria-hidden = "true">&times;</span></button>
				<h4 class = "modal-title" id = "myModallabel">Edit Admin</h4>
			</div>
			<div id = "edit_query"></div>
		</div>
	</div>
</div>
<div class = "alert alert-info"> Admin Listing</div>
<div class = "well col-lg-12">
	<button type = "button" class = "btn btn-success" data-target = "#myModal" data-toggle = "modal"><span class = "glyphicon glyphicon-plus"></span> Add new</button>
	<br />
	<br />
	<table id = "table" class = "table table-bordered">
		<thead>
			<tr class = "alert-info">
				<th>Username</th>
				<th>Last Login Time</th>
				<th>Is Locked Out</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$result = Select("admin");
			if (count($result) > 0) {
				foreach($result as &$res){
			?>
			<tr>
				<td><?php echo $res['username']?></td>
				<td><?php echo $res['last_login']?></td>
				<td><?php echo ($res['is_locked_out'] == "t") ? "True" : "False"?></td>
				<td>
					<?php
						$user = $_SESSION["username"];
						if ($user != $res['username']) {
							echo "<a class = 'btn btn-danger radmin_id' name = '".$res['admin_id']."' href = '#'' data-toggle = 'modal' data-target = '#delete'>
									<span class = 'glyphicon glyphicon-remove'></span>
								</a> 
								<a class = 'btn btn-warning  eadmin_id' name = '".$res['admin_id']."' href = '#' data-toggle = 'modal' data-target = '#edit_admin'>
									<span class = 'glyphicon glyphicon-edit'></span>
								</a>";
						} else {
							echo "<a class = 'btn btn-danger' href = '#' disabled>
									<span class = 'glyphicon glyphicon-remove'></span>
								</a> 
								<a class = 'btn btn-warning ' href = '#' disabled>
									<span class = 'glyphicon glyphicon-edit'></span>
								</a>";
						}
					?>
				</td>
			</tr>
			<?php
			}
		}
		?>
	</tbody>
</table>
<br />
<br />
<br />
</div>

<script src = "../html/js/jquery.dataTables.js"></script>
<script type = "text/javascript">
	$(document).ready(function(){
		$('#table').DataTable();
	});
</script>
<script type = "text/javascript">
	$(document).ready(function(){

		$(document).on("click", ".radmin_id", function () {
			$admin_id = $(this).attr('name');
			$(document).on("click", ".remove_id", function () {
				window.location = '../Utils/DeleteAdmin.php?admin_id=' + $admin_id;
			});
		});

		$(document).on("click", ".eadmin_id", function () {
			$admin_id = $(this).attr('name');
			$('#edit_query').load('../Widgets/Administration/WAdminEdit.php?admin_id=' + $admin_id);
		});

	});
</script>