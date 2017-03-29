<div class="container">
	<h3>Accoutn info</h3>
	<form class="form-horizontal" method="post"
		action="/user/profilBearbeiten">

		<div class="form-group">
			<label class="col-lg-3 control-label">Email:</label>
			<div class="col-lg-8">
				<input class="form-control" id="accountBearbeitenEmail"
					name="accountBearbeitenEmail" type="text"
					onkeyup="accountBearbeitenUeberpruefung()"
					placeholder="<?php echo $_SESSION['email'];?>">
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-3 control-label">Benutzername:</label>
			<div class="col-md-8">
				<input class="form-control" type="text"
					id="accountBearbeitenBenutzername"
					name="accountBearbeitenBenutzername"
					onkeyup="accountBearbeitenUeberpruefung()"
					placeholder="<?php echo $_SESSION['benutzername'];?>">
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-3 control-label">neues Password:</label>
			<div class="col-md-8">
				<input class="form-control" name="accountBearbeitenPasswort"
					id="accountBearbeitenPasswort"
					onchange="accountBearbeitenUeberpruefung()" type="password">
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-3 control-label">neues Passwort Wiederholen:</label>
			<div class="col-md-8">
				<input class="form-control"
					id="accountBearbeitenPasswortWiederholen" type="password"
					onkeyup="accountBearbeitenUeberpruefung()"
					name="accountBearbeitenPasswortWiederholen">
			</div>
		</div>
		<div id="bearbeiteWarnung"></div>
		<div style="color: red; text-align:center;"id="warnung"></div>
		<div class="form-group">
			<label class="col-md-3 control-label"></label>
			<div class="col-md-8">
				<input type="submit" class="btn btn-primary"
					value="Änderungen Speichern"> <span></span> <a href="/"
					class="btn btn-info"
					style="background-color: white; color: black; border-color: black;">Abbrechen</a>
			</div>
	
	</form>
	<form class="form-horizontal form-group" method="post"
		action="/user/profilLoeschen">
		<button type="submit" class="btn btn-default"
			style="color: white; float: right; background-color: red">Profil
			Löschen</button>

	</form>
</div>
</div>

<hr>
<script>
function accountBearbeitenUeberpruefung() {
	document.getElementById("warnung").innerHTML = "";
	var name = document.getElementById("accountBearbeitenBenutzername").value;
	var email = document.getElementById("accountBearbeitenEmail").value; 
	var password1 = document.getElementById("accountBearbeitenPasswort").value;
	var password2 = document.getElementById("accountBearbeitenPasswortWiederholen").value;
	
	if(name.length < 2) {
		document.getElementById("warnung").innerHTML = "Der Benutzername ist zu kurz <br/>";
	}
	if(/^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(email) == false) {
		document.getElementById("warnung").innerHTML = document.getElementById("warnung").innerHTML + "E-Mail Adresse ist ungültig!<br/>";
	}
	if(password1 != password2) {
		document.getElementById("warnung").innerHTML = document.getElementById("warnung").innerHTML + "Passw&ouml;rter stimmen nicht überein!<br/>";
	}
}
</script>