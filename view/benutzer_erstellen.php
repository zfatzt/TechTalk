<form class="form-horizontal" action="/user/benutzerErstellen" method="post">
	<div class="component" data-html="true">
		<div class="form-group">
		  <label class="col-md-2 control-label" for="benutzername">benutzername</label>
		  <div class="col-md-4">
		  	<input id="benutzername" name="benutzername" type="text" placeholder="benutzername" class="form-control input-md">
		  </div>
		</div>
		<div class="form-group">
		  <label class="col-md-2 control-label" for="email">Mail</label>
		  <div class="col-md-4">
		  	<input id="email" name="email" type="email" placeholder="Mail" class="form-control input-md">
		  </div>
		</div>
		<div class="form-group">
		  <label class="col-md-2 control-label" for="password">Passwort</label>
		  <div class="col-md-4">
		  	<input id="password" name="password" type="password" placeholder="Passwort" class="form-control input-md">
		  </div>
		</div>
		<div class="form-group">
	      <label class="col-md-2 control-label" for="send">&nbsp;</label>
		  <div class="col-md-4">
		    <input id="send" name="send" type="submit" class="btn btn-primary">
		  </div>
		</div>
	</div>
</form>
