<!-- Modal -->
<div class="modal fade bs-modal-sm" id="myModal" tabindex="-1"
	role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<br>
			<div class="bs-example bs-example-tabs">
				<ul id="myTab" class="nav nav-tabs">
					<li class="<?php if ($tablogin) echo 'active' ?>"><a href="#signin"
						data-toggle="tab">Anmelden</a></li>
					<li class="<?php if (!$tablogin) echo 'active' ?>"><a
						href="#signup" data-toggle="tab">Registrieren</a></li>
				</ul>
			</div>
			<div class="modal-body">
				<div id="myTabContent" class="tab-content">
					<div class="tab-pane fade <?php if ($tablogin) echo 'active in' ?>"
						id="signin">
						<form class="form-horizontal" method="post"
							action="/ueberpruefung/anmelden">
							<fieldset>
								<!-- Sign In Form -->
								<!-- Text input-->
								<div class="control-group">
									<label class="control-label" for="anmeldeEmail">Email:</label>
									<div class="controls">
										<input required="" id="anmeldeEmail" name="anmeldeEmail"
											type="email" placeholder="max@mustermann.ch"
											class="input-medium form-control">
									</div>
								</div>
								<!-- Password input-->
								<div class="control-group">
									<label class="control-label" for="anmeldePasswort">Passwort:</label>
									<div class="controls">
										<input required="" id="anmeldePasswort" name="anmeldePasswort"
											class="form-control input-medium" type="password"
											placeholder="********">
									</div>
								</div>

								<!-- Multiple Checkboxes (inline) -->
								<div class="control-group">
									<label class="checkbox" for="rememberme"></label>
									<div class="controls">
										<label class="checkbox" for="rememberme"> <input
											type="checkbox" name="rememberme" id="rememberme"
											value="Remember me"> Angemeldet bleiben
										</label>
									</div>
								</div>

								<!-- Button -->
								<div class="control-group">
									<label class="control-label" for="signinButton"></label>
									<div class="controls">
										<button id="signinButton" type="submit" name="signinButton"
											class="btn btn-success">Einloggen</button>
									</div>
									<div id="loginFehler"></div>
								</div>
							</fieldset>
						</form>
					</div>



					<div
						class="tab-pane fade <?php if (!$tablogin) echo 'active in' ?>"
						id="signup">
						<!-- registrieren -->
						<form class="form-horizontal" method="post"
							action="/ueberpruefung/registrieren">
							<fieldset>
								<!-- Sign Up Form -->
								<!-- Text input-->
								<div class="control-group">
									<label class="control-label" for="email">Email:</label>
									<div class="controls">
										<input id="email" name="email"
											type="email" placeholder="max@mustermann.ch"
											class="input-large form-control" required="" onkeyup="ueberpruefung()">
									</div>
								</div>

								<!-- Text input-->
								<div id=signinForm>
									<div class="control-group">
										<label class="control-label" for="benutzername">Benutzername:</label>
										<div class="controls">
											<input id="benutzername" name="benutzername"
												 type="text" placeholder="Max457"
												class="input-large form-control" required="" onkeyup="ueberpruefung()">
										</div>
									</div>



									<!-- Password input-->
									<div class="control-group">
										<label class="control-label" for="password">Passwort:</label>
										<div class="controls">
											<input id="password" name="password"
												type="password" placeholder="********" class="input-large form-control"
												onkeyup="ueberpruefung()"> <em>1-8 Characters</em>
										</div>
									</div>

									<!-- Text input-->
									<div class="control-group">
										<label class="control-label" for="reenterpassword"
											onkeyup="ueberpruefung()"> Passwort wiederholen:</label>
										<div class="controls">
											<input id="reenterpassword"
												name="reenterpassword" type="password"
												placeholder="********" class="input-large form-control" required=""
												onkeyup="ueberpruefung()">
										</div>
									</div>
								</div>
								<!-- Multiple Radios (inline) -->
								<br>
								<div class="control-group">
									<div class="controls">
										<label class="checkbox" for="humancheck-0"> <input
											type="radio" name="humancheck" id="humancheck-0"
											value="robot" checked="checked">Ich bin ein Computer
										</label> <label class="checkbox" for="humancheck-1"> <input
											type="radio" name="humancheck" id="humancheck-1"
											value="human">Ich bin ein Mensch
										</label>
									</div>
								</div>

								<!-- Button -->
								<div class="control-group">
									<label class="control-label" for="confirmsignup"></label>
									<div class="controls">
										<span style="color: red" id="warnung"></span> <input
											type="submit" value="Registrieren" id="confirmsignup"
											name="confirmsignup" class="btn btn-success">
										<div>
											<span id="serverWarnung"></span>
										</div>
									</div>
								</div>
							</fieldset>
						</form>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<div style="text-allign:center;">
					<button type="button" class="btn btn-default" data-dismiss="modal">Abbrechen</button>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
function ueberpruefung() {
	document.getElementById("warnung").innerHTML = "";
	var name = document.getElementById("benutzername").value;
	var email = document.getElementById("email").value; 
	var password1 = document.getElementById("password").value;
	var password2 = document.getElementById("reenterpassword").value;
	
	if(name.length < 2) {
		document.getElementById("warnung").innerHTML = "Der Benutzername ist zu kurz <br/>";
	}
	if(/^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(email) == false) {
		document.getElementById("warnung").innerHTML = document.getElementById("warnung").innerHTML + "E-Mail Adresse ist ungültig!<br/>";
	}
	if(password1 != password2 && password1 != false) {
		document.getElementById("warnung").innerHTML = document.getElementById("warnung").innerHTML + "Passw&ouml;rter stimmen nicht überein!<br/>";
	}
	if(password1.length < 8) {
		document.getElementById("warnung").innerHTML = document.getElementById("warnung").innerHTML + "Passwort muss mindestens 8 Zeichen lang sein!<br/>";
	}
}

</script>