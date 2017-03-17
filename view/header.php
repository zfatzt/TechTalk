<!DOCTYPE html>
<html lang="de">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title><?= $title ?> | Laurent Tech</title>

<!-- Bootstrap core CSS -->
<link rel="stylesheet"
	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
	integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7"
	crossorigin="anonymous">
<link href="/css/style.css" rel="stylesheet">

</head>
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
						<form class="form-horizontal" method="post"
							action="/ueberpruefung/anmelden">
							<fieldset>
								<!-- Sign In Form -->
								<!-- Text input-->
								<div class="control-group">
									<label class="control-label" for="anmeldeEmail">Email:</label>
									<div class="controls">
										<input required="" id="anmeldeEmail" name="anmeldeEmail"
											type="email" class="form-control"
											placeholder="max@mustermann.ch" class="input-medium"
											required="">
									</div>
								</div>

								<!-- Password input-->
								<div class="control-group">
									<label class="control-label" for="passwordinput">Passwort:</label>
									<div class="controls">
										<input required="" id="anmeldePasswort" name="anmeldePasswort"
											class="form-control" type="password" placeholder="********"
											class="input-medium">
									</div>
								</div>

								<!-- Multiple Checkboxes (inline) -->
								<div class="control-group">
									<label class="checkbox" for="rememberme"></label>
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
										<button id="signin" type="submit" name="signin"
											class="btn btn-success">Einloggen</button>
									</div>
								</div>
							</fieldset>
						</form>
					</div>



					<div class="tab-pane fade" id="signup">
						<!-- registrieren -->
						<form class="form-horizontal" method="post"
							action="/ueberpruefung/registrieren">
							<fieldset>
								<!-- Sign Up Form -->
								<!-- Text input-->
								<div class="control-group">
									<label class="control-label" for="email">Email:</label>
									<div class="controls">
										<input id="email" name="email" class="form-control"
											type="email" placeholder="max@mustermann.ch"
											class="input-large" required="">
									</div>
								</div>

								<!-- Text input-->
								<div class="control-group">
									<label class="control-label" for="benutzername">Benutzername:</label>
									<div class="controls">
										<input id="benutzername" name="benutzername"
											class="form-control" type="text" placeholder="Max457"
											class="input-large" required="">
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
										<button id="confirmsignup" name="confirmsignup" type="submit"
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

<body>
	<nav class="navbar navbar-fixed-top navbar-inverse">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed"
					data-toggle="collapse" data-target="#navbar" aria-expanded="false"
					aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span> <span
						class="icon-bar"></span> <span class="icon-bar"></span> <span
						class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="/"><h2>Tech Talk</h2></a>
			</div>
			<div id="navbar" class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
					<li class="active"><a href="/"><p>Home</p></a></li>
					<li><a href="#signup" data-toggle="modal"
						data-target=".bs-modal-sm"><p>Login</p></a></li>
					<li><a href="#contact"><p>Contact</p></a></li>
					<li class="dropdown"><a href="#" class="dropdown-toggle"
						data-toggle="dropdown" role="button" aria-haspopup="true"
						aria-expanded="false">Chats<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="/chat/bitcoin">Bitcoin</a></li>
							<li><a href="#">Dronen</a></li>
							<li><a href="#">Huawei P10</a></li>
							<li role="separator" class="divider"></li>
							<li class="dropdown-header">Admin</li>
							<li><a href="#">Admin Chat</a></li>
							<li><a href="#">Support</a></li>
						</ul>
				
				</ul>
			</div>
		</div>
	</nav>
	<main>