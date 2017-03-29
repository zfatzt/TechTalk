<div id="chat" class="row">
	<h3><?=$title ?></h3>
	<div class="links col">
		<div class="chatBoxKlein">
			<h2><?= $alleUser ?></h2>
		</div>
		<div class="chatBoxKlein">
			<a href="/chat/chatErstellen?name=bitcoin&chat_id=1"><h3>Bitcoin</h3></a>
			<a href="/chat/chatErstellen?name=dronen&chat_id=2"><h3>Dronen</h3></a>
			<a href="/chat/chatErstellen?name=Huawei P10&chat_id=3"><h3>Huawei P10</h3></a>
		</div>
	</div>
	<div id="rechts" class="col">
		<div class="chatBoxGross">
		<?= $alleNachrichten ?>
		</div>
		<div id="nachricht">
			<form action="/chat/chatSenden?name=<?=$name ?>&chat_id=<?=$chat_id?>"
				method="post">
				<div class="input-group">
					<input type="text" class="form-control"
						placeholder="Nachricht eingeben..." id="nachrichtText"
						name="nachrichtText"> <span class="input-group-btn">
						<button id="absendenButton" class="btn btn-success" type="submit">
							<span class="glyphicon glyphicon-send"></span>
						</button>
					</span>
				</div>
			</form>
		</div>
	</div>
</div>