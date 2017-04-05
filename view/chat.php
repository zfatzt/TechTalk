<?php
if (! isset ( $_SESSION ["id"] )) {
	$view = new View ( 'default_index' );
	$view->title = 'Bitte Anmelden';
	$view->heading = '';
	$view->tablogin = false;
	$view->active = 'chat';
	$view->display ();
	
	echo "<script>document.getElementById('loginFehler').innerHTML = 'Bitte Einloggen oder Registrieren'
			document.getElementById('serverWarnung').innerHTML = 'Bitte Einloggen oder Registrieren';
document.getElementById('login').click();</script>";
	
	$_SESSION ["id"] = null;
	?>

<?php
} else {
	?>

<div id="chat" class="row">
	<h3><?=$title ?></h3>
	<div class="links col">
		<div class="chatBoxKlein">
			<h2><?= $alleUser ?></h2>
		</div>
		<div class="chatBoxKlein">
			<h3>
				<a href="/chat/chatErstellen?name=bitcoin&chat_id=1">Bitcoin</a>
			</h3>
			<h3>
				<a href="/chat/chatErstellen?name=dronen&chat_id=2">Dronen</a>
			</h3>
			<h3>
				<a href="/chat/chatErstellen?name=HuaweiP10&chat_id=3">Huawei P10</a>
			</h3>
		</div>
	</div>
	<div id="rechts" class="col">
		<div class="chatBoxGross">
		<?php require 'chatBox.php'; ?>
		</div>
		<div id="nachricht">
			<form
				action="/chat/chatSenden?name=<?=$name ?>&chat_id=<?=$chat_id?>"
				method="post">
				<div class="input-group">
					<input type="text" class="form-control"
						placeholder="Nachricht eingeben..." id="nachrichtText"
						name="nachrichtText" <?php if (isset($eingabe)) { ?>
						value='$eingabe' <?php } ?>> <span class="input-group-btn">
						<button id="absendenButton" class="btn btn-success" type="submit">
							<span class="glyphicon glyphicon-send" onclick="refresh()"></span>
						</button>
					</span>
				</div>
			</form>
		</div>
	</div>
</div>
<script
	src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
	integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
	crossorigin="anonymous"></script>
<script type="text/javascript" src="/js/refeshChat.js"></script>
<?php }?>