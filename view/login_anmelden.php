<div class="container">
	<br>
	<button class="btn btn-primary btn-lg" href="#signup"
		data-toggle="modal" data-target=".bs-modal-sm">Anmelden/Registrieren</button>
	<br>
</div>
<!-- Modal -->
<div class="modal fade bs-modal-sm" id="myModal" tabindex="-1"
	role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<br>
			<div class="bs-example bs-example-tabs">
				<ul id="myTab" class="nav nav-tabs">
					<li class="active"><a href="#signin" data-toggle="tab">Anmelden</a></li>
					<li class=""><a href="#signup" data-toggle="tab">Registrieren</a></li>
				</ul>
			</div>
			<div class="modal-body">
				<div id="myTabContent" class="tab-content">
					<div class="tab-pane fade active in" id="signin">
						<form class="form-horizontal">
							<fieldset>
								<!-- Sign In Form -->
								<!-- Text input-->
								<div class="control-group">
									<label class="control-label" for="userid">Email:</label>
									<div class="controls">
										<input required="" id="userid" name="userid" type="text"
											class="form-control" placeholder="max@mustermann.ch"
											class="input-medium" required="">
									</div>
								</div>

								<!-- Password input-->
								<div class="control-group">
									<label class="control-label" for="passwordinput">Passwort:</label>
									<div class="controls">
										<input required="" id="passwordinput" name="passwordinput"
											class="form-control" type="password" placeholder="********"
											class="input-medium">
									</div>
								</div>

								<!-- Multiple Checkboxes (inline) -->
								<div class="control-group">
									<label class="control-label" for="rememberme"></label>
									<div class="controls">
										<label class="checkbox" for="rememberme-0"> <input
											type="checkbox" name="rememberme" id="rememberme-0"
											value="Remember me"> Angemeldet bleiben
										</label>
									</div>
								</div>

								<!-- Button -->
								<div class="control-group">
									<label class="control-label" for="signin"></label>
									<div class="controls">
										<button id="signin" name="signin" class="btn btn-success">Einloggen
										</button>
									</div>
								</div>
							</fieldset>
						</form>
					</div>
					<div class="tab-pane fade" id="signup">
						<form class="form-horizontal">
							<fieldset>
								<!-- Sign Up Form -->
								<!-- Text input-->
								<div class="control-group">
									<label class="control-label" for="Email">Email:</label>
									<div class="controls">
										<input id="Email" name="Email" class="form-control"
											type="text" placeholder="max@mustermann.ch"
											class="input-large" required="">
									</div>
								</div>

								<!-- Text input-->
								<div class="control-group">
									<label class="control-label" for="userid">Benutzername:</label>
									<div class="controls">
										<input id="userid" name="userid" class="form-control"
											type="text" placeholder="Max457" class="input-large"
											required="">
									</div>
								</div>

								<!-- Password input-->
								<div class="control-group">
									<label class="control-label" for="password">Passwort:</label>
									<div class="controls">
										<input id="password" name="password" class="form-control"
											type="password" placeholder="********" class="input-large"
											required=""> <em>1-8 Characters</em>
									</div>
								</div>

								<!-- Text input-->
								<div class="control-group">
									<label class="control-label" for="reenterpassword"> Passwort
										wiederholen:</label>
									<div class="controls">
										<input id="reenterpassword" class="form-control"
											name="reenterpassword" type="password" placeholder="********"
											class="input-large" required="">
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
										<button id="confirmsignup" name="confirmsignup"
											class="btn btn-success">Registrieren</button>
									</div>
								</div>
							</fieldset>
						</form>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<center>
					<button type="button" class="btn btn-default" data-dismiss="modal">Abbrechen</button>
				</center>
			</div>
		</div>
	</div>
</div>
</body>
</html>
