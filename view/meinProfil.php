<div class="container">
    <h1>Edit Profile</h1>
  	<hr>
        <h3>Personal info</h3>
        <form class="form-horizontal" method="post"
							action="/user/profilBearbeitetn()">

          <div class="form-group">
            <label class="col-lg-3 control-label">Email:</label>
            <div class="col-lg-8">
              <input class="form-control" id="accountBearbeitenEmail" type="text" value="<?php echo $_SESSION['email'];?>" >
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Benutzername:</label>
            <div class="col-md-8">
              <input class="form-control" type="text" required="required" value="<?php echo $_SESSION['benutzername'];?>" >
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Password:</label>
            <div class="col-md-8">
              <input class="form-control" type="password" required="required">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Passwort Wiederholen:</label>
            <div class="col-md-8">
              <input class="form-control" type="password" required="required">
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <input type="submit" class="btn btn-primary" value="Änderungen Speichern">
              <span></span>
              <input type="reset" class="btn btn-default" value="Abbrechen">
            </div>
          </div>
        </form>
      </div>
  </div>
</div>
<hr>