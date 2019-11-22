<!DOCTYPE html>
<html>
	<head>
		<title>Authentification</title>
		<meta charset="UTF-8"/>
		<link rel="stylesheet" type="text/css" href="css/authentification.css">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
		<link rel="icon" type="image/png" href="imgs/favicon.png" />
	</head>
	<body>
		<h1>Authentification</h1>
		<form method="post" action="/cloud.php">
			<p>
				<input name="utf8" type="hidden" value="&#x2713;" />
				<label>Mot de passe :</label>
				<input required type="password" name="password" id="password"/>
				<input type="submit" value="Ok" />
			</p>
		</form>
		<script src="js/focusTextInput.js"></script>
		<?php
			if (isset($_GET["notif"]))
			{
				echo '<script src="js/jquery-3.3.1.min.js"></script>';
				if ($_GET["notif"] === "badPasswd")
					echo '<script src="js/notificationBadPasswd.js"></script>';
				else if ($_GET["notif"] === "passwdChanged")
					echo '<script src="js/notificationPasswdChanged.js"></script>';
			}
		?>
	</body>
</html>
