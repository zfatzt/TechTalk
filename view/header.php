<!DOCTYPE html>
<html lang="de">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="I like trains">

<title><?= $title ?> | Tech Talk</title>

<!-- Bootstrap core CSS -->
<link rel="stylesheet"
	href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
	integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7"
	crossorigin="anonymous">


<link href="/css/style.css" rel="stylesheet">
<link rel="icon" href="images/t.ico">
</head>
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
					<li
						<?php
						if (strcmp ( 'home', $active ) == 0) {
							echo 'class=active';
						}
						?>><a id="home" href="/">Home</a></li>
					<li>
					<?php
					if (isset ( $username )) {
						echo '<a href="/" onclick="logout()" ><p>Logout</p></a>';
					} else {
						echo '<a href="#signup" id="login" data-toggle="modal"+
						data-target=".bs-modal-sm">Login</a>';
					}
					?>
					</li>
					<li
						<?php
						
						if (strcmp ( 'ueberuns', $active ) == 0) {
							echo 'class=active';
						}
						?>><a href="/ueberuns/ueberuns">Über uns</a></li>
					<li
						<?php
						
						if (strcmp ( 'kontakt', $active ) == 0) {
							echo 'class=active';
						}
						?>><a href="/kontakt/kontakt">Kontakt</a></li>
					<li class="dropdown"><a href="#"
						class=" <?php
						
						if (strcmp ( 'chat', $active ) == 0) {
							echo 'active';
						}
						?>dropdown-toggle"
						data-toggle="dropdown" role="button" aria-haspopup="true"
						aria-expanded="false">Chats<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="/chat/chatErstellen?name=bitcoin&chat_id=1">Bitcoin</a></li>
							<li><a href="/chat/chatErstellen?name=dronen&chat_id=2">Dronen</a></li>
							<li><a href="/chat/chatErstellen?name=Huawei P10&chat_id=3">Huawei
									P10</a></li>
						</ul>
					<?php if (isset ( $username )) { ?>
					
					
					
					
					<li
						<?php
						
						if (strcmp ( 'meinProfil', $active ) == 0) {
							echo 'class=active';
						}
						?>><a href="/user/meinProfil">Mein Profil</a></li><?php
					} else {
						echo "";
					}
					?>
				<?php
				
				if (isset ( $username )) {
					echo "<li><a><p>Eingeloggt als: " . $username . "</p></a></li>";
				} else {
					echo "";
				}
				?>
				
					</ul>
			</div>
		</div>
	</nav>
	<main>