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
				<input type="password" name="password" id="password"/>
				<input type="submit" value="Ok" />
			</p>
		</form>

		<?php
			if ($_GET["error"] === "badPasswd")
			{
				echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>';

				echo '<script src="js/notificationBadPasswd.js"></script>';
			}
			elseif ($_GET["error"] === "noPasswd")
			{
				echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>';

                                echo '<script src="js/notificationNoPasswd.js"></script>';
			}
		?>
	</body>
</html>
