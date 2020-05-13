function resizeInfoAreaUp() {
	document.getElementById('info-tab').style.marginLeft = '106px';
}
function resizeInfoAreaDown() {
	document.getElementById('info-tab').style.marginLeft = '0px';
}

function showContent(evt, tabname) {
	var i, tablinks, tabcontent;
	tabcontent = document.getElementsByClassName('tabContent');
	for (i = 0; i < tabcontent.length; i++) {
		tabcontent[i].style.display = 'none';
	}
	tablinks = document.getElementsByClassName('tablink');
	for (i = 0; i < tablinks.length; i++) {
		tablinks[i].className = tablinks[i].className.replace(' active', '');
	}
	document.getElementById(tabname).style.display = 'flex';
	evt.currentTarget.className += ' active';
}

function showPasswordReset(evt, tabname) {
	var i, tablinks, tabcontent;
	tabcontent = document.getElementsByClassName('password-reset-content');
	for (i = 0; i < tabcontent.length; i++) {
		tabcontent[i].style.display = 'none';
	}
	document.getElementById(tabname).style.display = 'flex';
}

function hidePasswordReset(evt, tabname) {
	var i, tablinks, tabcontent;
	tabcontent = document.getElementsByClassName('password-reset-content');
	for (i = 0; i < tabcontent.length; i++) {
		tabcontent[i].style.display = 'none';
	}
}
