$(document).ready(function() {
	var changeBtnpp = document.getElementById('change-pp');
	var modalpp = document.getElementById('modal-pp');
	var changeBtnInfo = document.getElementById('change-Info');
	var modalInfo = document.getElementById('modal-Info');
	var changeBtnPassword = document.getElementById('change-password');
	var modalpassword = document.getElementById('modal-password');
	var exitmodalpassword = document.getElementById('password-reset-abort');

	changeBtnpp.onclick = function() {
		modalpp.style.display = 'block';
	};

	changeBtnInfo.onclick = function() {
		modalInfo.style.display = 'block';
	};
	changeBtnPassword.onclick = function() {
		modalpassword.style.display = 'block';
	};

	exitmodalpassword.onclick = function() {
		modalpassword.style.display = 'none';
		alert("data didn't updated!");
	};

	window.onclick = function(event) {
		if (event.target == modalpp || event.target == modalInfo) {
			modalpp.style.display = 'none';
			modalInfo.style.display = 'none';
			modalpassword.style.display = 'none';
			alert("data didn't updated!");
		}
	};
});
