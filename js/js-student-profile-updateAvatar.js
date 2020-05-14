// manipulating profile picture
$(document).ready(function() {
	var UserSessionName = document.getElementById('id-html').innerHTML;
	// after loading html page update profile picture
	$.ajax({
		type: 'POST',
		url: '/nts_galle-master/dbOperations/db_load_profilePicture.php',
		data: {
			// send this variable to server to identify user to database manipulate
			UserSessionName: UserSessionName
		},
		dataType: 'JSON',
		success: function(data) {
			var profPicDir = data[0];
			if (profPicDir == '') {
				$('img').attr('src', './img/empty-pp.png');
			} else {
				$('img').attr('src', './profile-pictures/' + profPicDir);
			}
		}
	});

	// after press save button in profile-picture area picture send to the database
	$('#save-img').click(function(e) {
		e.preventDefault(); //this prevent reloading web page when submitting form.It's prevent default function of event(submit)
		var fd = new FormData();
		var imageFile = $('#image-file')[0].files[0];
		var UserSessionName = document.getElementById('id-html').innerHTML;
		fd.append('imageFile', imageFile);
		fd.append('UserSessionName', UserSessionName);

		$.ajax({
			type: 'POST',
			url: '/nts_galle-master/dbOperations/db_update_profilePicture.php',
			data: fd,
			processData: false,
			contentType: false,

			success: function(data) {
				var profPicDir = data;
				if (profPicDir == '') {
					$('img').attr('src', './img/empty-pp.png');
				} else {
					$('img').attr('src', profPicDir);
				}

				var modalpp = document.getElementById('modal-pp');
				modalpp.style.display = 'none';
				location.reload(true);

			},
			error: function(error) {
				alert(error);
			}
		});
	});
});
