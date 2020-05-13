$(document).ready(function() {
	$('#new_password').on('input', function() {
		var re = new RegExp('^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*])(?=.{8,})');
		var pswd = $(this).val();
		if (pswd.length < 8) {
			$('#new_password').removeClass('valid').addClass('invalid');
			$('#error').removeClass('error').addClass('error_show');
		} else if (!re.test(pswd)) {
			$('#new_password').removeClass('valid').addClass('invalid');
			$('#error').removeClass('error').addClass('error_show');
		} else {
			$('#new_password').removeClass('invalid').addClass('valid');
			$('#error').removeClass('error_show').addClass('error');
		}
	});

	$('#change_pass').on('click', function(event) {
		event.preventDefault();
		var current_pass = $('#current_password').val();
		var new_pass = $('#new_password').val();
		var confirm_new_pass = $('#reent_new_password').val();
		var UserSessionName = document.getElementById('id-html').innerHTML;
		var re = new RegExp('^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*])(?=.{8,})');

		if (current_pass == '') {
			alert('Current Password required!!!');
		} else if (new_pass == '') {
			alert('New Password required!!!');
		} else if (new_pass.length < 8) {
			alert('New Password need at least 8 characters');
		} else if (!re.test(new_pass)) {
			alert('password is too weak!');
		} else if (confirm_new_pass == '') {
			alert('Re-entering new password is required!!!');
		} else if (new_pass == confirm_new_pass) {
			if (new_pass.length > 7) {
				$.ajax({
					url: 'dbOperations/db_reset_passwordStudent.php',
					method: 'POST',
					data: {
						current_pass: current_pass,
						new_pass: new_pass,
						UserSessionName: UserSessionName
					},
					success: function(msg) {
						alert(msg);
						location.reload(true);
					},
					error: function(error) {
						alert('Error changing password!!!' + error);
						location.reload(true);
					}
				});
			} else {
				alert('Minimum 8 characters required for the password!');
			}
		} else {
			alert("Two password fields didn't match!!!");
		}
	});

	$('#reent_new_password').on('input', function() {
		var pass = $('#new_password').val();
		var pswd = $(this).val();
		if (pass == pswd) {
			$('#reent_new_password').removeClass('invalid').addClass('valid');
		} else {
			$('#reent_new_password').removeClass('valid').addClass('invalid');
		}
	});
});
