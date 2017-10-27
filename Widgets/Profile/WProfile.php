<?php
	require_once '../Manager/DbManager.php';

	if (session_status() == PHP_SESSION_NONE) {
	    session_start();
	}
?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

<div class = "modal fade" id = "editData" tabindex = "-1" role = "dialog" aria-labelledby = "myModallabel">
	<div class = "modal-dialog" role = "document">
		<div class = "modal-content panel-warning">
			<div class = "modal-header panel-heading">
				<button type = "button" class = "close" data-dismiss = "modal" aria-label = "Close"><span aria-hidden = "true">&times;</span></button>
				<h4 class = "modal-title" id = "myModallabel">Edit Profile</h4>
			</div>
			<?php
				$user_id = $_SESSION['admin_id'];
				$ret = (array) Select("admin", "admin_id = '$user_id'");
			?>
			<form method = "POST" action = "../Utils/EditProfile.php?id=<?php echo $user_id?>" enctype = "multipart/form-data">
				<div class  = "modal-body">
					<div class = "form-group">
						<label>Username:</label>
						<input type = "text" required = "required" name = "username" class = "form-control" value="<?php echo $ret[0]['username']?>" disabled/>
					</div>
					<div class = "form-group">
						<label>Password:</label>
						<input type = "password" maxlength = "22" required = "required" name = "password" class = "form-control"/>
					</div>
					<div class = "form-group">
						<label>Email:</label>
						<input type = "text" name = "email" required = "required" class = "form-control" value="<?php echo $ret[0]['email']?>"/>
					</div>
					<div class = "form-group">
						<label>Role:</label>
						<select class="form-control" name="roleOption" disabled>
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
		</div>
	</div>
</div>

<div class="row">
	<div class="panel panel-info">
		<div class="panel-body">
			<div class="row">
				<div class="col-md-3 col-lg-3 " align="center"> 
					<!-- Prof pic -->
					<!-- <img alt="User Pic" src="http://babyinfoforyou.com/wp-content/uploads/2014/10/avatar-300x300.png" class="img-circle img-responsive">  -->
				</div>
				<div class=" col-md-9 col-lg-9 "> 
					<?php
						$user = $_SESSION['username'];
						$result = (array) Select("admin", "username = '$user'");
					?>
					<table class="table table-user-information">
						<tbody>
							<tr>
								<td>Username:</td>
								<td><?php echo $result[0]['username']; ?></td>
							</tr>
							<tr>
								<td>Role:</td>
								<td>
									<?php
										$roleId = $result[0]['role'];
										$role = (array) Select("admin_roles", "id = '$roleId'");
										echo $role[0]['Role'];
									?>
								</td>
							</tr>
							<tr>
								<td>Password</td>
								<td>*****</td>
							</tr>

							<tr>
							<tr>
								<td>Email</td>
								<td><a href="mailto:<?php echo $result[0]['email']; ?>"><?php echo $result[0]['email']; ?></a></td>
							</tr>
							<tr>
								<td>Last Login</td>
								<td><?php echo $result[0]['last_login']; ?></td>
							</tr>
						</tbody>
					</table>

					<br />
					&nbsp;
					<button type = "button" class = "btn btn-warning" data-target = "#editData" data-toggle = "modal"><span class = "glyphicon glyphicon-pencil"></span> Edit Data</button>
				</div>
			</div>
		</div>
	</div>
</div>

<script src = "../html/js/jquery.dataTables.js"></script>
<script type = "text/javascript">
	$(document).ready(function(){
		$('#table').DataTable();
	});
</script>
<script type = "text/javascript">
	$(document).ready(function(){

		$(document).on("click", ".eadmin_id", function () {
			$admin_id = $(this).attr('name');
			$('#edit_query').load('../Widgets/Administration/WAdminEdit.php?admin_id=' + $admin_id);
		});

	});
</script>