<?php
	if (!password_verify($_POST["password"], '$2y$10$5oDNkGGCUFxx2mZscGoDZOMh.O2ULVGyUw6SqBMlg81ENuuBnrAoG'))
		header('Location: /index.php?notif=badPasswd');
//	//if (true)//file_get_contents("secret/countBadPasswd") >= 3)
//		header('Location: /index.php?notif=badPasswd');
//	if (file_get_contents("secret/countBadPasswd") >= 3)
//	{
//		$fp = fopen ("secret/countBadPasswd", "r+");
//		fseek ($fp, 0);
//		fputs ($fp, 0);
//		fclose ($fp);
//	}
//	if (password_verify($_POST["password"], file_get_contents("secret/passwdSophie")))
//	{
//		$fp = fopen ("secret/countBadPasswd", "r+");
//		fseek ($fp, 0);
//		fputs ($fp, 0);
//		fclose ($fp);
//	}
//	else
//	{
//		if (file_get_contents("secret/countBadPasswd") < 3)
//		{
//			$fp = fopen ("secret/countBadPasswd", "r+");
//			fseek ($fp, 0);
//			fputs ($fp, intval(file_get_contents("secret/countBadPasswd")) + 1);
//			fclose ($fp);
//		}
//		$fp = fopen ("secret/lastBadPasswd", "r+");
//		fseek ($fp, 0);
//		fputs ($fp, microtime(true));
//		fclose ($fp);
//		header('Location: /index.php?notif=badPasswd');
//	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Téléchargements</title>
		<meta charset=UTF-8 />
		<link rel="stylesheet" type="text/css" href="/css/style.css"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link rel="icon" type="image/png" href="imgs/favicon.png" />
	</head>
	<body>
		<header>
			<h1>La Soute à Bagages du Tardis</h1>
		</header>
		<section id="files_section">

			<h2>Fichiers en ligne :</h2>

			<ul>
				<?php
					$DATA1Files = scandir('/media/DATA1/');
					$DATA2Files = scandir('/media/DATA2/');
					$DATAFiles = array_merge($DATA1Files, $DATA2Files);
					sort($DATAFiles);
					foreach ($DATAFiles as $file)
					{
						if ($file[0] == '.')
						{
							continue;
						}
						if (file_exists("/media/DATA1/".$file))
							$root = "/media/DATA1/";
						else
							$root = "/media/DATA2/";
						if (is_dir($root.$file))
						{
							echo '				<li><a title="'.$file.'" href="/cloud.php?folder='.$file.'"><img src="/mimeTypeImgs/folder.png" /><p>'.$file.'</p></a></li>';
						}
						else
						{
							echo '				<li><a title="'.$file.'" href="/download.php?file='.$file.'"><img src="/mimeTypeImgs/empty.png" /><p>'.$file.'</p></a></li>';
						}
						echo "\n";
					}
				?>
			</ul>

		</section>

		<h2>État du stockage :</h2>

		<?php
			$storageStateDATA1 = intval(exec("df -k | grep -E '/dev/sda1' | awk '{ print $5 }' | sed -e 's/%//g' | tr '\n' ' '"));
			$storageStateDATA2 = intval(exec("df -k | grep -E '/dev/sdb1' | awk '{ print $5 }' | sed -e 's/%//g' | tr '\n' ' '"));
			$storageState = ($storageStateDATA1 + $storageStateDATA2) / 2;
			echo '<img id="sd_card_img" src="/imgs/storage_'.round($storageState).'.png">';
			echo '<p id="p_storage_state">Stockage occupé à ' . $storageState . '%</p>';
		?>

		<h2>Mettre en ligne un fichier :</h2>

		<form enctype="multipart/form-data" action="/upload.php" accept-charset="UTF-8" method="post" id="uploadForm">
			<input name="utf8" type="hidden" value="&#x2713;" />
			<input type="file" name="file" id="file" />
			<input type="submit" href="javascript: sendForm()" value="Envoyer" />
		</form>
		<h2>Changer le mot de passe :</h2>
		<form action="/changePassword.php" accept-charset="UTF-8" method="post" id="changePasswordForm">
			<label>Ancien mot de passe :</label>
			<input required type="password" name="lastPassword">
			<div id="newLine"></div>
			<label>Nouveau mot de passe :</label>
			<input required type="password" name="newPassword">
			<div id="newLine"></div>
			<label>Confirmation :</label>
			<input required type="password" name="confirmation">
			<div id="newLine"></div>
			<input type="submit" value="Changer le mot de passe">
		</form>
	</body>
	<script src="/js/sendForm.js"></script>
</html>
