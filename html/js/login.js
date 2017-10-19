$(document).ready(function(){
	var error_result = $('<center><label class = "text-danger">Invalid username or password</label></center>');
	var error_result2 = $('<center><label class = "text-danger">Please complete the required field</label></center>');
	var error_result_locked = $('<center><label class = "text-danger">Your account has been locked due to maximum login attempt.<br /> Please contact your administator.</label></center>');
	var loading = $('<center><img src = "../html/images/499.gif" height = "15px" /></center>');
	$('#login_admin').click(function(){
		error_result.remove();
		error_result2.remove();
		error_result_locked.remove();
		$("#username").focus(function(){
			$("#username_warning").removeClass('has-feedback has-error');
			$('#username_warning').find('span').remove();
		});
		$('#password').focus(function(){
			$('#password_warning').removeClass('has-feedback has-error');
			$('#password_warning').find('span').remove();
		});
		var username = $('#username').val();
		var password = $('#password').val();
		password = sha256(password); // hashed 1 time
		if(username == "" && password == ""){
			$('#username_warning').addClass('has-feedback has-error');
			$('<span class = "glyphicon glyphicon-remove form-control-feedback"></span>').appendTo('#username_warning');
			$('#password_warning').addClass('has-feedback has-error');
			$('<span class = "glyphicon glyphicon-remove form-control-feedback"></span>').appendTo('#password_warning');
			error_result2.appendTo('#result');
		}else{
			loading.fadeIn().appendTo('#result');
			$(this).attr('disabled', 'disabled');
			error_result2.remove();
			setTimeout(function(){
				loading.remove();
				$.post('../Utils/Login.php', {username: username, password: password},
					function(result){
						if(result == 'success'){
							$.post("../Utils/UpdateLastLogin.php", {username: username});
							window.location = 'AttendanceListing.php';
						}else{
							if (result == 'locked') {
								error_result_locked.fadeIn().appendTo('#result');
								$('#login_admin').removeAttr('disabled');
							} else {
								$.post("../Utils/UpdateLoginAttempt.php", {username: username});
								error_result.fadeIn().appendTo('#result');
								$('#login_admin').removeAttr('disabled');
							}
						}
					}
				);
			}, 3000);	
		}
	});
});