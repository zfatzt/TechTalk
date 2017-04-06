<div class="container">
	<h3>Accoutn info</h3>
	<form class="form-horizontal" method="post"
		action="/user/profilBearbeiten">

		<div class="form-group">
			<label class="col-lg-3 control-label">Email:</label>
			<div class="col-lg-8">
				<input class="form-control" id="email"
					name="accountBearbeitenEmail" type="text" onkeyup="ueberpruefung()"
					value="<?php echo $_SESSION['email'];?>">
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-3 control-label">Benutzername:</label>
			<div class="col-md-8">
				<input class="form-control" type="text"
					id="benutzername"
					name="accountBearbeitenBenutzername" onkeyup="ueberpruefung()"
					value="<?php echo $_SESSION['benutzername'];?>">
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-3 control-label">neues Password:</label>
			<div class="col-md-8">
				<input class="form-control" name="accountBearbeitenPasswort"
					value=<?php $_SESSION['passwort']?>
					id="password" onkeyup="ueberpruefung()"
					type="password">
			</div>
		</div>
		<div class="form-group">
			<label class="col-md-3 control-label">neues Passwort Wiederholen:</label>
			<div class="col-md-8">
				<input class="form-control"
					id="reenterpassword" type="password"
					onkeyup="ueberpruefung()"
					name="accountBearbeitenPasswortWiederholen">
			</div>
		</div>
		<div id="bearbeiteWarnung"></div>
		<div div class="alert alert-warning" role="alert" style="text-align: center" id="warnung"></div>
		<div class="form-group">
			<label class="col-md-3 control-label"></label>
			<div class="col-md-8">
				<input type="submit" class="btn btn-primary"
					value="Änderungen Speichern"> <span></span> <a href="/"
					class="btn btn-info"
					style="background-color: white; color: black; border-color: black;">Abbrechen</a>
			</div>
		</div>
	</form>
	<form class="form-horizontal form-group" method="post"
		action="/user/profilLoeschen">
		<button type="submit" class="btn btn-default"
			style="color: white; float: right; background-color: red">Profil
			Löschen</button>
	</form>
</div>
<hr>
