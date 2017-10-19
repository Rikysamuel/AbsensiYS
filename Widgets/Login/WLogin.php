<div class = "row row-centered">
	<div class = "col-lg-2 col-centered"></div>
	<div class = "col-lg-2 col-centered"></div>
	<div class = "col-lg-4 col-centered">
		<div class = "panel panel-primary">
			<div class = "panel-heading">
				<h4>Admin Login</h4>
			</div>
			<div class = "panel-body">
				<form enctype = "multipart/form-data">
					<div id = "username_warning" class = "form-group">
						<label class = "control-label">Username:</label>
						<input type = "text" id = "username" class = "form-control" />
					</div>
					<div id = "password_warning" class = "form-group">
						<label class = "control-label">Password:</label>
						<input type = "password" maxlength = "12" id = "password" class = "form-control" />
					</div>
					<div id = "result"></div>
					<br />
					<button type = "button" class = "btn btn-primary btn-block" id = "login_admin"><span class = "glyphicon glyphicon-save"></span> Login</button>
				</form>
			</div>
		</div>
	</div>
</div>