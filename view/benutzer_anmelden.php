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
						<form class="form-horizontal" method="post" action="/ueberpruefung/anmelden">
							<fieldset>
								<!-- Sign In Form -->
								<!-- Text input-->
								<div class="control-group">
									<label class="control-label" for="anmeldeEmail">Email:</label>
									<div class="controls">
										<input required="" id="anmeldeEmail" name="anmeldeEmail" type="email"
											class="form-control" placeholder="max@mustermann.ch"
											class="input-medium" required="">
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
										<button id="signin" type="submit" name="signin" class="btn btn-success">Einloggen
										</button>
									</div>
								</div>
							</fieldset>
						</form>
					</div>
					
					
					
					<div class="tab-pane fade" id="signup"> <!-- registrieren -->
						<form onsubmit="myFunction()" class="form-horizontal" method="post" action="/ueberpruefung/registrieren">
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
							<div id=signinForm>
								<div class="control-group">
									<label class="control-label" for="benutzername">Benutzername:</label>
									<div class="controls">
										<input id="benutzername" name="benutzername" class="form-control"
											type="text" placeholder="Max457" class="input-large"
											required="">
									</div>
								</div>
								
								

								<!-- Password input-->
								<div class="control-group">
									<label class="control-label" for="password">Passwort:</label>
									<div class="controls">
										<input id="password" name="password" class="form-control"
											type="password" placeholder="********" class="input-large"> <em>1-8 Characters</em>
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
										<input type="button" value="Submit" id="confirmsignup" name="confirmsignup"
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

<script>
function myFunction() {

	var reenterpassword = document.getElementById(reenterpassword);
	var password  = document.getElementById(password);

	if (reenterpassword.value == password.value)
	{
		alert("1");
		return true;
	}
	else
	{
		alert("2");
		// Display error div (set visiblity)
		 return false;
	}
	
    
   
}
</script>

<script type="text/javascript">

$(document).ready(function() {
    $('#signinForm').formValidation({
        // I am validating Bootstrap form
        framework: 'bootstrap',

        // Feedback icons
        icon: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },

        // List of fields and their validation rules
        fields: {
        	benutzername: {
                validators: {
                    notEmpty: {
                        message: 'The username is required and cannot be empty'
                    },
                    stringLength: {
                        min: 6,
                        max: 30,
                        message: 'The username must be more than 6 and less than 30 characters long'
                    },
                    regexp: {
                        regexp: /^[a-zA-Z0-9_]+$/,
                        message: 'The username can only consist of alphabetical, number and underscore'
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'The password is required and cannot be empty'
                    }
                }
            }
        }
    });
});
</script>
</body>
</html>
