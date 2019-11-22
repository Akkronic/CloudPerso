<?php
	if (password_verify($_POST["lastPassword"], file_get_contents("secret/passwdSophie")))
	{
		if ($_POST["newPassword"] == $_POST["confirmation"])
		{
			$options = ['cost' => 14,];
			$fp = fopen ("secret/passwdSophie", "r+");
			fseek ($fp, 0);
			fputs ($fp, password_hash($_POST["newPassword"], PASSWORD_BCRYPT, $options));
			fclose ($fp);
			header('Location: /index.php?notif=passwdChanged');
		}
		else
			header('Location: /index.php?notif=newPasswdsDifferents');
	}
	else
		header('Location: /index.php?notif=badPasswd');
?>
