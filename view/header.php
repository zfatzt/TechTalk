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
					<li>
					<?php
					
					if (isset ( $username )) {
						echo '<a href="/" onclick="logout()" ><p>Logout</p></a>';
					} else {
						echo '<a href="#signup" id="login" data-toggle="modal"
						data-target=".bs-modal-sm"><p>Login</p></a>';
					}
					?>
					</li>
					<li><a href="/ueberuns/ueberuns"><p>Über uns</p></a></li>
					<li class="dropdown"><a href="#" class="dropdown-toggle"
						data-toggle="dropdown" role="button" aria-haspopup="true"
						aria-expanded="false">Chats<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="/chat/chatErstellen?name=bitcoin&chat_id=1">Bitcoin</a></li>
							<li><a href="/chat/chatErstellen?name=dronen&chat_id=2">Dronen</a></li>
							<li><a href="/chat/chatErstellen?name=Huawei P10&chat_id=3">Huawei P10</a></li>
							<li role="separator" class="divider"></li>
							<li class="dropdown-header">Admin</li>
							<li><a href="#">Admin Chat</a></li>
							<li><a href="#">Support</a></li>
						</ul>
					<?php
					
					if (isset ( $username )) {
						echo '<li><a href="/user/meinProfil"><p>Mein Profil</p></a></li>';
					} else {
						echo "";
					}
					?>
					

				
				
				</ul>
				<p style="float: right;">
				
				<?php
				
				if (isset ( $username )) {
					echo "sie sind eingeloggt als:" . $username;
				} else {
					echo "";
				}
				?></p>
			</div>

		</div>
	</nav>
	<main> <script>
	function logout(){
	    var xmlhttp = new XMLHttpRequest();
	    xmlhttp.open('GET','/logout/', true);
	    xmlhttp.onreadystatechange=function(){
	       if (xmlhttp.readyState == 4){
	          if(xmlhttp.status == 200){
	             alert(xmlhttp.responseText);
	         }
	       }
	    };
	    xmlhttp.send(null);
	}
</script>