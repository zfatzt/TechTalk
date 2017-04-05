function logout() {
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open('GET', '/logout/', true);
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4) {
			if (xmlhttp.status == 200) {

			}
		}
	};
	xmlhttp.send(null);
}

/* clientseitige überprüfung von eingaben & Validierungen */
function ueberpruefung() {
	document.getElementById("warnung").innerHTML = "";
	var name = document.getElementById("benutzername").value;
	var email = document.getElementById("email").value;
	var password1 = document.getElementById("password").value;
	var password2 = document.getElementById("reenterpassword").value;

	if (name.length < 2) {
		document.getElementById("warnung").innerHTML = "Der Benutzername ist zu kurz <br/>";
	}

	if (/^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/
			.test(email) == false) {
		document.getElementById("warnung").innerHTML = document
				.getElementById("warnung").innerHTML
				+ "E-Mail Adresse ist ungültig!<br/>";
	}
	if (password1 != password2 && password1 != false) {
		document.getElementById("warnung").innerHTML = document
				.getElementById("warnung").innerHTML
				+ "Passwörter stimmen nicht überein!<br/>";
	}
	if (password1.length < 5) {
		document.getElementById("warnung").innerHTML = document
				.getElementById("warnung").innerHTML
				+ "Passwort muss mindestens 5 Zeichen lang sein!<br/>";
	}
}
