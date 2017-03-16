
<div class="container">
	<button type="button" class="btn btn-info btn-lg" data-toggle="modal"
		data-target="#myModal">Anmelden</button>
	<div class="modal fade" id="myModal" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Anmelden</h4>
				</div>
				<form class="form-signin" method="post" action="/ueberpruefung/anmelden">
					<div class="modal-body">

						<div class="row">
							<div class="col-xs-5">
								<div class="input-group">
									<span class="input-group-addon"><span
										class="glyphicon glyphicon-user"></span></span> <input
										type="email" class="form-control" placeholder="Email">
								</div>
							</div>
						</div>
						<br>
						<div class="row">
							<div class="col-xs-5">
								<div class="input-group">
									<span class="input-group-addon"><span
										class="glyphicon glyphicon-lock"></span></span> <input
										type="password" class="form-control" placeholder="Passwort">
								</div>
							</div>
						</div>

					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-default">Absenden</button>
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</form>
			</div>
		</div>
	</div>

</div>

